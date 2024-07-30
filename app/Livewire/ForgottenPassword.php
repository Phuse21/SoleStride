<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class ForgottenPassword extends Component
{

    public $email;

    protected $rules = [

        'email' => 'required|email',
    ];

    public function resetPasswordLink()
    {
        $this->validate();

        $status = Password::sendResetLink(['email' => $this->email]);

        if ($status === Password::RESET_LINK_SENT) {
            flash()->success(__('Password reset link sent to your email!'));
        } else {
            flash()->error(__('Failed to send reset link.'));
            throw ValidationException::withMessages(['email' => __($status)]);
        }

        $this->reset('email');
        $this->dispatch('close-modal', ['name' => 'forgotten-password']);
    }
    public function render()
    {
        return view('livewire.forgotten-password');
    }
}