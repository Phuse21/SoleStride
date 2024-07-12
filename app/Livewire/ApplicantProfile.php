<?php

namespace App\Livewire;

use App\Models\JobApplications;
use Livewire\Component;

class ApplicantProfile extends Component
{

    public $applications;
    public $applicants;


    public function mount()
    {

        $this->applicants = auth()->user()->applicant;
        // dd($this->applicants);

        //retrieve applications with the necessary relationships
        $this->applications = JobApplications::with('applicants.user', 'job')
            ->where('applicant_id', $this->applicants->id)
            ->get();

        // dd($this->applications);




    }
    public function render()
    {
        return view('livewire.applicant-profile');
    }
}