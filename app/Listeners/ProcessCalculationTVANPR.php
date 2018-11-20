<?php

namespace App\Listeners;

use App\Events\Mandat\CalculateTVANPR;
use App\Services\VAT;

class processCalculationTVANPR
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
    public function handle(CalculateTVANPR $event)
    {
        // Access the order using $event->order...
        return response()->json(['tva_npr' => $event->mandat->montant_ht * VAT::TVA_NPR]);
    }
}
