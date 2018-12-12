<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;

	class TaxBase extends AbstractField
	{

		protected $name = "base_defiscalisable";
		protected $validations = [
			"montant_ht" => "required",
			"fraix_defiscalisable" => "nullable",
			"montant_subvention" => "nullable",
			"deduction_base" => "nullable",
			"is_remplacement" => "nullable",
			"renouvellement" => "required_if:is_remplacement,on|nullable",
			"montant_remplacement" => "required_if:is_remplacement,on|required_if:renouvellement,1|nullable"
		];

		public function process(){

			return (
					$this->parameters->get('montant_ht')
				- $this->parameters->get('fraix_defiscalisable')
			) - (
					$this->parameters->get('tva_npr')
				+ $this->parameters->get('montant_subvention')
				+ $this->parameters->get('deduction_base')
				+ $this->parameters->get('is_remplacement') && ($this->parameters->get('renouvellement') == 1) ? $this->parameters->get('montant_remplacement') : 0
			);
		}

	}

	?>
