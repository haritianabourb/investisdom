<?php

namespace App\Services\Mandat;

use App\Services\AbstractField;


class TauxRetrocession extends AbstractField
{

    protected $name = "taux_retro";
    // protected $validations = [
    // 	"complement_financement" => "required",
    // 	"taux_pret" => "required",
    // 	"period" => "required"
    // ];
    /**
     * @return float|int|mixed  retrocession rate
     */
    public function process()
    {
        // FIXME second pokemon to follow, seem to be the competitors retrocession rate
        return $this->parameters->get('apport_bd') / ($this->parameters->get('ri_amount_type_id') / 100);
    }

}
