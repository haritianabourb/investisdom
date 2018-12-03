<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class TotalInterest extends AbstractField
	{

		protected $name = "total_interet";
		// protected $validations = [
		// 	"complement_financement" => "required",
		// 	"taux_pret" => "required",
		// 	"period" => "required"
		// ];

		public function process(){
			return $this->parameters->get('montant_total_loyer') - $this->parameters->get('montant_compl_fin');
		}

	}

	?>
