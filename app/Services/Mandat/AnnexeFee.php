<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class AnnexeFee extends AbstractField
	{

		protected $name = "cfe_tax";
		// protected $validations = [
		// 	"complement_financement" => "required",
		// 	"taux_pret" => "required",
		// 	"period" => "required"
		// ];

		public function process(){
			// XXX Frais CFE Et taxe annexe
			// TODO show if entered
			if($this->parameters->get('montant_ht') <= 30000){
				// =SI.CONDITIONS(H24<=30000;100;ET(H24>30000;H24<=70000);200;H24>=70001;400)
				return 100;
			}
			elseif($this->parameters->get('montant_ht') <= 70000){
				return  200;
			}else{
				return 400;
			}

		}

	}

	?>
