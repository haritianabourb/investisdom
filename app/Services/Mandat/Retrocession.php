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
//        dd($this->parameters->sortKeys(), $this->parameters->get('numerateur_van')/ $this->parameters->get('montant_reduction_impot'));
        return $this->parameters->get('numerateur_van') / $this->parameters->get('montant_reduction_impot');
    }

}
