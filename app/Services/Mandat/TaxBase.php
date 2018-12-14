<?php

namespace App\Services\Mandat;

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
			"renouvellement" => "required_if:is_remplacement,true|nullable",
			"montant_remplacement" => "nullable"
		];

		public function process(){

			$isReplacement = $this->parameters->get('is_remplacement') === "true" ? true : false;

			return (
					$this->parameters->get('montant_ht')
				+ $this->parameters->get('fraix_defiscalisable')
			) - (
					$this->parameters->get('tva_npr')
				// + $this->parameters->get('montant_subvention')
				+ floatval($isReplacement && ($this->parameters->get('renouvellement') == 1) ? $this->parameters->get('montant_remplacement') : 0)
			);
		}

	}

	?>
