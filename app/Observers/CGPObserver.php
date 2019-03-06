<?php

namespace App\Observers;

use App\CGP;
use App\Events\User\CGPUserCreated;
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

        // Set Primary Contact for the CGP
        $this->setContactfor($cgp);

        // Set auxiliary Contacts for the CGP
        $this->setContactsFor($cgp);

        // TODO create default rate for cgp
    }

    public function updating(CGP $cgp){

        dd($cgp->contacts_all(), $cgp, request()->all(), request()->get("cgp_belongstomany_contact_relationship"), $cgp->getOriginal("contact_id") != $cgp->contact_id );
    }

    public function updated(CGP $cgp){

    }

    private function fillUserWith(Contact $contact, Role $role = null)
    {
        $user = User::find($contact->user_id);
        if (!$user) {
            $role = $role?? Role::where('name', 'cgp')->firstOrFail();
            $password = substr(md5($contact->email), random_int(0,5), 8);
            $user = new User;
            $user->name = $contact->full_name;
            $user->email = $contact->email;
            $user->password = bcrypt($password);
            $user->role_id = $role->id;
            $user->save();

            event(new CGPUserCreated($user, $cgp, $contact, $password));
        }

        return $user;
    }

    private function setContactfor(CGP $cgp)
    {
        // TODO contact creation cgp:
        $contact = \App\Contact::find($cgp->contact_id);
        $contact->function = $cgp->contact_status;

        $user = $this->fillUserWith($contact);

        $contact->user_id = $user->id;
        $contact->save();
    }

    private function setContactsFor(CGP $cgp)
    {

    }

}
