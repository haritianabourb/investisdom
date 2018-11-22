<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;

	class RIAmountPercent extends AbstractField
	{

		protected $name = "ri_amount_percent";
		protected $validations = [
			"ri_amount_type_id" => "required",
		];

		public function process(){
			return $this->parameters->get('ri_amount')/($this->parameters->get('ri_amount_type_id')/100);
		}

	}

	?>
