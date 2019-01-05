<?php

namespace App\Services\Mandat;

use App\Leaseholder;
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
        $total_tva = $this->parameters->get('tva_investissement');
        if(!(Leaseholder::find($this->parameters->get('leaseholder_id'))->depend_groupeco) || $this->parameters->get('type_defiscalisation') == "01"){
            $total_tva += $this->parameters->get('tva_npr');
        }

        return $total_tva;
    }

}
