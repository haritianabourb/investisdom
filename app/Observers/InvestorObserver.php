<?php

namespace App\Observers;

use App\CGP;
use App\Contact;
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
        if(\Auth::user()->hasRole("cgps")){
            $investor->cgp_attached = $investor->cgp_id = $cgp = CGP::where('contact_id', Contact::where("user_id", \Auth::user()->id)->first()->id)->first()->id;
        }

        if($investor->nature_entities_id == 1){
            $investor->name = $investor->full_name;
        }

    }

}
