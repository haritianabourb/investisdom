<?php

namespace App\Listeners;

use App\Events\Mandat\CalculateMontantTTC;

class processCalculationMontantTTC
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Mandat\CalculateMontantTTC  $event
     * @return void
     */
    public function handle(CalculateMontantTTC $event)
    {
        // Access the order using $event->order...
        //dd($event->mandat);
    }
}
