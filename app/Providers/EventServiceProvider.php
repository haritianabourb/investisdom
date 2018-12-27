<?php

namespace App\Providers;


use App\CGP;
use App\Mandat;
use App\Observers\CGPObserver;
use App\Reservation;
use App\SNC;
use App\Observers\MandatObserver;
use App\Observers\ReservationObserver;
use App\Observers\SNCObserver;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // 'App\Events\Mandat\CalculateMontantTTC' => [
        //     'App\Listeners\ProcessCalculationMontantTTC',
        // ],
        // 'App\Events\Mandat\CalculateTVANPR' => [
        //     'App\Listeners\ProcessCalculationTVANPR',
        // ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        CGP::observe(CGPObserver::class);
        Reservation::observe(ReservationObserver::class);
        Mandat::observe(MandatObserver::class);
        SNC::observe(SNCObserver::class);
        //
    }
}
