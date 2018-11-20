<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;

	class RIAmount extends AbstractField
	{

		protected $name = "ri_amount";
		protected $validations = [
			"ri_amount_type_id" => "required",
		];

		public function process(){
			return $this->parameters->get('tax_base')*($this->parameters->get('ri_amount_type_id')/100);
		}

	}

	?>
