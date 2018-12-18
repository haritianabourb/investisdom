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
        //FIXME this doesn't exist normaly, change tx_pret name to another, like taux_pret_annuel or else
        $this->parameters->get('tx_pret') ?? $this->parameters->addParameters(['tx_pret' => $this->parameters->get('taux_pret')]);

        if ($this->parameters->get('complement_financement') != Funding::CASH) {
            return $this->parameters->get('montant_compl_fin') * $this->parameters->get('tx_pret') / 100;
        }

        return 0;

    }

}

