<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;
use MathPHP\Finance;

	class VPM extends AbstractField
	{

		protected $name = "vpm";

		public function process(){

			return abs(Finance::pmt($this->parameters->get('taux_pret'), $this->parameters->get('duree_pret'),$this->parameters->get('loan_amount'), 0, true));

		}

	}

	?>
