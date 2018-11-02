<?php

namespace App\Observers;

use App\SNC;
use Carbon\Carbon;


class SNCObserver
{
    /**
     * Handle the contract "updating" event.
     *
     * @param \App\Mandat $snc
     * @return void
     */
    public function updating(SNC $snc)
    {
      // TODO show statut and update the status
      // dd($snc);

    }
}
