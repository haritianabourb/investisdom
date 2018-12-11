<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class TVANPR extends AbstractField
	{

		protected $name = "tva_npr";
		protected $validations = [
			"montant_ht" => "required",
		];

		public function process(){
			return $this->parameters['montant_ht'] * VAT::TVA_NPR;
		}

	}

	?>
