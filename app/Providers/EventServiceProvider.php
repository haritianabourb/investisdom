<?php

namespace App\Providers;


use App\Mandat;
use App\Reservation;
use App\SNC;
use App\Observers\MandatObserver;
use App\Observers\ReservationObserver;
use App\Observers\SNCObserver;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        Reservation::observe(ReservationObserver::class);
        Mandat::observe(MandatObserver::class);
        SNC::observe(SNCObserver::class);
        //
    }
}
