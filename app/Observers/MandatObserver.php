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
     * @param  \App\Mandat  $mandat
     * @return void
     */
      public function creating(Mandat $mandat)
    {
        // dd($mandat);
        $mandat->identifiant = "ATTEMPTID";
    }

    /**
     * Handle the contract "created" event.
     *
     * @param  \App\Mandat  $mandat
     * @return void
     */
      public function created(Mandat $mandat)
    {
        // dd($mandat->leaseholderId);
        $date = (new Carbon($mandat->created_at))->format("Ymd");
        $mandat->identifiant =
          substr(preg_replace('/\s/', '', $mandat->leaseholderId->name), 0, 3)
          .substr(preg_replace('/\s/', '', $mandat->supplierId->name), -3)
          ."-".$date
          ."/".$mandat->id;

        $mandat->save();

    }

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
