<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Support\Facades\Auth;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employer.create');
    }


    public function show($jobId)
    {
        return view('jobDetails', ['jobId' => $jobId]);
    }



    public function edit($jobId)
    {
        return view('employer.editJob', ['jobId' => $jobId]);
    }


    /**
     * Show the form for editing the specified resource.
     */


}