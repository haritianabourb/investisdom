<?php

namespace App\Observers;

use App\CGP;
use App\Contact;
use App\Events\User\CGPUserCreated;

// use App\TauxCGP;
use App\Services\Amortization;

use App\User;
use Log;
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
        $this->setContactfor($cgp);
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

        // FIXME little hack to not thrown the saving event for calculations
        DB::table($cgp->getTable())->where('id', $cgp->id)->update(['identifiant' => $identifiant]);


    }

    public function belongsToManyAttached($relation, CGP $cgp, $id) {
        $contact = Contact::where("id", $id)->first();
        $this->fillUserWith($cgp, $contact);

    }

    public function belongsToManyDetached($relation, CGP $cgp, $id) {
        $contact = Contact::where("id", $id)->first();

        $user = User::find($contact->user_id);

        if($user){
            $user->role_id = null;
            $user->roles()->detach();
            $user->save();
        }


    }

    private function fillUserWith(CGP $cgp, Contact $contact, Role $role = null)
    {
        $user = User::find($contact->user_id);

        if (!$user) {
            $password = substr(md5($contact->email), random_int(0,5), 8);
            $user = new User;
            $user->name = $contact->full_name;
            $user->email = $contact->email;
            $user->password = bcrypt($password);

            // FIXME throw me on user observer when created
            $user->save();
            event(new CGPUserCreated($user, $cgp, $contact, $password));

        }

        $role = Role::where('name', $role ?? 'cgp')->firstOrFail();
        $user->role_id = $role->id;

        $user->save();

        $contact->user_id = $user->id;
        $contact->save();

        return $user;
    }

    private function setContactfor(CGP $cgp)
    {
        $contact = \App\Contact::find($cgp->contact_id);

        // FIXME Fastest resolving for pdf action and cgp profile, need to resolve this.
        $cgp->contact_status = $contact->function;

        $user = $this->fillUserWith($cgp, $contact);

        $contact->user_id = $user->id;
        $contact->save();
    }

}
