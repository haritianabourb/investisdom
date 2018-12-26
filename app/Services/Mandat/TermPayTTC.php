<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\AbstractField;

/**
 * Class TermPayTTC the term pay... with all tax included...
 *
 * calculation:
 * term_pay_ttc = term_pay * (1 + vat)
 *
 * @package App\Services\Mandat
 */
class TermPayTTC extends AbstractField
{

    protected $name = "echeance_loyer_ttc";

    /**
     * @return float|int|mixed the term pay with all taxes included
     */
    public function process()
    {
        return $this->parameters->get('echeance_loyer') * (1 + VAT::TVA);
    }

}
