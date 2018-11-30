<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;
use MathPHP\Finance;
use Carbon\Carbon;


	class VANPaiement extends AbstractField
	{

		protected $name = "van_paiement";

		public function process(){

			$cashflows = $this->parameters->get('schedule');

			$npv = [];
			// array_push($npv,$this->parameters->get('apport_locataire'));
		  foreach($cashflows as $k => $cf) {
				if($k == 0) continue;
				// CALCUL DU VAN POUR CHAQUE PERIODE
		    array_push($npv, $cf['payment']);
		  }



			return Finance::npv($this->parameters->get('taux_pret'), $npv) + $cashflows[0]['payment'];

		}

	}

	?>
