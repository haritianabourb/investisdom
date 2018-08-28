<?php

namespace App\Policies;

use TCG\Voyager\Contracts\User;
use TCG\Voyager\Policies\BasePolicy;

class UserPolicy extends BasePolicy
{
    /**
     * Determine if the given model can be viewed by the user.
     *
     * @param \TCG\Voyager\Contracts\User $user
     * @param  $model
     *
     * @return bool
     */
    public function read(User $user, User $model)
    {
        // Does this record belong to the current user?
        $current = $user->id === $model->id;

        return $current || ($this->checkPermission($user, $model, 'read') && $this->checkIfAdmin($user, $model));
    }

    /**
     * Determine if the given model can be edited by the user.
     *
     * @param \TCG\Voyager\Contracts\User $user
     * @param  $model
     *
     * @return bool
     */
    public function edit(User $user, User $model)
    {
        // Does this record belong to the current user?
        $current = $user->id === $model->id;
        //XXX i don't know why
        if(is_null($model->id)) return false;
        return $current || ($this->checkPermission($user, $model, 'edit') && $this->checkIfAdmin($user, $model));
    }

    /**
     * Determine if the given user can change a user a role.
     *
     * @param \TCG\Voyager\Contracts\User $user
     * @param  $model
     *
     * @return bool
     */
    public function editRoles(User $user,User $model)
    {
        // Does this record belong to another user?
        $another = $user->id != $model->id;

        return $another && $user->hasPermission('edit_users') && $this->checkIfAdmin($user, $model);
    }

    protected function checkIfAdmin(User $user, User $model){
      return $user->role->name === 'admin' || $model->role->name !== 'admin';
    }
}
