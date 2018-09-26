<?php

namespace App\Providers;

use App\Reservation;
use App\Mandat;
use App\Observers\MandatObserver;
use App\Observers\ReservationObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Services\InvestisPDF;

use Voyager;

class AppServiceProvider extends ServiceProvider
{

  /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    // protected $defer = true;

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
      // $this->app->singleton('fpdf', function()
      $this->app->extend('fpdf' , function() {
        return new InvestisPDF(config('fpdf.orientation'), config('fpdf.unit'), config('fpdf.size'));
      });
      // });
    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [InvestisPDF::class];
    }
}
