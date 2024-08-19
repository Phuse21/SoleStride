<?php

namespace App\Livewire;

use Livewire\Component;

class AllNotifications extends Component
{

    public $listeners = ['loadNotifications'];
    public $notifications;

    public function mount($notifications)
    {
        $this->notifications = $notifications;
    }

    public function loadNotifications()
    {
        $this->notifications = auth()->user()->notifications()->get();

        $this->dispatch('notificationCount', $this->notifications->count());
    }

    public function deleteNotification($notificationId)
    {
        // Find and delete the specific notification
        $notification = $this->notifications->where('id', $notificationId)->first();

        if ($notification) {
            $notification->delete();
            $this->loadNotifications(); // Refresh the notifications list
        }
    }

    public function deleteAll()
    {
        \App\Models\Notification::where('notifiable_id', auth()->id())
            ->where('notifiable_type', 'App\Models\User') // Assuming the `notifiable_type` is 'App\Models\User'
            ->delete();

        // Refresh notifications list
        $this->loadNotifications();

        $this->dispatch('close modal', ['name' => 'all-notifications']);
    }

    public function render()
    {
        return view('livewire.all-notifications');
    }
}