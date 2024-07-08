<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;

class JobDetails extends Component
{
    public $job;

    public function mount($jobId)
    {
        $this->job = Job::with(['employer', 'tags'])->findOrFail($jobId);
    }

    public function render()
    {
        return view('livewire.job-details');
    }
}