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

		}

	}

	?>
