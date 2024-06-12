<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterUser extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $password;

    public $password_confirmation;
    public $role;
    public $employer;
    public $logo;

    public function register()
    {

        $this->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|min:3|max:255',
            'password' => 'required|confirmed|min:6',
            'employer' => 'required_if:role,employer|min:3|max:255',
            'role' => 'required',
            'logo' => 'nullable|image',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role
        ]);

        $logoPath = $this->logo->store('logos');
        $user->employer()->create([
            'name' => $this->employer,
            'logo' => 'storage/' . $logoPath
        ]);

        // Auth::login($user)

        return redirect()->route('login');

    }


    public function render()
    {
        return view('livewire.register-user');
    }
}