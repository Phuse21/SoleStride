<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class ResetPassword extends Component
{


    public $token;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'password' => 'required|confirmed|min:8',
    ];

    public function mount($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    public function resetPassword()
    {
        $this->validate();

        $status = Password::reset([
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'token' => $this->token
        ], function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password),
            ])->save();
        });

        if ($status === Password::PASSWORD_RESET) {
            flash()->success(__('Password reset successfully.'));
            return redirect()->route('login');
        } else {
            flash()->error(__('Invalid token.'));
            throw ValidationException::withMessages(['email' => __($status)]);
        }

    }
    public function render()
    {
        return view('livewire.reset-password');
    }
}