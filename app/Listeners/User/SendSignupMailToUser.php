<?php
/**
 * Created by PhpStorm.
 * User: flick
 * Date: 15/02/19
 * Time: 10:11
 */

namespace App\Listeners\User;


use App\Events\User\UserCreated;
use App\Notifications\UserSignup;

class SendSignupMailToUser
{
        public function handle(UserCreated $event){
//            dd($event->getUser());
            $user = $event->getUser();
            $user->password = bcrypt($event->getpassword());
            $user->save();
            $user->notify(new UserSignup($user, $event->getpassword()));
        }
}