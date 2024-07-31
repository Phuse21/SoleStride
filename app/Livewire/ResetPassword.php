<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
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

    const TOKEN_INVALID = 'passwords.token';
    const TOKEN_EXPIRED = 'passwords.token_expired';
    const INVALID_USER = 'passwords.user';

    public function mount($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    public function resetPassword()
    {
        $this->validate();

        $status = $this->customResetPassword([
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'token' => $this->token,
        ]);

        if ($status === 'Password reset successfully.') {
            flash()->success(__('Password reset successfully.'));
            return redirect()->route('login');
        } else {
            flash()->error(__($status));
            throw ValidationException::withMessages(['email' => __($status)]);
        }
    }

    protected function customResetPassword($credentials)
    {
        // 1. Validate the token and email
        $tokenData = DB::table('password_reset_tokens')->where([
            'email' => $credentials['email'],
            'token' => $credentials['token'],
        ])->first();

        if (!$tokenData) {
            return self::TOKEN_INVALID;
        }

        // 2. Verify token expiration
        $tokenExpirationMinutes = config('auth.passwords.users.expire', 60);
        $tokenCreatedAt = Carbon::parse($tokenData->created_at);

        if ($tokenCreatedAt->addMinutes($tokenExpirationMinutes)->isPast()) {
            return self::TOKEN_EXPIRED;
        }

        // 3. Hash the new password
        $hashedPassword = Hash::make($credentials['password'], [
            'rounds' => config('hashing.bcrypt.rounds', 10),
        ]);

        // 4. Update the user's password
        $user = \App\Models\User::where('email', $credentials['email'])->first();
        if ($user) {
            $user->forceFill([
                'password' => $hashedPassword,
            ])->save();
        } else {
            return self::INVALID_USER;
        }

        // 5. Delete the token after successful reset
        DB::table('password_reset_tokens')->where([
            'email' => $credentials['email'],
        ])->delete();

        return 'Password reset successfully.';
    }

    public function render()
    {
        return view('livewire.reset-password');
    }
}