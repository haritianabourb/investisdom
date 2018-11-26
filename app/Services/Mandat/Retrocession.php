<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class Retrocession extends AbstractField
	{

		protected $name = "retrocession";

		public function process(){
			$numerateur = $this->parameters->get('base_defiscalisable') - $this->parameters->get('van_paiement');
			return $numerateur/$this->parameters->get('ri_amount');
		}

	}

	?>
