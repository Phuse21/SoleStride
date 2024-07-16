<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdatePassword extends Component
{

    public $current_password;
    public $password;
    public $password_confirmation;


    public function updatePassword()
    {

        $this->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        // Check if the current password matches the user's password
        if (!Hash::check($this->current_password, Auth::user()->password)) {
            return flash()->error('The current password you entered is incorrect.');
        }

        // Check if the new password is the same as the current password
        if (Hash::check($this->password, Auth::user()->password)) {
            return flash()->error('The new password must be different from the current password.');
        }


        // Update the password
        Auth::user()->update([
            'password' => Hash::make($this->password)
        ]);

        flash()->success('Password updated successfully.');
        $this->dispatch('close-modal', ['name' => 'update-password']);
        $this->reset();
    }
    public function render()
    {
        return view('livewire.update-password');
    }
}