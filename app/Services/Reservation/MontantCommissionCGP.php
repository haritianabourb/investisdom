<?php
/**
 * Created by PhpStorm.
 * User: flick
 * Date: 04/01/19
 * Time: 10:48
 */

namespace App\Services\Reservation;

use App\Services\AbstractField;

class MontantCommissionCGP extends AbstractField
{
    protected $name = "montant_commission_cgp";

    public function process()
    {
        $commission_cgp = $this->parameters->get('commission_cgp');
//        $commission_cgp = $this->parameters->get('commission_cgp')/100;

        return $this->parameters->get('apport') * $commission_cgp;
    }


}