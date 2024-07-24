<?php

namespace App\Livewire;

use Livewire\Component;

class Notification extends Component
{

    public $notifications;


    public function mount()
    {
        $this->notifications = auth()->user()
            ->unreadNotifications
            ->take(5);


    }

    public function markAsRead($notificationId)
    {
        $notification = auth()->user()->notifications()->find($notificationId);
        if ($notification) {
            $notification->markAsRead();
        }

        $this->mount();
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        $this->mount();
    }


    public function render()
    {
        return view('livewire.notification');
    }
}