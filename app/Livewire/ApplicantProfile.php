<?php

namespace App\Livewire;

use App\Models\JobApplications;
use Livewire\Component;

class ApplicantProfile extends Component
{

    public $listeners = ['applicantProfileUpdated' => 'update'];
    public $applications;
    public $applicant;


    public function mount()
    {

        $this->applicant = auth()->user()->applicant;
        // dd($this->applicants);

        //retrieve applications with the necessary relationships
        $this->applications = JobApplications::with('applicants.user', 'job')
            ->where('applicant_id', $this->applicant->id)
            ->get();

        // dd($this->applications);

    }

    public function update()
    {
        $this->render();
    }
    public function render()
    {
        return view('livewire.applicant-profile');
    }
}