<?php

namespace App\Livewire;

use App\Models\JobApplications;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmployerDashboard extends Component
{

    public $jobCount;
    public $applicationsCount;

    public function mount()
    {
        $user = Auth::user();
        $employer = $user->employer;

        //job count
        $this->jobCount = $employer->jobs->count();

        //applications count
        $this->applicationsCount = JobApplications::where('employer_id', $employer->id)->count();


    }


    public function render()
    {
        return view('livewire.employer-dashboard');
    }
}