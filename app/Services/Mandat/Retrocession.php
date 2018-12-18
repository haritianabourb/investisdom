<?php

namespace App\Services\Mandat;

use App\Services\AbstractField;


class Retrocession extends AbstractField
{

    protected $name = "retrocession";
    protected $validations = [
        "montant_ht" => "required",
        "subvention" => "nullable",
    ];


    public function process()
    {
        $numerateur = $this->parameters->get('montant_ht')
            + $this->parameters->get('tva_npr')
            + $this->parameters->get('van_paiement')
            + $this->parameters->get('subvention');
        return $numerateur / $this->parameters->get('montant_reduction_impot');
    }

}
