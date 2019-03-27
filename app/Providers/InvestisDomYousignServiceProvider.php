<?php

namespace App\Providers;

use App\Actions\YousignAction;
use Illuminate\Support\ServiceProvider;

use Voyager;

class InvestisDomYousignServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        Voyager::addAction(YousignAction::class);
    }
}
