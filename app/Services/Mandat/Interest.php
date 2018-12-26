<?php

namespace App\Services\Mandat;

use App\Services\Funding;
use App\Services\AbstractField;

/**
 * Class Interest show an interest amount fee, calculate if it's a loan
 *
 * calculation:
 *
 * interest = loan_amount * percent(loan_rate)
 *
 * @package App\Services\Mandat
 */
class Interest extends AbstractField
{

    protected $name = "interet";

    protected $validations = [
        "complement_financement" => "required",
        "taux_pret" => "required"
    ];

    /**
     * @return float|int|mixed the interest loan amount
     */
    public function process()
    {

        if ($this->parameters->get('complement_financement') != Funding::CASH) {
            return $this->parameters->get('montant_compl_fin') * $this->parameters->get('taux_pret') / 100;
        }

        return 0;

    }

}

