<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    //     public function store(Request $request)
//     {
//         //validate
//         $attributes = request()->validate([
//             'email' => ['required', 'email'],
//             'password' => ['required']
//         ]);
//         //attempt to login
//         if (!Auth::attempt($attributes)) {
//             throw ValidationException::withMessages([
//                 'password' => 'Invalid Login'
//             ]);
//         }
//         //regenerate session
//         request()->session()->regenerate();
//         //redirect to home page
//         return redirect('/');
//     }
//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy()
//     {
//         Auth::logout();
//         return redirect('/');
//     }
}