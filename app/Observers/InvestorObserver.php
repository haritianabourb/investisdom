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
    public function saving(Investor $investor)
    {
        if($investor->nature_entities_id == 1){
            $investor->name = $investor->full_name;
        }

    }

}
