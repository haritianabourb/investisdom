<?php

namespace App\Http\Controllers\Investis;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerUserController as BaseVoyagerUserController;


class VoyagerUserController extends BaseVoyagerUserController
{

    // POST BR(E)AD
    public function update(Request $request, $id)
    {
        if (app('VoyagerAuth')->user()->getKey() == $id) {
            $request->merge([
                'role_id'                              => app('VoyagerAuth')->user()->role_id,
                'user_belongstomany_role_relationship' => app('VoyagerAuth')->user()->roles->pluck('id')->toArray(),
            ]);
        }

        $return = parent::update($request, $id);

        if(auth()->user()->hasRole(["admin", "investis"])){
            return $return;
        }

        return redirect()->route('voyager.profile');
    }
}
