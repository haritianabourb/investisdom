<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class TTCAmount extends AbstractField
	{

		protected $name = "montant_ttc_mandat";
		protected $validations = [
			"tva_investissement" => "nullable",
		];

		public function process(){
			return $this->parameters->get('montant_ht_mandat') + $this->parameters->get('tva_investissement');
		}

	}

	?>
