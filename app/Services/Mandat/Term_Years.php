<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class Term_Years extends AbstractField
	{

		protected $name = "term_years";
		protected $validations = [
			"duree_pret" => "required"
		];

		public function process(){

			return $this->parameters->get('duree_pret') / 12;

			// if($this->parameters->get('complement_financement') == Funding::BANK){
			//
			// }
			//
			// if($this->parameters->get('complement_financement') == Funding::CASH){
			//
			//
			// }

		}

	}

	?>
