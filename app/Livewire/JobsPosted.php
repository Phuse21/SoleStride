<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;

class JobsPosted extends Component
{

    public $jobs;
    public $employerId;

    public function mount()
    {
        $this->employerId = auth()->user()->employer->id;
        $this->jobs = Job::with(['employer', 'tags'])
            ->where('employer_id', $this->employerId)
            ->orderBy('created_at', 'desc')
            ->get();

    }


    public function render()
    {
        return view('livewire.jobs-posted');
    }
}