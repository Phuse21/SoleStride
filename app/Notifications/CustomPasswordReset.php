<?php
namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomPasswordReset extends ResetPasswordNotification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }
    public function toMail($notifiable)
    {

        // Generate the URL for password reset
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));


        return (new MailMessage)
            ->subject('Your Custom Password Reset Request')
            ->view('mail.password-reset', [
                'url' => $url,
            ]);
    }
}