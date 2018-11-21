<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class TotalInterest extends AbstractField
	{

		protected $name = "total_interest";
		// protected $validations = [
		// 	"complement_financement" => "required",
		// 	"taux_pret" => "required",
		// 	"period" => "required"
		// ];

		public function process(){
			return $this->parameters->get('total_pay') - $this->parameters->get('loan_amount');
		}

	}

	?>
