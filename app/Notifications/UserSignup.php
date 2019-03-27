<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserSignup extends Notification
{
    use Queueable;

    protected $user;
    protected $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $password = null)
    {
        if(!$password) {
            return false;
        }
        $this->user = $user;
        $this->password = $password;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject("{$this->user->name}, Bienvenue sur Investis DOM!")
                    ->greeting('Bienvenue sur Investis-DOM.')
                    ->line("{$this->user->name}, nous vous invitons sur la plateforme ".url('/')."." )
                    ->line("votre identifiant: {$this->user->email}"  )
                    ->line("votre mot de passe: {$this->password}"  )
                    ->action('Connectez vous dès maintenant!', route('voyager.login'))
                    ->salutation('Merci de votre interêt pour Investis DOM!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
