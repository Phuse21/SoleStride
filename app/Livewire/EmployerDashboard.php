<?php

namespace App\Livewire;

use App\Models\JobApplications;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmployerDashboard extends Component
{
    public $listeners = ['pending' => 'loadPendingApplications'];
    public $jobCount;
    public $applicationsCount;
    public $applicants;

    public function mount()
    {
        $user = Auth::user();
        $employer = $user->employer;


        //job count
        $this->jobCount = $employer->jobs->count();


        // Retrieve applications with the necessary relationships
        $applications = JobApplications::with('applicants.user')
            ->where('employer_id', $employer->id)
            ->latest()
            ->get();

        // Count the number of applications
        $this->applicationsCount = $applications->count();

        // Assign the applications to the applicants property
        $this->applicants = $applications->where('status', 'pending');

        // dd($this->applicants);
    }

    public function loadPendingApplications()
    {
        $this->applicants = $this->applicants->where('status', 'pending');
    }

    public function render()
    {
        return view('livewire.employer-dashboard');
    }
}