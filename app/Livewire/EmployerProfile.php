<?php

namespace App\Livewire;

use App\Models\JobApplications;
use Livewire\Component;

class EmployerProfile extends Component
{

    public $listeners = ['employerProfileUpdated' => 'update'];
    public $employer;
    public $jobs;
    public $applications;

    public function mount()
    {
        $this->employer = auth()->user()->employer;
        $this->applications = JobApplications::with('job')
            ->where('employer_id', $this->employer->id)
            ->get();

        $this->jobs = $this->employer->jobs()->withTrashed()->get();
    }

    public function update()
    {
        $this->render();
    }
    public function render()
    {
        return view('livewire.employer-profile');
    }
}