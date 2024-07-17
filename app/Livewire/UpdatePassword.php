<?php

namespace App\Livewire;

use App\Mail\UpdatePasswordMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\User;

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

        $user = Auth::user();

        // Check if the current password matches the user's password
        if (!Hash::check($this->current_password, $user->password)) {
            return flash()->error('The current password you entered is incorrect.');
        }

        // Check if the new password is the same as the current password
        if (Hash::check($this->password, $user->password)) {
            return flash()->error('The new password must be different from the current password.');
        }

        // Update the password
        $user->update([
            'password' => Hash::make($this->password)
        ]);

        Mail::to($user)->queue(new UpdatePasswordMail($user));

        flash()->success('Password updated successfully.');
        $this->dispatch('close-modal', ['name' => 'update-password']);
        $this->reset();
    }

    public function render()
    {
        return view('livewire.update-password');
    }
}