<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class LogoutUser extends Component
{

    #[On('sweetalert:confirmed')]
    public function onConfirmed(array $payload)
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/');
    }

    #[On('sweetalert:denied')]
    public function onDeny(array $payload): void
    {

    }


    public function logout()
    {
        sweetalert()
            ->showDenyButton()
            ->info('Are you sure you want to delete the user ?');
    }
    public function render()
    {
        return view('livewire.logout-user');
    }
}