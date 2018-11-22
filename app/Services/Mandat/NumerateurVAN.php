<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class NumerateurVAN extends AbstractField
	{

		protected $name = "numerateur_van";

		public function process(){
			return $this->parameters->get('base_defiscalisable')-$this->parameters->get('van_paiement');
		}

	}

	?>
