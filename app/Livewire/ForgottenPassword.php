<?php

namespace App\Livewire;

use DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use App\Models\User;
use App\Notifications\CustomPasswordReset;
use Carbon\Carbon;

class ForgottenPassword extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|email',
    ];

    public function resetPasswordLink()
    {
        $this->validate();

        $user = User::where('email', $this->email)->first();

        if ($user) {
            // Check if a reset link was sent in the last 2 minutes
            $lastRequest = DB::table('password_reset_tokens')
                ->where('email', $this->email)
                ->orderBy('created_at', 'desc')
                ->first();

            if ($lastRequest && Carbon::parse($lastRequest->created_at)->addMinutes(2)->isFuture()) {
                flash()->error(__('Please wait for 2 minutes before requesting another reset link.'));
                return;
            }

            // Generate and store the token with expiration
            $uuid = str()->uuid();
            $now = now();

            DB::table('password_reset_tokens')
                ->updateOrInsert(
                    ['email' => $this->email],
                    [
                        'token' => $uuid->toString(),
                        'created_at' => $now,
                    ]
                );

            // Send the custom notification
            $user->notify(new CustomPasswordReset($uuid->toString()));

            flash()->success(__('Password reset link sent to your email!'));
        } else {
            flash()->error(__('No user found with this email address.'));
            throw ValidationException::withMessages(['email' => __('No user found with this email address.')]);
        }

        $this->reset('email');
        $this->dispatch('close-modal', ['name' => 'forgotten-password']);
    }

    public function render()
    {
        return view('livewire.forgotten-password');
    }
}