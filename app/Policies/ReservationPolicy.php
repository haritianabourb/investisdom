<?php

namespace App\Policies;

use App\Reservation;
use Auth;
use TCG\Voyager\Contracts\User;
use TCG\Voyager\Policies\BasePolicy;

class ReservationPolicy extends BasePolicy
{
    /**
     * Determine if the given model can be viewed by the user.
     *
     * @param \TCG\Voyager\Contracts\User $user
     * @param  \App\Reservation $model
     *
     * @return bool
     */
    public function read(User $user, Reservation $model)
    {
        // Does this record belong to the current user?
//        $current = $user->id === $model->user_id;
//        return $current || ($this->checkPermission($user, $model, 'read') && $this->checkIfAdmin($user));.
        return true;
    }

    /**
     * Determine if the given model can be edited by the user.
     *
     * @param \TCG\Voyager\Contracts\User $user
     * @param  \App\Reservation $model
     *
     * @return bool
     */
    public function edit(User $user, Reservation $model)
    {
//        $current = $user->id === $model->user_id;
//        if(is_null($model->user_id)) return false;
//        return $current || ($this->checkPermission($user, $model, 'edit') && $this->checkIfAdmin($user));

        if($model->yousign_procedure_id == "archive"){
            return Auth::user()->hasRole(["admin", "administrator", "investis", "investisdom"]);
        }


        return true;
    }

    protected function checkIfAdmin(User $user){
      return in_array($user->role->name, ['admin', 'investisdom']);
    }
}
