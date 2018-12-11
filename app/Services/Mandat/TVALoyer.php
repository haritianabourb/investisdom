<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class TVALoyer extends AbstractField
	{

		protected $name = "tva_loyer";

		public function process(){

			$t = $this->parameters->get('echeance_loyer') * $this->parameters->get('duree_pret');

			return $t*VAT::TVA;
		}

	}

	?>
