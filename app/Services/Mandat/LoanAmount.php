<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class LoanAmount extends AbstractField
	{

		protected $name = "montant_compl_fin";
		protected $validations = [
			"apport_snc" => "required",
			"apport_locataire" => "required",
		];

		public function process(){
			return  $this->parameters->get('montant_ttc_mandat')-( $this->parameters->get("apport_snc") + $this->parameters->get('apport_locataire'));
		}

	}

	?>
