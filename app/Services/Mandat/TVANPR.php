<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;

	/**
	 * Class TVANPR, specifical VAT amount in Ultramarine
	 *
	 * calculation:
	 * npr_vat = ht_amount * NPRVAT
	 *
	 * @package App\Services\Mandat
	 */
	class TVANPR extends AbstractField
	{

		protected $name = "tva_npr";

		protected $validations = [
			"montant_ht" => "required",
		];

		/**
		 * @return float|int|mixed the NPR VAT amount
		 */
		public function process(){
			return $this->parameters['montant_ht'] * VAT::TVA_NPR;
		}

	}

	?>
