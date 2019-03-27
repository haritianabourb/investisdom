<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\AbstractField;

/**
 * Class TVALoyer the term pay vat
 *
 *
 * @package App\Services\Mandat
 */
class TVALoyer extends AbstractField
{

    protected $name = "tva_loyer";

    public function process()
    {
        // FIXME at time, my pokedex was full...
        $t = $this->parameters->get('echeance_loyer') * $this->parameters->get('duree_pret');

        return $t * VAT::TVA;
    }

}
