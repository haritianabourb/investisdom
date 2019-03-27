<?php

namespace App\Notifications;

use App\CGP;
use App\Contact;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class CGPUserSignup extends Notification
{
    use Queueable;

    protected $user;
    protected $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user,CGP $cgp,Contact $contact = null, string $password = null)
    {
        if(!$password) {
            return false;
        }
        $this->user = $user;
        $this->cgp = $cgp;
        $this->contact = $contact;
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
        $mail = new MailMessage;
        $mail->subject("{$this->contact->full_name}, Bienvenue sur Investis DOM!")
            ->greeting('Bienvenue sur Investis-DOM.')
            ->line("{$this->user->name}, nous vous invitons sur la plateforme ".url('/')."." )
            ->line("votre identifiant: {$this->user->email}"  )
            ->line("votre mot de passe: {$this->password}"  )
            ->action('Connectez vous dès maintenant!', route('voyager.login'));

        $cgp_information = new HtmlString(view('vendor.voyager.partials.mail.cgp', ['cgp'=>$this->cgp, 'contact'=>$this->contact])->render());

        $mail->line($cgp_information);


        $mail->salutation('Merci de votre interêt pour Investis DOM!');

        return $mail;
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
        ];
    }
}
