<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;

	/**
	 * Class JuridicalFee, calulate the annexe fee amount
	 *
	 * come from excel formulae:
	 * SI.CONDITIONS(H24<=30000;129;ET(H24>30000;H24<=170000);149;H24>=170001;199)
	 *
	 * @package App\Services\Mandat
	 */
	class JuridicalFee extends AbstractField
	{

		protected $name = "hono_jur";

		protected $validations = [
		 	"montant_ht" => "nullable",
		];

		/**
		 * Juridical fee calculation representation, just amount condition
		 * @return int|mixed
		 */
		public function process(){

			if($this->parameters->get('montant_ht') <= 30000){
				return 129;
			}
			elseif($this->parameters->get('montant_ht') <= 170000){
				return 149;
			}

			return 199;

		}

	}

	?>
