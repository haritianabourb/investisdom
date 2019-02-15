<?php

namespace App\Events\User;

use App\CGP;
use App\Contact;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class CGPUserCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $user;
    private $contact;
    private $cgp;
    private $password;

    /**
     * Create a new event instance.
     *
     * @param  \App\Mandat  $order
     * @return void
     */
    public function __construct(User $user, CGP $cgp, Contact $contact, string $password)
    {
        $this->user = $user;
        $this->cgp= $cgp;
        $this->contact= $contact;
        $this->password = $password;
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
     * @return Contact
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
