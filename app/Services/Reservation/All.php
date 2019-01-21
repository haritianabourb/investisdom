<?php
/**
 * Created by PhpStorm.
 * User: flick
 * Date: 04/01/19
 * Time: 10:48
 */

namespace App\Services\Reservation;

use App\Services\AbstractField;

class All extends AbstractField
{

    protected $name = "all";

    public function process()
    {
        // TODO: Implement process() method.
        return $this->parameters->get('identifiant') ?: '';
    }


}