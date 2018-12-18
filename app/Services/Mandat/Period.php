<?php

namespace App\Services\Mandat;

use App\Services\Funding;
use App\Services\AbstractField;

	/**
	 * Class Period set the stack of a period, calculate from term years when it's a loan
	 *
	 * not really a calculation
	 *
	 * @package App\Services\Mandat
	 */
	class Period extends AbstractField
	{

		protected $name = "period";
		protected $validations = [
			"nbr_period" => "required"
		];

		/**
		 * @return float|int|mixed the perion
		 */
		public function process(){

			// FIXME is it used anymore???
			if($this->parameters->get('complement_financement') != Funding::CASH){
				return $this->parameters->get('term_years') * 12;
			}

			return $this->parameters->get('nbr_period');

		}

	}

	?>
