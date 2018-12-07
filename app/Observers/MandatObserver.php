<?php

namespace App\Observers;

use App\Mandat;
// use App\TauxCGP;
use App\Services\Amortization;
use Carbon\Carbon;
use \App\Http\Traits\HasFieldsToCalculate;


class MandatObserver
{
    use HasFieldsToCalculate;

    protected $calculate_name = "mandat";

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
      $request = request()->all();

      // FIXME some field doesn't exist, we have to change it ASPA
      $request['tx_pret'] = $request['taux_pret'];
      $request['nbr_period'] = $request['duree_pret_periode'];

      $results = $this->calculateField($request, 'all');


      $results->each(function ($item, $key) use ($mandat){
        if(array_has($mandat->toArray(), $key)){
          $mandat->$key = $item;
        }
      });

      $mandat->schedule = json_encode($mandat->schedule?? "");
      $mandat->taux_pret = $request['tx_pret'];

      // dd($results, $mandat);
      //
      $mandat->van_paiement = json_encode($results->only(['van_paiement'])->first());
      $mandat->resultats = $results;
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
