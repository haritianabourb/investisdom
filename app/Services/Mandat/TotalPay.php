<?php

namespace App\Services\Mandat;

use App\Services\AbstractField;


class TotalPay extends AbstractField
{

    protected $name = "montant_total_loyer";

    public function process()
    {
        // FIXME yay, there're so many pokemon to discover!!!
        return $this->parameters->get('echeance_loyer') * 12 * $this->parameters->get('term_years');
    }

}
