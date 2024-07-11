<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function profile()
    {
        return view('profile');
    }
}