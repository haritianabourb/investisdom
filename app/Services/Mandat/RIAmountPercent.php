<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;

	class RIAmountPercent extends AbstractField
	{

		protected $name = "montant_reduction_impot_percent";
		protected $validations = [
			"ri_amount_type_id" => "required",
		];

		public function process(){
			return $this->parameters->get('montant_reduction_impot')/($this->parameters->get('ri_amount_type_id')/100);
		}

	}

	?>
