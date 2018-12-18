<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class TotalPay extends AbstractField
	{

		protected $name = "montant_total_loyer";
		// protected $validations = [
		// 	"complement_financement" => "required",
		// 	"taux_pret" => "required",
		// 	"period" => "required"
		// ];

		public function process(){
			// FIXME yay, there're so many pokemon to discover!!!
			return $this->parameters->get('echeance_loyer') *  12 * $this->parameters->get('term_years');
		}

	}

	?>
