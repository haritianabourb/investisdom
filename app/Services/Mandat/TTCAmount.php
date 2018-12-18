<?php

namespace App\Services\Mandat;

use App\Services\AbstractField;

	/**
	 * Class TTCAmount, the project total amount, with taxes included
	 *
	 * calculation:
	 * ttc_amount = ht_amount + total_investment_amount
	 *
	 * @package App\Services\Mandat
	 */
	class TTCAmount extends AbstractField
	{

		protected $name = "montant_ttc_mandat";
		protected $validations = [
			"tva_investissement" => "nullable",
		];

		/**
		 * @return mixed the project total amount with taxes included
		 */
		public function process(){
			return $this->parameters->get('montant_ht_mandat') + $this->parameters->get('tva_investissement');
		}

	}

