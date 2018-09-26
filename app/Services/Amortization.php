<?php

namespace App\Services;
	/**
	 * AMORTIZATION CALCULATOR
	 * @author PRANEETH NIDARSHAN
	 * @version V1.0
	 */
	class Amortization
	{

		private $mandat;
		private $collection;

		const CASH = 'CASH';
		const BANK = 'LOAN';

		public function __construct($mandat){

			$this->mandat = $mandat;
			// get term periode in years
			$this->term_years = $mandat->duree_pret/12;
			// $this->term_years = $mandat->nombre_periode/12;
			$this->terms = 12;
			// TODO show interest?
			if($this->mandat->complement_financement == self::CASH){
				$this->period = $this->nbr_period;
			}else{
				$this->period = $this->nbr_period = $this->terms * $this->term_years;
			}
			$this->taux_pret = ($mandat->taux_pret/100.0) / $this->terms;

			$this->processCalc();

		}

		public function processCalc(){
			// TODO Process calc with mandat status

			// XXX SHOW SOME TODOS
			// CORRECT WITH CALC
			$this->taxe_base = $this->getTaxBase();
			// XXX SHOW SOME TODOS
			// CORRECT WITH CALC
			$this->loan_amount = $this->getLoanAmount();
			// CORRECT WITH CALC
			$this->summary = $this->getSummary();
			// TODO CORRECT WITH CALC
			$this->schedule = $this->getSchedule();

			// DONE
			$this->npv = $this->getNPV();
			// XXX Is there any SNC Amount Calculation
			// $this->snc_amount = $this->getSNCAmout();

			// $this->rate_tax_base -> $this->getRateTaxBase();
			$this->loan_amount = $this->getLoanAmount();
			// DONE
			$this->net_intake = $this->getNetIntake();
			$this->other = $this->getOther();

			$this->mandat->resultats = collect(array(
					'summary' => $this->summary,
					'taxe_base' => $this->taxe_base,
					'loan_amount' => $this->loan_amount,
					'npv' => $this->npv,
					'net_intake' => $this->net_intake,
					'other' => $this->other,
				))->toJson();

			$this->mandat->van_paiement = collect($this->schedule)->toJson();

			// $results = array(
			// 		'summary' => $this->summary,
			// 		'taxe_base' => $this->taxe_base,
			// 		'loan_amount' => $this->loan_amount,
			// 		'npv' => $this->npv,
			// 		'net_intake' => $this->net_intake,
			// 		'other' => $this->other,
			// 	);
			// $this->collection = collect(
			// 	array(
			// 		'results'=>$results,
			// 		'schedule' => $this->schedule
			// 	)
			// );

			return $this->mandat;
		}

		private function validate($data) {
			$data_format = array(
				// 'loan_amount' 	=> 0,
				'term_years' 	=> 0,
				'interest' 		=> 0,
				'terms' 		=> 0
				);

			$validate_data = array_diff_key($data_format,$data);

			if(empty($validate_data)) {
				return true;
			}else{
				return false;
			}
		}

		private function calculate()
		{

			if($this->mandat->complement_financement == self::BANK){

				$deno = 1.0 - 1.0 / pow((1+ $this->taux_pret),$this->period);
				$this->term_pay = ($this->loan_amount * $this->taux_pret) / $deno;
				$interest = round($this->loan_amount * $this->taux_pret, 2);
				$this->principal = round($this->term_pay - $interest, 2);
				$this->balance = round($this->loan_amount - $this->principal, 2);
			}

			if($this->mandat->complement_financement == self::CASH){

				$this->term_pay = $this->loan_amount/$this->period;
				$interest = 0;
				$this->principal = round($this->term_pay, 2);
				$this->balance = round($this->loan_amount - ($this->period * $this->principal), 2);

			}

			return array (
				'payment' 	=> $this->term_pay,
				'interest' 	=> $interest,
				'principal' => $this->principal,
				'balance' 	=> $this->balance,
				);
		}

		/**
		 * Get main term
		 * @return array main term
		 */
		public function getSummary()
		{
			$this->calculate();
			$total_pay = $this->term_pay *  $this->nbr_period;
			$total_interest = $total_pay - $this->loan_amount;

			// XXX Frais CFE Et taxe annexe
			if($this->mandat->montant_ht <= 30000){
				// =SI.CONDITIONS(H24<=30000;100;ET(H24>30000;H24<=70000);200;H24>=70001;400)
				$annexe_fee = 100;
			}
			elseif($this->mandat->montant_ht <= 70000){
				$annexe_fee = 200;
			}else{
				$annexe_fee = 400;
			}


			// XXX Honoraire juridique
			if($this->mandat->montant_ht <= 30000){
				// =SI.CONDITIONS(H24<=30000;129;ET(H24>30000;H24<=170000);149;H24>=170001;199)
				$legal_fee = 129;
			}
			elseif($this->mandat->montant_ht <= 170000){
				$legal_fee = 149;
			}else{
				$legal_fee = 199;
			}

			return array (
				'term_pay' => $this->term_pay,
				'term_pay_ttc' => $this->term_pay*1.085,
				'total_pay' => $total_pay,
				'total_vat' => $total_pay*0.085,
				'total_interest' => $total_interest,
				'legal_fee' => $legal_fee,
				'annexe_fee' => $annexe_fee
				);
		}

		/**
		 * get all taxe for base amount
		 * (base eligible et taxe)
		 * @return array base taxe
		 */
		public function getTaxBase(){

			$npr_vat = $this->mandat->montant_ht * 0.085;

			$total_vat = $npr_vat + $this->mandat->tva_investissement;
			// TODO subvention choice + subvention amount +  deduction amount
			$tax_base = (
					$this->mandat->montant_ht
				- $this->mandat->fraix_defiscalisable
			) - (
					$npr_vat
				+ $this->mandat->montant_subvention
				+ $this->mandat->deduction_base
			);

			$ri_amount = $tax_base*0.4412;

			$ht_amount = $this->mandat->montant_ht
			 + $this->mandat->fraix_defiscalisable
			 + $this->mandat->montant_frais_tenue_compte
			 + $this->mandat->carte_grise;

			$ttc_amount = $ht_amount + $this->mandat->tva_investissement;

			return array (
				'npr_vat' => $npr_vat,
				'total_vat' => $total_vat,
				'tax_base' => $tax_base,
				'ri_amount' => $ri_amount,
				'ht_amount' => $ht_amount,
				'ttc_amount' => $ttc_amount,
			);
		}

		/**
		 * Return loan investissement, (reste a financer)
		 * @return float the loan amount
		 */
		public function getLoanAmount(){
			// XXX Montant reprise materiel frounisseur ?
			$loan_amount = $this->taxe_base['ttc_amount']-( $this->mandat->apport_snc + $this->mandat->apport_locataire);

			return  $loan_amount;
		}

		public function getNetIntake(){
			// var_dump($this->inputs['snc_amount'],$this->taxe_base['total_vat']);
			$numerateur = $this->taxe_base['tax_base'] - $this->npv;
			$retrocession = $numerateur/$this->taxe_base['ri_amount'];
			// Apport Net

			$net_intake = $this->mandat->apport_snc - $this->taxe_base['total_vat'];


			return array(
				'net_intake' => $net_intake,
				'numerateur' => $numerateur,
				'retrocession' => $retrocession,
			);
		}

		// public function getSNCAmout(){
		// 	// =((H26*C28)*C32)+H18+H20
		// 	$snc_amount = (($this->taxe_base['tax_base']*0.4412)*$this->)
		//
		// }

		// public function getRateTaxBase(){
		// }

		public function getSchedule()
		{
			$schedule = array();
			if($this->mandat->complement_financement == self::CASH){
				for($this->period = 0; $this->period <= $this->nbr_period; $this->period++){
					array_push($schedule, $this->calculate());

				}
			}
			else{
				while($this->balance > 0){
					array_push($schedule, $this->calculate());
					$this->loan_amount = $this->balance;
					$this->period--;
				}
			}

			return $schedule;

		}

		public function getOther(){
			// $collect = $this->taxe_base['ri_amount']/$this->inputs['collect'];
			$retro_net = $this->taxe_base['ri_amount']*$this->net_intake['retrocession'];
			// $honos = $collect - $retro_net;

			// $comm_cgp = $collect * $this->inputs['taux_cgp'];
			// $comm_app = $this->taxe_base['tax_base'] * $this->inputs['taux_app'];

			// $ass_rcp_rcms = $this->mandat->montant_ht * $this->inputs['taux_ass'];

			// $gestion = $honos * $this->inputs['taux_gest'];

			// $marge = $honos-$comm_cgp-$comm_app-$ass_rcp_rcms-$gestion;
			// $taux_marge = $marge/$this->mandat->montant_ht;
			return array(
				// 'collect' => $collect,
				'retro_net' => $retro_net,
				// 'honos' => $honos,
				// 'comm_app' => $comm_app,
				// 'ass_rcp_rcms' => $ass_rcp_rcms,
				// 'gest' => $gestion,
			);
		}

		function getNPV(){
			$this->period = 0;
			$npv=0;
			$rate = $this->mandat->taux_pret/100;
			$cashflows = $this->schedule;
			// INVESTISSEMENT DE DEPART
			// XXX Montant reprise materiel frounisseur ?
			$npv += ($this->mandat->apport_locataire) / pow((1 + $rate/12),  ($this->period++));
		  foreach($cashflows as $cf) {
				// CALCUL DU VAN POUR CHAQUE PERIODE
		    $npv += $cf['payment'] / pow((1+$rate/12), ($this->period++));
				// var_dump($npv);
		  }
		  return $npv;
		}

		// public function getJSON()
		// {
		// 	return json_encode($this->collection);
		// }
		//
		public function getMandat(){
			return $this->mandat;
		}
		//
		// public function toObject(){
		// 	 return json_decode(json_encode($this->collection), FALSE);
		// }

	}

	?>
