<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;
use MathPHP\Finance;


	class TermPay extends AbstractField
	{

		protected $name = "term_pay";
		protected $validations = [
			"complement_financement" => "required",
			"tx_pret" => "required"
		];

		public function process(){

			$term_pay =  Finance::pmt($this->parameters->get('taux_pret'), $this->parameters->get('duree_pret'),$this->parameters->get('loan_amount'), 0, false);
			return abs($term_pay);

		}

	}

	?>
