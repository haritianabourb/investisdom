<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class Interest extends AbstractField
	{

		protected $name = "interet";
		// protected $validations = [
		// 	"complement_financement" => "required",
		// 	"taux_pret" => "required",
		// 	"period" => "required"
		// ];

		public function process(){
			if($this->parameters->get('complement_financement') == Funding::BANK){
				return $this->parameters->get('montant_compl_fin') * $this->parameters->get('tx_pret')/100;
				//
				// $this->principal = round($this->echeance_loyer - $interet, 2);
				//
				// $this->balance = round($this->montant_compl_fin - $this->principal, 2);
			}

			if($this->parameters->get('complement_financement') == Funding::CASH){

				return 0;
				//
				// $this->principal = round($this->echeance_loyer, 2);
				//
				// $this->balance = round($this->montant_compl_fin - ($this->period * $this->principal), 2);

			}

		}

	}

	?>
