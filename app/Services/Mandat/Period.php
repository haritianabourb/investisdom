<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class Period extends AbstractField
	{

		protected $name = "period";
		protected $validations = [
			"nbr_period" => "required"
		];

		public function process(){

			// return $this->parameters->get('duree_pret') / 12;

			if($this->parameters->get('complement_financement') == Funding::BANK){
				return $this->parameters->get('term_years') * 12;
			}

			if($this->parameters->get('complement_financement') == Funding::CASH){
				return $this->parameters->get('nbr_period');
			}


		}

	}

	?>
