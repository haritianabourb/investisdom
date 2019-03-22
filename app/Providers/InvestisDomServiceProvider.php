<?php

namespace App\Providers;

use App\Actions\ActivateAction;
use Illuminate\Support\ServiceProvider;
use App\FormFields\EmailHandler;
use App\FormFields\MoneyHandler;
use App\FormFields\PercentageHandler;

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
        Voyager::addFormField(EmailHandler::class);
        Voyager::addFormField(MoneyHandler::class);
        Voyager::addFormField(PercentageHandler::class);

        Voyager::addAction(ActivateAction::class);
        Voyager::replaceAction(EditAction::class, \App\Actions\EditAction::class);
    }
}
