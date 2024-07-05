<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmployerDashboard extends Component
{

    public $jobCount;
    public $jobRequests;

    public function mount()
    {
        $user = Auth::user();
        $this->jobCount = $user->employer->jobs->count();

        $jobs = $user->employer->jobs;
        $this->jobRequests = $jobs->filter(function ($job) {
            return $job->job_applications->count() < 1;
        })->count();
    }


    public function render()
    {
        return view('livewire.employer-dashboard');
    }
}