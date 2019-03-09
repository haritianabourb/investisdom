<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\FormFields\MoneyFormField;
use App\FormFields\PercentageFormField;

use TCG\Voyager\Actions\EditAction;
use Validator;
use Voyager;


class InvestisDomServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('siren', '\App\Validators\SIRENValidator@validate');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //Custom Form Fields
        Voyager::addFormField(MoneyFormField::class);
        Voyager::addFormField(PercentageFormField::class);
        Voyager::replaceAction(EditAction::class, \App\Actions\EditAction::class);
    }
}
