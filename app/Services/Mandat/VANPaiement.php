<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class VANPaiement extends AbstractField
	{

		protected $name = "van_paiement";

		public function process(){
			$this->period = 0;
			$npv=0;
			$rate = $this->parameters->get('taux_pret');
			$cashflows = $this->parameters->get('schedule');
			// INVESTISSEMENT DE DEPART
			$npv += ($this->parameters->get('apport_locataire'));
		  foreach($cashflows as $cf) {
				// CALCUL DU VAN POUR CHAQUE PERIODE
		    $npv += $cf['payment'] / pow((1+$rate), ($this->period++));
		  }
		  return $npv;
		}

	}

	?>
