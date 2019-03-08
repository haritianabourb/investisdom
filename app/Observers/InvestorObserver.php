<?php

namespace App\Observers;

use App\CGP;
use App\Contact;
use App\Investor;
use App\Services\Amortization;

use DB;


class InvestorObserver
{


    public function creating(Investor $investor){
        $investor->user_id = \Auth::user()->id;
    }

    /**
     * Handle the contract "creating" event.
     *
     * @param  \App\Mandat $investor
     * @return void
     */
    public function saving(Investor $investor)
    {

        if(\Auth::user()->hasRole(["cgps", "cgp"])){

            $contact = Contact::ofUser(\Auth::user());

            $cgp = CGP::ofContact($contact);

            $investor->cgp_attached = $investor->cgp_id = $cgp->id;

        }

        if($investor->nature_entities_id == 1){
            $investor->name = $investor->full_name;
        }

    }

}
