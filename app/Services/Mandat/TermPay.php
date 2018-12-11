<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;
use MathPHP\Finance;


	class TermPay extends AbstractField
	{

		protected $name = "echeance_loyer";
		protected $validations = [
			"complement_financement" => "required",
			"tx_pret" => "required"
		];

		public function process(){

			$echeance_loyer =  Finance::pmt($this->parameters->get('taux_pret'), $this->parameters->get('duree_pret'),$this->parameters->get('montant_compl_fin'), 0, false);
			return abs($echeance_loyer);

		}

	}

	?>
