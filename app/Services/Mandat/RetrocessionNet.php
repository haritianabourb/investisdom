<?php

namespace App\Services\Mandat;

use App\Services\AbstractField;


class RetrocessionNet extends AbstractField
{

    protected $name = "retrocession_net";

    public function process()
    {
        return $this->parameters->get('montant_reduction_impot') * $this->parameters->get('retrocession');
    }

}

