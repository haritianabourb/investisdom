<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class LoanAmount extends AbstractField
	{

		protected $name = "montant_compl_fin";
		protected $validations = [
			"montant_ht" => "required",
			"apport_snc" => "required",
			"apport_locataire" => "required",
		];

		public function process(){
			return  $this->parameters->get('montant_ht')-( $this->parameters->get("apport_snc") + $this->parameters->get('apport_locataire'));
		}

	}

	?>
