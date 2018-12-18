<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;
use MathPHP\Finance;

	/**
	 * Class TermPay the loan term calculation
	 *
	 * calculation is thrown to the MathPHP\Finance::pmt()
	 * @package App\Services\Mandat
	 */
	class TermPay extends AbstractField
	{

		protected $name = "echeance_loyer";
		protected $validations = [
			"duree_pret" => "required",
			"taux_pret" => "required"
		];


		/**
		 * @return float|int|mixed return the term pay value
		 */
		public function process(){
			$echeance_loyer =  Finance::pmt($this->parameters->get('taux_pret'), $this->parameters->get('duree_pret'),$this->parameters->get('montant_compl_fin'), 0, false);
			return abs($echeance_loyer);

		}

	}

	?>
