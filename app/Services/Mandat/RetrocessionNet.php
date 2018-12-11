<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class RetrocessionNet extends AbstractField
	{

		protected $name = "retrocession_net";
		// protected $validations = [
		// 	"complement_financement" => "required",
		// 	"taux_pret" => "required",
		// 	"period" => "required"
		// ];

		public function process(){
			return $this->parameters->get('montant_reduction_impot')*$this->parameters->get('retrocession');
		}

	}

	?>
