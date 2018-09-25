<?php

namespace App\Providers;

use App\Reservation;
use App\Mandat;
use App\Observers\MandatObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Voyager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        // Voyager::useModel('SNC', \App\SNC::class);

        Reservation::observe(ReservationObserver::class);
        Mandat::observe(MandatObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
