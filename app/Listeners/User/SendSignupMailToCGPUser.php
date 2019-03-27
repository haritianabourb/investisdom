<?php
/**
 * Created by PhpStorm.
 * User: flick
 * Date: 15/02/19
 * Time: 10:11
 */

namespace App\Listeners\User;


use App\CGP;
use App\Contact;
use App\Events\User\CGPUserCreated;
use App\Notifications\CGPUserSignup;

class SendSignupMailToCGPUser
{
        public function handle(CGPUserCreated $event){
            $user = $event->getUser();
//            $user->password = bcrypt($event->getPassword());
//            $user->save();
            $user->notify(new CGPUserSignup($user, $event->getCgp(), $event->getContact(), $event->getpassword()));
        }
}