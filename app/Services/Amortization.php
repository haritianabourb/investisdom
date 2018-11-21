<?php

namespace App\Services;

use App\Services\VAT;
use App\Services\Funding;

	class Amortization
	{

		private $mandat;
		private $collection;

		// const CASH = 'CASH';
		// const BANK = 'LOAN';

		public function __construct($mandat){

			// TODO deport this to mandat
			$this->mandat = $mandat;
			// get term periode in years
			$this->term_years = $mandat->duree_pret/12;
			// $this->term_years = $mandat->nombre_periode/12;
			$this->terms = 12;
			// TODO show interest?
			if($this->mandat->complement_financement == Funding::CASH){
				$this->period = $this->nbr_period;
			}else{
				$this->period = $this->nbr_period = $this->terms * $this->term_years;
			}
			$this->taux_pret = ($mandat->taux_pret/100.0) / $this->terms;

			// $this->processCalc();

		}

		public function processCalc(){

			$this->taxe_base = $this->getTaxBase();
			$this->loan_amount = $this->getLoanAmount();
			$this->summary = $this->getSummary();
			$this->schedule = $this->getSchedule();
			$this->npv = $this->getNPV();

			$this->loan_amount = $this->getLoanAmount();

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

			//dd($this->mandat, VAT::TVA, VAT::TVA_NPR);

			return $this->mandat;
		}

		private function calculate()
		{

			if($this->mandat->complement_financement == Funding::BANK){

				$deno = 1.0 - 1.0 / pow((1+ $this->taux_pret),$this->period);
				$this->term_pay = ($this->loan_amount * $this->taux_pret) / $deno;

				$interest = round($this->loan_amount * $this->taux_pret, 2);

				$this->principal = round($this->term_pay - $interest, 2);

				$this->balance = round($this->loan_amount - $this->principal, 2);
			}

			if($this->mandat->complement_financement == Funding::CASH){

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
				'term_pay_ttc' => $this->term_pay*(1 + VAT::TVA),
				'total_pay' => $total_pay,
				'total_vat' => $total_pay*(VAT::TVA),
				'total_interest' => $total_interest,
				'legal_fee' => $legal_fee,
				'annexe_fee' => $annexe_fee
				);
		}

		/**
		 * get all taxe for base amount
		 * (base eligible et taxe)
		 * XXX Added it to service
		 * @return array base taxe
		 */
		public function getTaxBase(){

			// XXX En attente des discussion de l'assemblée.
			// Regle applicable jusqu'en 2019
			// Attente sur la suppression de la TVA NPR (abrupt ou non);
			$npr_vat = $this->mandat->montant_ht * VAT::TVA_NPR;

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

			// $ri_amount = $tax_base*0.4412;
			$ri_amount = $tax_base*($this->mandat->ri_amount_type_id/100);

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
		 * XXX Added it to Service
		 * @return float the loan amount
		 */
		public function getLoanAmount(){
			// XXX Montant reprise materiel frounisseur ?
			$loan_amount = $this->taxe_base['ttc_amount']-( $this->mandat->apport_snc + $this->mandat->apport_locataire);

			return  $loan_amount;
		}

		public function getNetIntake(){

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

		public function getSchedule()
		{
			$schedule = array();
			if($this->mandat->complement_financement == Funding::CASH){
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

		public function getMandat(){
			return $this->mandat;
		}


	}

	?>
