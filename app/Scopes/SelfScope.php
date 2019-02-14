<?php

namespace App\Scopes;

use App\CGP;
use App\Contact;
use App\Reservation;
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
        if(!Auth::user()->hasRole('admin', 'investis')){
            $this->contact = Contact::where('user_id', Auth::user()->id)->firstOrFail();
            if(get_class($model) == Reservation::class){
                $builder = $this->applyReservationScope($builder, $model);
            }
        }
    }

    private function applyReservationScope(Builder $builder, Reservation $model)
    {
        $cgp = CGP::where('contact_id', $this->contact->id)->firstOrFail();
        return $builder->where("cgps_id", $cgp->id);
    }
}