<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomPasswordReset extends ResetPasswordNotification implements ShouldQueue
{
    use Queueable;
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
            ->subject('Password Reset')
            ->view('mail.password-reset', [
                'url' => $url,
            ]);
    }
}