<?php

namespace App\Providers;


use App\CGP;
use App\Events\User\UserActivated;
use App\Investor;
use App\Listeners\User\SendSignupMailToUser;
use App\Mandat;
use App\Observers\UserObserver;
use App\Reservation;
use App\SNC;
use App\Events\User\CGPUserCreated;
use App\Listeners\User\SendSignupMailToCGPUser;
use App\Observers\CGPObserver;
use App\Observers\InvestorObserver;
use App\Observers\MandatObserver;
use App\Observers\ReservationObserver;
use App\Observers\SNCObserver;

use App\User;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UserActivated::class => [SendSignupMailToUser::class],
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
        Investor::observe(InvestorObserver::class);
        Mandat::observe(MandatObserver::class);
        Reservation::observe(ReservationObserver::class);
        SNC::observe(SNCObserver::class);
        User::observe(UserObserver::class);
    }
}
