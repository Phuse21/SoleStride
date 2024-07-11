<?php

namespace App\Livewire;

use App\Models\JobApplications;
use Livewire\Component;

class Applications extends Component
{
    public $listeners = ['viewApplicantDetails' => 'applicantToView'];
    public $applications;
    public $application;
    public $applicationsCount;

    public function mount($applicants)
    {
        $this->applications = $applicants;
        // Count applications once and store the count
        $this->applicationsCount = $this->applications->count();
    }

    public function applicantToView($applicationId)
    {
        // Find the application in the cached collection
        $this->application = $this->applications->firstWhere('id', $applicationId);
        $this->application->load('job');
    }

    public function addToShortlist()
    {
        $this->application->update(['status' => 'shortlisted']);
        $this->dispatch('pending');
        flash()->success('Application shortlisted');
        $this->dispatch('close-modal', ['name' => 'application']);

    }

    public function render()
    {
        return view('livewire.applications');
    }
}