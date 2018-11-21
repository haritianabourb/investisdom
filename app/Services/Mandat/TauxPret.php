<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class TauxPret extends AbstractField
	{

		protected $name = "taux_pret";
		protected $validations = [
			"tx_pret" => "required"
		];

		public function process(){
			return  ($this->parameters->get('tx_pret')/100.0) / 12;
		}

	}

	?>
