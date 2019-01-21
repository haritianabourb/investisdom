<?php
/**
 * Created by PhpStorm.
 * User: flick
 * Date: 04/01/19
 * Time: 10:48
 */

namespace App\Services\Reservation;

use App\Services\AbstractField;
use Carbon\Carbon;

class ReservationStart extends AbstractField
{

    protected $name = "reservation_start";

    public function process()
    {
        $mandat_start = $this->parameters->get('mandat_start_at');
        return (new Carbon($mandat_start));
    }


}