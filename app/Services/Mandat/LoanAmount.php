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
			"fraix_defiscalisable" => "nullable",
			"apport_snc" => "nullable",
			"apport_locataire" => "nullable",
		];

		public function process(){
			return  $this->parameters->get('montant_ht') + $this->parameters->get('fraix_defiscalisable')-( $this->parameters->get("apport_snc") + $this->parameters->get('apport_locataire'));
		}

	}

	?>
