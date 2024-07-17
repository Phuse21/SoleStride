<?php

namespace App\Livewire;

use App\Models\Job;
use App\Models\JobApplications;
use Livewire\Component;

class ApplicationsSent extends Component
{

    // public $pendingApplications;
    // public $shortlistedApplications;
    public $applications;

    public function mount()
    {
        //retrieve applications with the necessary relationships
        $this->applications = JobApplications::with('job.tags', 'job', 'job.employer')
            ->where('applicant_id', auth()->user()->applicant->id)
            ->get();

        // $this->pendingApplications = $this->applications->where('status', 'pending');
        // $this->shortlistedApplications = $this->applications->where('status', 'shortlisted');
    }
    public function render()
    {
        return view('livewire.applications-sent');
    }
}