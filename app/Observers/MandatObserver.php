<?php

namespace App\Observers;

use App\Mandat;
// use App\TauxCGP;
use App\Services\Amortization;
use Carbon\Carbon;


class MandatObserver
{
    /**
     * Handle the contract "creating" event.
     *
     * @param \App\Mandat $mandat
     * @return void
     */
    public function saving(Mandat $mandat)
    {
      // XXX Collecte donnée
      //
      // TODO status watchdog
      $armotization = new Amortization($mandat);
      $mandat = $armotization->getMandat();

      $mandat->resultats;
      $mandat->van_paiement;
      // dd(json_decode($mandat->resultats), json_decode($mandat->van_paiement));

    }
}
