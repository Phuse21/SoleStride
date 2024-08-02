<?php

namespace App\Livewire;

use App\Mail\ApplyJobMail;
use App\Models\JobApplications;
use Illuminate\Support\Facades\Mail;
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

            if ($existingApplication->status === 'pending') {
                //update the cv for the existing application
                $cvPath = $this->cv->store('cvs');
                $existingApplication->update([
                    'cv_path' => $cvPath,
                ]);
                flash()->success('Application updated successfully.');
            } else {
                flash()->error('You can only update pending applications.');
            }

        } else {
            // Create a new application if none exists
            $cvPath = $this->cv->store('cvs');

            $application = JobApplications::create([
                'job_id' => $this->job->id,
                'applicant_id' => $this->applicant_id,
                'employer_id' => $this->job->employer_id,
                'status' => 'pending',
                'cv_path' => $cvPath,
            ]);

            // Send email
            Mail::to($application->applicants->user)->queue(new ApplyJobMail($application));

            flash()->success('Application submitted successfully.');
        }

        $this->dispatch('updatedCV', $cvPath);
        $this->dispatch('close-modal', ['name' => 'apply']);
        $this->reset('cv');
    }


    public function render()
    {
        return view('livewire.job-apply');
    }
}