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
			"fraix_non_defiscalisable" => "nullable",
			"carte_grise" => "nullable",
		];

		public function process(){
			// dd($this);
			return $this->parameters->get('montant_ht')
			 + $this->parameters->get('fraix_defiscalisable')
			 + $this->parameters->get('fraix_non_defiscalisable')
			 + $this->parameters->get('carte_grise');
		}

	}

	?>
