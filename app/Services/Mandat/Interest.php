<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class Interest extends AbstractField
	{

		protected $name = "interest";
		// protected $validations = [
		// 	"complement_financement" => "required",
		// 	"taux_pret" => "required",
		// 	"period" => "required"
		// ];

		public function process(){
			if($this->parameters->get('complement_financement') == Funding::BANK){
				return $this->parameters->get('loan_amount') * $this->parameters->get('taux_pret') / 100;
				//
				// $this->principal = round($this->term_pay - $interest, 2);
				//
				// $this->balance = round($this->loan_amount - $this->principal, 2);
			}

			if($this->parameters->get('complement_financement') == Funding::CASH){

				return 0;
				//
				// $this->principal = round($this->term_pay, 2);
				//
				// $this->balance = round($this->loan_amount - ($this->period * $this->principal), 2);

			}

		}

	}

	?>
