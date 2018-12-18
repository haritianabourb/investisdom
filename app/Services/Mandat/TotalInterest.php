<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;

	/**
	 * Class TotalInterest the total interest amount
	 *
	 * calculation:
	 * total_interest = total_term_pay_amount - loan_amount
	 *
	 * @package App\Services\Mandat
	 */
	class TotalInterest extends AbstractField
	{

		protected $name = "total_interet";

		/**
		 * @return mixed return the total interest amount
		 */
		public function process(){
			return $this->parameters->get('montant_total_loyer') - $this->parameters->get('montant_compl_fin');
		}

	}

	?>
