<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;

	class TaxBase extends AbstractField
	{

		protected $name = "tax_base";
		protected $validations = [
			"montant_ht" => "required",
			"fraix_defiscalisable" => "required",
			"montant_subvention" => "required",
			"deduction_base" => "required",
		];

		public function process(){
			// dd($this);
			return (
					$this->parameters->get('montant_ht')
				- $this->parameters->get('fraix_defiscalisable')
			) - (
					$this->parameters->get('tva_npr')
				+ $this->parameters->get('montant_subvention')
				+ $this->parameters->get('deduction_base')
			);
		}

	}

	?>
