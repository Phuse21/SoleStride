<?php

namespace App\Livewire;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateJob extends Component
{

    public $title;
    public $salary;
    public $location;
    public $schedule;
    public $url;
    public $tags;
    public $featured;
    public $mode;

    public function createJob()
    {
        // dd(
        //     $this->mode,
        //     $this->title,
        //     $this->salary,
        //     $this->location,
        //     $this->schedule,
        //     $this->url,
        //     $this->tags,
        //     $this->featured
        // );

        $attributes = $this->validate([
            'title' => 'required',
            'salary' => 'required',
            'location' => 'required',
            'schedule' => 'required',
            'featured' => 'nullable',
            'mode' => 'required',
            'url' => 'required',
            'tags' => 'nullable',
        ]);

        // Include the 'feature' attribute if it is set
        $attributes['featured'] = $this->featured ?? false;

        // Get the authenticated user's employer
        $employer = Auth::user()->employer;

        // Create the job excluding the tags attribute
        $job = $employer->jobs()->create(Arr::except($attributes, ['tags']));

        // Handle tags if provided
        if ($attributes['tags'] ?? false) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag($tag); // Assuming the Job model has a method 'tag'
            }
        }

        // Redirect with a success message
        return redirect('/');
    }
    public function render()
    {
        return view('livewire.create-job');
    }
}