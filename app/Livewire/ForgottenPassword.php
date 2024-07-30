<?php

namespace App\Livewire;

use DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use App\Models\User;
use App\Notifications\CustomPasswordReset;

class ForgottenPassword extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|email',
    ];

    public function resetPasswordLink()
    {
        $this->validate();

        // $status = Password::broker()->sendResetLink(['email' => $this->email]);

        // if ($status === Password::RESET_LINK_SENT) {
        // Find the user
        $user = User::where('email', $this->email)->first();
        if ($user) {
            $uuid = str()->uuid();

            DB::table('password_reset_tokens')
                ->insert([
                    'email' => $this->email,
                    'token' => $uuid->toString(),
                    'created_at' => now(),
                ]);
            // Send the custom notification
            $user->notify(new CustomPasswordReset($uuid->toString()));
        }

        flash()->success(__('Password reset link sent to your email!'));
        // } else {
        //     flash()->error(__('Failed to send reset link.'));
        //     throw ValidationException::withMessages(['email' => __($status)]);
        // }

        $this->reset('email');
        $this->dispatch('close-modal', ['name' => 'forgotten-password']);
    }

    public function render()
    {
        return view('livewire.forgotten-password');
    }
}