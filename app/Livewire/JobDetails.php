<?php

namespace App\Livewire;

use App\Models\Job;
use App\Models\JobApplications;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class JobDetails extends Component
{
    public $listeners = ['updatedCV' => 'updateCV'];
    public $job;
    public $hasApplied = false;
    public $cvPath = null;

    public function mount($jobId)
    {
        $this->job = Job::with(['employer', 'tags'])->findOrFail($jobId);

        // Check if the authenticated user has applied for this job
        if (Auth::check()) {
            $application = JobApplications::where('job_id', $jobId)
                ->whereHas('applicants', function ($query) {
                    $query->where('user_id', Auth::id());
                })
                ->first();

            if ($application) {
                $this->hasApplied = true;
                $this->cvPath = $application->cv_path;
            }
        }
    }

    public function updateCV($cvPath)
    {
        $this->cvPath = $cvPath;
        $this->render();
    }

    public function render()
    {
        return view('livewire.job-details');
    }
}