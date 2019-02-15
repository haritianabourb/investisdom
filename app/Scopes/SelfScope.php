<?php

namespace App\Scopes;

use App\CGP;
use App\Contact;
use App\Investor;
use App\Reservation;
use App\TauxCGP;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use Auth;

class SelfScope implements Scope
{
    protected $contact;

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if(!Auth::user()->hasRole('admin', 'investisdom')){
            $this->contact = Contact::where('user_id', Auth::user()->id)->firstOrFail();
            if(get_class($model) == Reservation::class){
                $this->applyReservationScope($builder, $model);
            }
            if(get_class($model) == Investor::class){
                $this->applyInvestorScope($builder, $model);
            }
            if(get_class($model) == TauxCGP::class){
                $this->applyTauxCGPScope($builder, $model);
            }
        }
    }

    private function applyReservationScope(Builder $builder, Reservation $model)
    {
        $cgp = CGP::where('contact_id', $this->contact->id)->firstOrFail();
        $builder->where("cgps_id", $cgp->id);
    }

    private function applyInvestorScope($builder, Investor $model)
    {
        $cgp = CGP::where('contact_id', $this->contact->id)->firstOrFail();
        $builder->where("cgp_attached", $cgp->id);
    }

    private function applyTauxCGPScope($builder, TauxCGP $model)
    {
        $cgp = CGP::where('contact_id', $this->contact->id)->firstOrFail();
        $builder->where("cgps_id", $cgp->id);
    }
}