<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class TauxBaseEligible extends AbstractField
	{

		protected $name = "taux_base_eligible";

		public function process(){
			return $this->parameters->get('apport_snc')/$this->parameters->get('base_defiscalisable');
		}

	}

	?>
