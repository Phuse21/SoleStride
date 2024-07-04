<?php

namespace App\Livewire;

use App\Models\Applicants;
use Livewire\Component;
use Livewire\WithFileUploads;

class JobApply extends Component
{

    // use WithFileUploads;

    // public $isOpen = false;
    // public $job;
    // public $applicant_id;
    // public $cv;

    // protected $rules = [
    //     'cv' => 'required|file|mimes:pdf,doc,docx|max:10240', // 10MB Max
    // ];

    // public function mount($job, $applicant_id)
    // {
    //     $this->job = $job;
    //     $this->applicant_id = $applicant_id;
    // }

    // public function submit()
    // {
    //     $this->validate();

    //     $cvPath = $this->cv->store('cvs');

    //     // Save the data to the database or process it as needed
    //     Applicants::create([
    //         'applicant_id' => $this->applicant_id,
    //         'employer_name' => $this->job->employer->name,
    //         'job_id' => $this->job->id,
    //         'cv_path' => $cvPath,
    //     ]);

    //     $this->resetForm();
    //     $this->dispatchBrowserEvent('close-modal');
    // }

    // public function resetForm()
    // {
    //     $this->cv = null;
    // }

    public function render()
    {
        return view('livewire.job-apply');
    }
}