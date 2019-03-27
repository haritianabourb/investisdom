<?php

namespace App\Services\Mandat;

use App\Services\AbstractField;
use MathPHP\Finance;

class VPM extends AbstractField
{

    protected $name = "vpm";

    public function process()
    {

        return abs(Finance::pmt($this->parameters->get('taux_pret'), $this->parameters->get('duree_pret'), $this->parameters->get('montant_compl_fin'), 0, true));

    }

}
