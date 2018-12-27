<?php

namespace App\Observers;

use App\CGP;
use App\Mandat;
// use App\TauxCGP;
use App\Services\Amortization;
use \App\Http\Traits\HasFieldsToCalculate;

use Carbon\Carbon;

use DB;
use Schema;

class CGPObserver
{

    /**
     * Handle the contract "creating" event.
     *
     * @param  \App\Mandat  $cgp
     * @return void
     */
      public function creating(CGP $cgp)
    {
        $cgp->identifiant = "ATTEMPTID";
    }

    /**
     * Handle the contract "created" event.
     *
     * @param  \App\Mandat  $cgp
     * @return void
     */
      public function created(CGP $cgp)
    {
        $identifiant =
          substr(preg_replace('/\s/', '', $cgp->name), 0, 3)
          .substr(preg_replace('/\s/', '', $cgp->registered_key), -3)
          ."/".$cgp->id;

          // XXX little hack to not thrown the saving event for calculations
          DB::table($cgp->getTable())->where('id', $cgp->id)->update(['identifiant' => $identifiant]);
    }


}
