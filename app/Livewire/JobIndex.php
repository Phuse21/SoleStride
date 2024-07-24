<?php

namespace App\Livewire;

use App\Models\Job;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class JobIndex extends Component
{

    use WithPagination;
    public $tags;





    public function mount()
    {
        // $this->loadJobs();
        $this->resetPage();
        $this->tags = Tag::all();
    }




    public function render()
    {
        $featuredJobs = Job::with(['employer', 'tags'])
            ->latest('id')
            ->where('featured', true)
            ->paginate(6);
        // dd($featuredJobs);


        $regularJobs = Job::with(['employer', 'tags'])
            ->latest('id')
            ->where('featured', false)
            ->paginate(6);


        return view('livewire.job-index', [
            'featuredJobs' => $featuredJobs,
            'regularJobs' => $regularJobs
        ]);
    }
}