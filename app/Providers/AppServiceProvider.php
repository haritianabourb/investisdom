<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
        // Voyager::useModel('SNC', \App\SNC::class);
        Validator::extend('siren', '\App\Validators\SIRENValidator@validate');
        DB::getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('status_pages', 'text');
        DB::getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('post_status', 'text');
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
