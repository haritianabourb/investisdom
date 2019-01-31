<?php

namespace App\Providers;

use App\Actions\ContractAction;
use App\Actions\MandatAction;
use App\Actions\YousignAction;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\FormFields\MoneyFormField;
use App\FormFields\PercentageFormField;

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
        //Custom Form Fields
        Voyager::addFormField(MoneyFormField::class);
        Voyager::addFormField(PercentageFormField::class);

        //Custom Actions
        Voyager::addAction(ContractAction::class);
        Voyager::addAction(MandatAction::class);
        Voyager::addAction(YousignAction::class);

    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        //
    }
}
