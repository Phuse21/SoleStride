<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Attributes\On;
use Livewire\Component;

class JobsPosted extends Component
{
    public $jobs;
    public $employerId;
    public $jobId; // Public property to store the job ID

    public function mount()
    {
        $this->employerId = auth()->user()->employer->id;
        $this->jobs = Job::with(['employer', 'tags'])
            ->where('employer_id', $this->employerId)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    #[On('sweetalert:confirmed')]
    public function onConfirmed(array $payload)
    {
        // Use the stored job ID
        $this->jobs->find($this->jobId)->delete();
        flash()->success('Job deleted successfully');
        $this->mount(); // Re-fetch the jobs
    }

    #[On('sweetalert:denied')]
    public function onDeny(array $payload): void
    {
        flash()->error('Job deletion cancelled');
    }

    public function deleteJob($jobId)
    {
        // Store the job ID
        $this->jobId = $jobId;

        sweetalert()
            ->showDenyButton()
            ->info('Are you sure you want to delete this job?');
    }

    public function render()
    {
        return view('livewire.jobs-posted');
    }
}