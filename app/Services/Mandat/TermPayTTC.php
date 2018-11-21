<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class TermPayTTC extends AbstractField
	{

		protected $name = "term_pay_ttc";
		// protected $validations = [
		// 	"complement_financement" => "required",
		// 	"tx_pret" => "required",
		// 	"period" => "required"
		// ];

		public function process(){
			return $this->parameters->get('term_pay')*(1 + VAT::TVA);
		}

	}

	?>
