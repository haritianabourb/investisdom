<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class TTCAmount extends AbstractField
	{

		protected $name = "ttc_amount";
		protected $validations = [
			"tva_investissement" => "required",
		];

		public function process(){
			return $this->parameters->get('montant_ht') + $this->parameters->get('tva_investissement');
		}

	}

	?>
