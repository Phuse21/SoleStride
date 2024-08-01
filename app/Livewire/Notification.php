<?php

namespace App\Livewire;

use Livewire\Component;

class Notification extends Component
{

    public $listeners = ['notificationCount' => 'countAllNotifications'];

    public $notifications;
    public $allNotificationsCount;


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
        $this->notifications->markAsRead();
        $this->mount();
    }

    public function countAllNotifications($notificationCount)
    {
        $this->allNotificationsCount = $notificationCount;
    }

    public function render()
    {
        return view('livewire.notification');
    }
}