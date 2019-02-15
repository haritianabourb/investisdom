<?php

namespace App\Providers;

use App\Actions\ContractAction;
use App\Actions\MandatAction;
use App\Actions\SepaAction;
use Illuminate\Support\ServiceProvider;

use Voyager;

class InvestisDomPDFServiceProvider extends ServiceProvider
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
        //Custom Actions
        Voyager::addAction(ContractAction::class);
        Voyager::addAction(MandatAction::class);
        Voyager::addAction(SepaAction::class);
    }
}
