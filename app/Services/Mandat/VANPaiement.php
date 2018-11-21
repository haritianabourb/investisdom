<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class VANPaiement extends AbstractField
	{

		protected $name = "van_paiement";
		// protected $validations = [
		// 	"complement_financement" => "required",
		// 	"taux_pret" => "required",
		// 	"period" => "required"
		// ];

		public function process(){
			$this->period = 0;
			$npv=0;
			$rate = $this->parameters->get('taux_pret')/100;
			$cashflows = $this->parameters->get('schedule');
			// INVESTISSEMENT DE DEPART
			// XXX Montant reprise materiel frounisseur ?
			$npv += ($this->parameters->get('apport_locataire')) / pow((1 + $rate/12),  ($this->period++));
		  foreach($cashflows as $cf) {
				// CALCUL DU VAN POUR CHAQUE PERIODE
		    $npv += $cf['payment'] / pow((1+$rate/12), ($this->period++));
				// var_dump($npv);
		  }
		  return $npv;
		}

	}

	?>
