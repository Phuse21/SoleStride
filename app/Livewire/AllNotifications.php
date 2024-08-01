<?php

namespace App\Livewire;

use Livewire\Component;

class AllNotifications extends Component
{

    public $notifications;

    public function mount()
    {
        $this->loadNotifications();


    }

    public function loadNotifications()
    {
        $this->notifications = auth()->user()->notifications()->get();


        $this->dispatch('notificationCount', $this->notifications->count());
    }

    public function deleteNotification($notificationId)
    {
        // Find and delete the specific notification
        $notification = auth()->user()->notifications()->find($notificationId);

        if ($notification) {
            $notification->delete();
            $this->loadNotifications(); // Refresh the notifications list
        }
    }

    public function deleteAll()
    {
        // Delete all notifications for the authenticated user
        auth()->user()->notifications()->delete();

        // Refresh notifications list
        $this->loadNotifications();
    }

    public function render()
    {
        return view('livewire.all-notifications');
    }
}