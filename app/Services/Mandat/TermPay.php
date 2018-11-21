<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class TermPay extends AbstractField
	{

		protected $name = "term_pay";
		protected $validations = [
			"complement_financement" => "required",
			"tx_pret" => "required"
		];

		public function process(){
			if($this->parameters->get('complement_financement') == Funding::BANK){
				$deno = 1.0 - 1.0 / pow((1+ ($this->parameters->get('taux_pret'))),$this->parameters->get('period'));
				return ($this->parameters->get('loan_amount') * ($this->parameters->get('taux_pret'))) / $deno;

				// $interest = round($this->loan_amount * $this->taux_pret, 2);
				//
				// $this->principal = round($this->term_pay - $interest, 2);
				//
				// $this->balance = round($this->loan_amount - $this->principal, 2);
			}

			if($this->parameters->get('complement_financement') == Funding::CASH){
				return $this->parameters->get('loan_amount')/$this->parameters->get('period');

				// $interest = 0;
				//
				// $this->principal = round($this->term_pay, 2);
				//
				// $this->balance = round($this->loan_amount - ($this->period * $this->principal), 2);

			}

		}

	}

	?>
