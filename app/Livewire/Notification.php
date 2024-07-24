<?php

namespace App\Livewire;

use Livewire\Component;

class Notification extends Component
{

    public $listeners = ['reloadNotifications' => 'refresh'];
    public $notifications;


    public function mount()
    {
        $this->notifications = auth()->user()->unreadNotifications;

    }

    public function markAsRead($notificationId)
    {
        $notification = auth()->user()->notifications()->find($notificationId);
        if ($notification) {
            $notification->markAsRead();
        }

        $this->render();
    }


    public function refresh()
    {
        $this->render();
    }
    public function render()
    {
        return view('livewire.notification');
    }
}