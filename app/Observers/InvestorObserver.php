<?php

namespace App\Observers;

use App\Investor;
use App\Services\Amortization;

use DB;


class InvestorObserver
{

    /**
     * Handle the contract "creating" event.
     *
     * @param  \App\Mandat $investor
     * @return void
     */
    public function creating(Investor $investor)
    {
//        $investor->identifiant = "ATTEMPTID";
    }

    /**
     * Handle the contract "created" event.
     *
     * @param  \App\Mandat $investor
     * @return void
     */
    public function created(Investor $investor)
    {
//        $identifiant =
//            substr(preg_replace('/\s/', '', $investor->name), 0, 3)
//            . substr(preg_replace('/\s/', '', $investor->registered_key), -3)
//            . "/" . $investor->id;

        // XXX little hack to not thrown the saving event for calculations
//        DB::table($investor->getTable())->where('id', $investor->id)->update(['identifiant' => $identifiant]);

    }


}
