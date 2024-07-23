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
    public $perPageFeatured = 6;
    public $perPageRegular = 3;




    public function mount()
    {
        // $this->loadJobs();
        $this->tags = Tag::all();
    }

    public function loadMoreFeatured()
    {

        $this->perPageFeatured += 3;

        // $this->loadJobs();
    }

    public function loadLessFeatured()
    {
        $this->perPageFeatured = 6;
    }




    public function loadMoreRegular()
    {

        $this->perPageRegular += 3;
    }

    public function loadLessRegular()
    {
        $this->perPageRegular = 3;
    }


    public function render()
    {
        $jobs = Job::latest()->with(['employer', 'tags'])
            ->latest('id')
            ->get()->groupBy('featured');
        return view('livewire.job-index', [
            'jobs' => $jobs
        ]);
    }
}