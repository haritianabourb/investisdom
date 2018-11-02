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
      switch ($snc->status) {
        case SNC::IN_STOCK:
          $snc->status = SNC::ACTIVE;
          break;
        default:
          // code...
          // XXX For now no controle on updating step 2
          // TODO add all we need to fold the snc like folder, lease, ...
          break;
      }

    }
}
