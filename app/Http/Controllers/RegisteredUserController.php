<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate attributes
        $userAttributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);

        $employerAttributes = $request->validate([
            'employer' => ['required', 'max:255'],
            'logo' => ['required', File::types(['png', 'jpg', 'jpeg', 'svg'])]
        ]);
        //create a user
        $user = User::create($userAttributes);
        //store the logo
        $logoPath = $request->logo->store('logos');
        //create employer
        $user->employer()->create([
            'name' => $employerAttributes['employer'],
            'logo' => 'storage/' . $logoPath
        ]);
        //redirect to home page
        Auth::login($user);
        return redirect('/');
    }

}