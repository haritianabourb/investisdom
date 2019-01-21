<?php
/**
 * Created by PhpStorm.
 * User: flick
 * Date: 04/01/19
 * Time: 10:48
 */

namespace App\Services\Reservation;

use App\Services\AbstractField;

class TauxRentabilite extends AbstractField
{
    protected $name = "taux_rentabilite";

    public function process()
    {
        $commission_cgp = $this->parameters->get('commission_cgp');

        // TODO: remove percent formatting (* 100) and let it as float <1.
        return ($this->parameters->get('taux_mois') - $commission_cgp);
    }


}