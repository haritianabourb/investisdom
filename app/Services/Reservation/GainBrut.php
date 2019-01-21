<?php
/**
 * Created by PhpStorm.
 * User: flick
 * Date: 04/01/19
 * Time: 10:48
 */

namespace App\Services\Reservation;

use App\Services\AbstractField;

class GainBrut extends AbstractField
{
    protected $name = "gain_brut";

    public function process()
    {

        return $this->parameters->get('montant_reduction') - $this->parameters->get('apport');
    }


}