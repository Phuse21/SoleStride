<?php

namespace App\Livewire;

use App\Models\Job;
use App\Models\Tag;
use Livewire\Component;

class JobIndex extends Component
{

    public $featuredJobs;
    public $regularJobs;
    public $tags;

    public function mount()
    {
        $jobs = Job::latest()->with(['employer', 'tags'])->get()->groupBy('featured');

        // Initialize the variables with empty collections if the keys do not exist
        $this->featuredJobs = $jobs->get(1, collect());
        $this->regularJobs = $jobs->get(0, collect());
        $this->tags = Tag::all();

        // return view('index', [
        //     'featuredJobs' => $this->featuredJobs,
        //     'jobs' => $this->regularJobs,
        //     'tags' => $this->tags
        // ]);
    }



    public function render()
    {
        return view('livewire.job-index');
    }
}