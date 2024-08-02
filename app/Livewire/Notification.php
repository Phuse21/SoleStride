<?php

namespace App\Livewire;

use Livewire\Component;

class Notification extends Component
{

    public $listeners = ['notificationCount' => 'countAllNotifications'];

    public $notifications;
    public $allNotificationsCount;
    public $allNotifications;


    public function mount()
    {
        $this->allNotifications = auth()->user()->notifications()->get();

        $this->notifications = $this->allNotifications->whereNull('read_at')->take(5);

        $this->allNotificationsCount = $this->allNotifications->count();
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