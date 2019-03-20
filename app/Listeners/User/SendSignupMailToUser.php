<?php
/**
 * Created by PhpStorm.
 * User: flick
 * Date: 15/02/19
 * Time: 10:11
 */

namespace App\Listeners\User;


use App\CGP;
use App\Events\User\UserActivated;
use App\Notifications\CGPUserSignup;
use App\Notifications\UserSignup;

class SendSignupMailToUser
{
        public function handle(UserActivated $event){
//            dd($event->getUser());
            $user = $event->getUser();

            $signup = null;

            if($contact = $event->getContact()){
                $cgp = CGP::ofContact($contact)->first();
                if($cgp){
                    $signup = new CGPUserSignup($user, $cgp, $contact, $event->getpassword());
                }
            }

            $user->notify($signup ?? new UserSignup($user, $event->getpassword()));


        }
}