<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class LoanAmount extends AbstractField
	{

		protected $name = "loan_amount";
		protected $validations = [
			"apport_snc" => "required",
			"apport_locataire" => "required",
		];

		public function process(){
			return  $this->parameters->get('ttc_amount')-( $this->parameters->get("apport_snc") + $this->parameters->get('apport_locataire'));
		}

	}

	?>
