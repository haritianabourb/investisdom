<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;

	/**
	 * Class ApportInvestissement, report the Investment Base
	 *
	 * calculation:
	 * investment_base = snc_amount / total_ht_amount
	 *
	 * @package App\Services\Mandat
	 */
	class ApportInvestissement extends AbstractField
	{

		protected $name = "apport_investissement";

		protected $validations = [
			"apport_snc" => "required"
		]

		/**
		 * @return float|int|mixed the Investment Base
		 */
		public function process(){
			return $this->parameters->get('apport_snc')/$this->parameters->get('montant_ht_mandat');
		}

	}

	?>
