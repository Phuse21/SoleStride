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
        $jobs = Job::latest()->with(['employer', 'tags'])->get()->groupBy('featured');

        // Initialize the variables with empty collections if the keys do not exist
        $featuredJobs = $jobs->get(1, collect());
        $regularJobs = $jobs->get(0, collect());

        return view('index', [
            'featuredJobs' => $featuredJobs,
            'jobs' => $regularJobs,
            'tags' => Tag::all()
        ]);
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
    // public function store(Request $request)
    // {
    //     //validate
    //     $attributes = $request->validate([
    //         'title' => 'required',
    //         'salary' => 'required',
    //         'location' => 'required',
    //         'schedule' => ['required', Rule::in(['full-time', 'part-time', 'remote'])],
    //         'url' => ['required',],
    //         'tags' => 'nullable',
    //     ]);

    //     $attributes['featured'] = $request->has('featured');

    //     $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, ['tags']));

    //     if ($attributes['tags'] ?? false) {
    //         foreach (explode(',', $attributes['tags']) as $tag) {
    //             $job->tag($tag);
    //         }

    //     }

    //     return redirect('/');
    // }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
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