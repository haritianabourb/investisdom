<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class TotalPay extends AbstractField
	{

		protected $name = "total_pay";
		// protected $validations = [
		// 	"complement_financement" => "required",
		// 	"taux_pret" => "required",
		// 	"period" => "required"
		// ];

		public function process(){
			return $this->parameters->get('term_pay') *  12 * $this->parameters->get('term_years');
		}

	}

	?>
