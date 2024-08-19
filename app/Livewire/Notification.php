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

        $this->notifications = $this->allNotifications->whereNull('read_at');

        $this->allNotificationsCount = $this->allNotifications->count();
    }

    public function markAsRead($notificationId)
    {
        $notification = auth()->user()->notifications()->find($notificationId);
        if ($notification) {
            $notification->markAsRead();
        }

        $this->mount();
        $this->dispatch('loadNotifications');
    }

    public function markAllAsRead()
    {
        \App\Models\Notification::whereIn(
            'id',
            $this->notifications->pluck('id')
        )->update(['read_at' => now()]);
        $this->mount();
        $this->dispatch('loadNotifications');

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