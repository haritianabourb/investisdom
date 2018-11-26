<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;
use MathPHP\Finance;


	class VANPaiement extends AbstractField
	{

		protected $name = "van_paiement";

		public function process(){
			// $this->period = 0;
			// $npv=0;
			// $rate = $this->parameters->get('taux_pret');
			$cashflows = $this->parameters->get('schedule');
			// // INVESTISSEMENT DE DEPART
			$npv = [];
			// array_push($npv,$this->parameters->get('apport_locataire'));
		  foreach($cashflows as $cf) {
				// CALCUL DU VAN POUR CHAQUE PERIODE
		    array_push($npv, $cf['payment']);
		  }


			return Finance::npv($this->parameters->get('taux_pret'), $npv);

			// dd(
			// 	$pmt = Finance::pmt($this->parameters->get('taux_pret'), $this->parameters->get('duree_pret'),$this->parameters->get('loan_amount'), 0, false),
			// 	$ipmt = Finance::ipmt($this->parameters->get('taux_pret'), 1, $this->parameters->get('duree_pret'),$this->parameters->get('loan_amount'), 0, false),
			// 	$ppmt = Finance::ppmt($this->parameters->get('taux_pret'), 1, $this->parameters->get('duree_pret'),$this->parameters->get('loan_amount'), 0, false),
			// 	$periods = Finance::periods($this->parameters->get('taux_pret'), $pmt, $this->parameters->get('loan_amount'), 0, false),
			// 	$aer = Finance::aer($this->parameters->get('tx_pret')/100, 12),
			// 	$pv = Finance::pv($this->parameters->get('taux_pret'), $periods, abs($pmt),0, false),
			// 	$fv = Finance::fv($this->parameters->get('taux_pret'), $periods, abs($pmt),  $this->parameters->get('loan_amount'), true)
			//
			// );


		}

	}

	?>
