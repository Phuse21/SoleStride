<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationShortlistedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    protected $application;

    public function __construct($application)
    {
        $this->application = $application;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        return [
            'application_id' => $this->application->id,
            'title' => 'Application Shortlisted',
            'message' => 'Your application for the position of ' . ($this->application?->job?->title ?? 'N/A') . ' has been shortlisted!',
            'status' => 'shortlisted',
        ];
    }
}