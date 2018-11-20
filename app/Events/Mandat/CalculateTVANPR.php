<?php

namespace App\Events\Mandat;

use App\Mandat;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CalculateTVANPR
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $mandat;

    /**
     * Create a new event instance.
     *
     * @param  \App\Mandat  $order
     * @return void
     */
    public function __construct(Mandat $mandat)
    {
        $this->mandat = $mandat;
    }
}
