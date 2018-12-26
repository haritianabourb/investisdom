<?php

namespace App\Services\Mandat;

use App\Services\AbstractField;

/**
 * Class TotalVAT : all vat included for this project
 *
 * calculation:
 * total_vat = npr_vat + investment_vat
 *
 * @package App\Services\Mandat
 */
class TotalVAT extends AbstractField
{

    protected $name = "montant_total_tva";

    public function process()
    {
        return $this->parameters->get('tva_npr') + $this->parameters->get('tva_investissement');
    }

}
