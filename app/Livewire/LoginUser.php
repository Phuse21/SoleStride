<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;


class LoginUser extends Component
{

    public $email;
    public $password;

    public $redirectUrl;

    public function mount()
    {
        // Initialize the redirectUrl property
        $this->redirectUrl = request()->query('redirect', '/'); // Default to '/' if no redirect URL is provided
    }


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

        flash()->flash('success', 'Welcome ' . $user->name . '!');

        //if employer redirect to employer home
        if ($user->role == 'employer') {
            return redirect()->route('employer.home');
        }

        // Redirect to the intended URL if provided
        return redirect($this->redirectUrl);
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