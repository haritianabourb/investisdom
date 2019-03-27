<?php
/**
 * Created by PhpStorm.
 * User: flick
 * Date: 04/01/19
 * Time: 10:48
 */

namespace App\Services\Reservation;

use App\Services\AbstractField;

class Apport extends AbstractField
{
    protected $name = "apport";

    public function process()
    {
        $taux_renta = $this->parameters->get('taux_rentabilite');
//        $taux_renta = $this->parameters->get('taux_rentabilite')/100;

        return $this->parameters->get('montant_reduction') / (1+ $taux_renta);
    }


}