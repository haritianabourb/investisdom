<?php

namespace App\Services\Mandat;

use App\Services\AbstractField;

/**
 * Class AnnexeFee, using on the calculation of CFE and intermediary fee
 *
 * come from excel formulae:
 * SI.CONDITIONS(H24<=30000;100;ET(H24>30000;H24<=70000);200;H24>=70001;400)
 *
 * @package App\Services\Mandat
 */
class AnnexeFee extends AbstractField
{

    protected $name = "cfe_tax";

    protected $validations = [
        "montant_ht" => "nullable",
    ];


    /**
     * Annexe fee calculation representation, just amount condition
     * @return int|mixed the annexe fee
     */
    public function process()
    {
        if ($this->parameters->get('montant_ht') <= 30000) {
            return 100;
        } elseif ($this->parameters->get('montant_ht') <= 70000) {
            return 200;
        }

        return 400;

    }

}
