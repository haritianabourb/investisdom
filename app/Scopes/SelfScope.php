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
        if(Auth::user() && !Auth::user()->hasRole(['admin', 'investisdom', 'investis'])){

            $this->contact = Contact::ofUser(Auth::user())->firstOrFail();

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

        $cgp = CGP::ofContact($this->contact, true)->first();

        if($cgp){
            return $builder->where("cgps_id", $cgp->id);
        }

        $cgp = CGP::ofContact($this->contact)->firstOrFail();


        $builder->where("cgps_id", $cgp->id)->where("user_id", $this->contact->user->id);
    }

    private function applyInvestorScope($builder, Investor $model)
    {
        $cgp = CGP::ofContact($this->contact, true)->first();

        if($cgp){
            return $builder->where("cgp_attached", $cgp->id);
        }
        $cgp = CGP::ofContact($this->contact)->firstOrFail();

        $builder->where("cgp_attached", $cgp->id);
    }

    private function applyTauxCGPScope($builder, TauxCGP $model)
    {
        $cgp = CGP::ofContact($this->contact)->firstOrFail();
        $builder->where("cgps_id", $cgp->id);
    }
}