<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class TotalVAT extends AbstractField
	{

		protected $name = "montant_total_tva";
		// protected $validations = [
		// 	"complement_financement" => "required",
		// 	"taux_pret" => "required",
		// 	"period" => "required"
		// ];

		public function process(){
			return $this->parameters->get('tva_npr') + $this->parameters->get('tva_investissement');
		}

	}

	?>
