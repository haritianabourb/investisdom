<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\AbstractField;

    /**
     * Class TVAInvestissement, the investment tax fee
     *
     * calculation:
     * investment_tax_fee = tax_free_base * VAT
     * @package App\Services\Mandat
     */
	class TVAInvestissement extends AbstractField
	{

		protected $name = "tva_investissement";

		protected $validations = [
		    "fraix_defiscalisable" => "nullable",
        ];

		public function process(){
			return $this->parameters->get('fraix_defiscalisable') * VAT::TVA;
		}

	}