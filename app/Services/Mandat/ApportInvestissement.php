<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class ApportInvestissement extends AbstractField
	{

		protected $name = "apport_investissement";
		// protected $validations = [
		// 	"complement_financement" => "required",
		// 	"taux_pret" => "required",
		// 	"period" => "required"
		// ];

		public function process(){
			// dd($this);
			return $this->parameters->get('apport_snc')/$this->parameters->get('ht_amount');
		}

	}

	?>
