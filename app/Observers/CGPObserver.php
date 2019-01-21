<?php

namespace App\Observers;

use App\CGP;
use App\Mandat;
// use App\TauxCGP;
use App\Services\Amortization;
use \App\Http\Traits\HasFieldsToCalculate;

use App\User;
use TCG\Voyager\Models\Role;
use Carbon\Carbon;

use DB;
use Schema;

class CGPObserver
{

    /**
     * Handle the contract "creating" event.
     *
     * @param  \App\Mandat $cgp
     * @return void
     */
    public function creating(CGP $cgp)
    {
        $cgp->identifiant = "ATTEMPTID";
    }

    /**
     * Handle the contract "created" event.
     *
     * @param  \App\Mandat $cgp
     * @return void
     */
    public function created(CGP $cgp)
    {
        $identifiant =
            substr(preg_replace('/\s/', '', stripAccents($cgp->name)), 0, 3)
            . substr(preg_replace('/\s/', '', stripAccents($cgp->registered_key)), -3)
            . "/" . $cgp->id;

        // XXX little hack to not thrown the saving event for calculations
        DB::table($cgp->getTable())->where('id', $cgp->id)->update(['identifiant' => $identifiant]);

        // TODO contact creation cgp:
//        $contact = \App\Contact::find($cgp->contact_id);
//        $user = User::find($contact->user_id);
//        if (!$user) {
//            $role = Role::where('name', 'cgp')->firstOrFail();
//            $user = new User;
//            $user->name = $contact->full_name;
//            $user->email = $contact->email ?? "test@email.com";
//            $user->password = bcrypt('password');
//            $user->role_id = $role->id;
//            $user->save();
//
//            $contact->user_id = $user->id;
//        }

        // TODO create default rate for cgp
    }


}
