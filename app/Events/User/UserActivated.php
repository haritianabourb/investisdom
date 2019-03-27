<?php

namespace App\Events\User;

use App\Contact;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class UserActivated
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
    public function __construct(User $user, $password)
    {
        $this->user = $user;
        $this->password = $password;

        $this->contact = Contact::where('user_id', $user->id)->first();

    }

    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return CGP
     */
    public function getCgp(): CGP
    {
        return $this->cgp;
    }

    /**
     * @return Contact|null
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
