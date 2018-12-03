<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class TauxRetrocession extends AbstractField
	{

		protected $name = "taux_retro";
		// protected $validations = [
		// 	"complement_financement" => "required",
		// 	"taux_pret" => "required",
		// 	"period" => "required"
		// ];

		public function process(){
			return $this->parameters->get('apport_bd')/($this->parameters->get('ri_amount_type_id')/100);
		}

	}

	?>
