<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class TermPayTTC extends AbstractField
	{

		protected $name = "echeance_loyer_ttc";
		// protected $validations = [
		// 	"complement_financement" => "required",
		// 	"tx_pret" => "required",
		// 	"period" => "required"
		// ];

		public function process(){
			return $this->parameters->get('echeance_loyer')*(1 + VAT::TVA);
		}

	}

	?>
