<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;

	class HTAmount extends AbstractField
	{

		protected $name = "ht_amount";
		protected $validations = [
			"montant_ht" => "required",
			"fraix_defiscalisable" => "nullable",
			"montant_frais_tenue_compte" => "nullable",
			"carte_grise" => "nullable",
		];

		public function process(){
			// dd($this);
			return $this->parameters->get('montant_ht')
			 + $this->parameters->get('fraix_defiscalisable')
			 + $this->parameters->get('montant_frais_tenue_compte')
			 + $this->parameters->get('carte_grise');
		}

	}

	?>
