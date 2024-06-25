<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;

// use Illuminate\Http\Request;
// use Illuminate\Support\Arr;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Validation\Rule;

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

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */

    public function show($jobId)
    {
        return view('jobDetails', ['jobId' => $jobId]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}