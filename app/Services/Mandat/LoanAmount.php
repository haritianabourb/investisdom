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
			"fraix_non_defiscalisable" => "nullable",
			"carte_grise" => "nullable",
			"apport_snc" => "nullable",
			"apport_locataire" => "nullable",
			"montant_subvention" => "nullable",
		];

		public function process(){
			return  $this->iAmount() - $this->aAmount();
		}

		private function iAmount(){
			return $this->parameters->get('montant_ht')
				+ $this->parameters->get('fraix_defiscalisable')
				+ $this->parameters->get('fraix_non_defiscalisable')
				+ $this->parameters->get('carte_grise')
				+ $this->parameters->get('tva_investissement');
		}

		private function aAmount(){

			return  $this->parameters->get("apport_snc")
					+ $this->parameters->get('apport_locataire')
					+ $this->parameters->get("montant_subvention") ;
		}

	}

	?>
