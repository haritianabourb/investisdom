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
      $mandat = $this->processCalculation($mandat);
    }

    /**
     * Process all calculations for Mandat
     * @param  Mandat $mandat the current mandat
     * @return Mandat         [description]
     */
    protected function processCalculation(Mandat $mandat){
      $armotization = new Amortization($mandat);
      $mandat = $armotization->processCalc();

      return $mandat;
    }



}
