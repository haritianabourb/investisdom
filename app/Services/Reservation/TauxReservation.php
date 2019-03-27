<?php
/**
 * Created by PhpStorm.
 * User: flick
 * Date: 04/01/19
 * Time: 10:48
 */

namespace App\Services\Reservation;

use App\Services\AbstractField;

class TauxReservation extends AbstractField
{
    protected $name = "taux_reservation";

    public function process()
    {

        return $this->parameters->get('apport') / $this->parameters->get('montant_reduction');
    }


}