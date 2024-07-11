<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index()
    {
        return view('employer.home');
    }

    public function jobsPosted()
    {

        return view('employer.jobsPosted');
    }

    public function edit(Job $job)
    {
        return view('employer.editJob', ['job' => $job]);
    }

    public function profile()
    {
        return view('profile');
    }
}