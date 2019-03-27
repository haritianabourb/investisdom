<?php

namespace App\Observers;

use App\CGP;
use App\Contact;
use App\Events\User\CGPUserCreated;

// use App\TauxCGP;
use App\Events\User\UserActivated;
use App\Services\Amortization;

use App\User;
use Illuminate\Support\Str;
use Log;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Role;
use Carbon\Carbon;

use DB;
use Schema;

class UserObserver
{

    public function activating(User $user)
    {
        $password = generate_password();
        $user->password = bcrypt($password);
        $user->save();

        event(new UserActivated($user, $password));
    }

}
