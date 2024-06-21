<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;


class LoginUser extends Component
{

    public $email;
    public $password;

    public function login()
    {
        //validate
        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        //attempt to login
        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'password' => 'Invalid Login'
            ]);
        }
        //regenerate session
        request()->session()->regenerate();


        $user = Auth::user();

        flash()->success('Logged in as ' . $user->name . '!');

        //if applicant redirect to home
        if ($user->role == 'employer') {
            return redirect()->route('employer.home');
        }

        return redirect()->route('home');

    }

    public function destroy()
    {

        Auth::logout();
        return redirect('/');
    }


    public function render()
    {
        return view('livewire.login-user');
    }
}