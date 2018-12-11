<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class JuridicalFee extends AbstractField
	{

		protected $name = "hono_jur";
		// protected $validations = [
		// 	"complement_financement" => "required",
		// 	"taux_pret" => "required",
		// 	"period" => "required"
		// ];

		public function process(){
			// TODO show if entered
			// XXX Honoraire juridique
			if($this->parameters->get('montant_ht') <= 30000){
				// =SI.CONDITIONS(H24<=30000;129;ET(H24>30000;H24<=170000);149;H24>=170001;199)
				return 129;
			}
			elseif($this->parameters->get('montant_ht') <= 170000){
				return 149;
			}else{
				return 199;
			}

		}

	}

	?>
