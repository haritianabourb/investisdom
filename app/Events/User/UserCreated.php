<?php

namespace App\Events\User;

use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class UserCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $user;
    private $password;

    /**
     * Create a new event instance.
     *
     * @param  \App\Mandat  $order
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->password = substr(md5($user->email), random_int(0,5), 8);
    }

    public function getUser(){
        return $this->user;
    }

    public function getpassword(){
        return $this->password;
    }
}
