<?php

namespace App\Observers;

use App\Mandat;
// use App\TauxCGP;
use App\Services\Amortization;
use \App\Http\Traits\HasFieldsToCalculate;

use Carbon\Carbon;

use DB;
use Schema;

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
        $date = (new Carbon($mandat->created_at))->format("Ymd");
        $identifiant =
          substr(preg_replace('/\s/', '', $mandat->leaseholderId->name), 0, 3)
          .substr(preg_replace('/\s/', '', $mandat->supplierId->name), -3)
          ."-".$date
          ."/".$mandat->id;

          // XXX little hack to not thrown the saving event for calculations
          DB::table($mandat->getTable())->where('id', $mandat->id)->update(['identifiant' => $identifiant]);
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

      $request['nbr_period'] = $request['duree_pret_periode'];

      $results = $this->calculateField($request, 'all');

      $columns = Schema::getColumnListing($mandat->getTable());

      $results->each(function ($item, $key) use ($mandat, $columns){
        if(in_array($key, $columns)){
          $mandat->$key = $item;
        }
      });

      $mandat->schedule = json_encode($mandat->schedule?? "");

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
