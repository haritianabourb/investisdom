<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;

	/**
	 * Class RIAmountPercent the tax reduction, in percent
	 * @package App\Services\Mandat
	 */
	class RIAmountPercent extends AbstractField
	{

		protected $name = "montant_reduction_impot_percent";
		protected $validations = [
			"ri_amount_type_id" => "required",
		];

		/**
		 * @return float|int|mixed the ri amount tax reduction percent
		 */
		public function process(){
			//FIXME why the hell i have this calculation
			return $this->parameters->get('montant_reduction_impot')/($this->parameters->get('ri_amount_type_id')/100);
		}

	}

	?>
