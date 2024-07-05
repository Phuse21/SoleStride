<?php

namespace App\Livewire;

use App\Models\JobApplications;
use Livewire\Component;
use Livewire\WithFileUploads;

class JobApply extends Component
{
    use WithFileUploads;

    public $isOpen = false;
    public $job;
    public $applicant_id;
    public $cv;

    protected $rules = [
        'cv' => 'required|file|mimes:pdf,doc,docx|max:10240', // 10MB Max
    ];

    public function mount($job, $applicant_id)
    {
        $this->job = $job;
        $this->applicant_id = $applicant_id;
    }

    public function apply()
    {
        $this->validate();

        // Check if the applicant has already applied for this job
        $existingApplication = JobApplications::where('job_id', $this->job->id)
            ->where('applicant_id', $this->applicant_id)
            ->first();

        if ($existingApplication) {
            flash()->error('You have already applied for this job.');
            return;
        }

        $cvPath = $this->cv->store('cvs');

        JobApplications::create([
            'job_id' => $this->job->id,
            'applicant_id' => $this->applicant_id,
            'status' => 'pending',
            'cv_path' => $cvPath,
        ]);

        $this->resetForm();
        $this->dispatch('close-modal');
        flash()->success('Application submitted successfully.');
    }

    public function resetForm()
    {
        $this->cv = null;
    }

    public function render()
    {
        return view('livewire.job-apply');
    }
}