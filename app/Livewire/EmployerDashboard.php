<?php

namespace App\Livewire;

use App\Models\JobApplications;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Helpers\ApplicationHelper;

class EmployerDashboard extends Component
{
    public $listeners = [
        'pending' => 'loadPendingApplications',
        'decline' => 'declineApplication',
    ];
    public $jobCount;
    public $applicationsCount;
    public $applicants;
    public $applications;
    public $shortlistedCount;
    public $shortlistedApplications;
    public $jobRequests;

    public function mount()
    {
        $user = Auth::user();
        $employer = $user->employer;


        //job count
        $this->jobCount = $employer->jobs->count();


        // Retrieve applications with the necessary relationships
        $this->applications = JobApplications::with('applicants.user', 'applicants', 'job')
            ->where('employer_id', $employer->id)
            ->latest('id')
            ->get();

        // dd($applications);

        // Count the number of applications
        $this->applicationsCount = $this->applications->count();

        // Filter applications by status(shortlisted)
        $this->shortlistedApplications = $this->applications->where('status', 'shortlisted');

        //count shortlisted applications
        $this->shortlistedCount = $this->shortlistedApplications->count();


        // Filter applications by status(pending)
        $this->applicants = $this->applications->where('status', 'pending');

        // dd($this->applicants);

        // Group job requests for the chart and generate random colors
        $this->jobRequests = $this->applications->groupBy('job_id')->map(function ($group) {
            $job = $group->first()->job; // Get the job associated with the group
            return [
                'job' => $job ? $job->title : 'Unknown Job', // Use job title or 'Unknown Job' if null
                'requests' => $group->count()
            ];
        })->values()->toArray();

        // Add random colors to jobRequests array
        $this->jobRequests = array_map(function ($request) {
            return [
                'job' => $request['job'],
                'requests' => $request['requests'],
                'backgroundColor' => $this->generateRandomColor()
            ];
        }, $this->jobRequests);
    }

    public function loadPendingApplications()
    {
        $this->applicants = $this->applicants->where('status', 'pending');
        $this->mount();
    }


    public function declineApplication($applicationId)
    {
        $this->dispatch('close-modal', ['name' => 'application']);
        // Retrieve the application from the already fetched collection
        $application = $this->applications->firstWhere('id', $applicationId);

        // Ensure the application exists
        if (!$application) {
            flash()->error('Application not found');
            return;
        }


        //update application status with helper function
        ApplicationHelper::declineApplication($application);

        //dispatch event
        flash()->success('Application declined');
        $this->dispatch('pending');
    }


    public function acceptApplication($applicationId)
    {

        // Retrieve the application from the already fetched collection
        $application = $this->applications->firstWhere('id', $applicationId);

        // Ensure the application exists
        if (!$application) {
            flash()->error('Application not found');
            return;
        }


        //update application status with helper function
        ApplicationHelper::acceptApplication($application);

        //dispatch event
        flash()->success('Application accepted');
        $this->dispatch('close-modal', ['name' => 'application']);
        $this->mount();
    }

    public function render()
    {
        // $this->applications->load('applicants.user');
        return view('livewire.employer-dashboard');
    }


    private function generateRandomColor()
    {
        do {
            // Generate a random color in hexadecimal format
            $colors = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        } while ($colors == '#f3f4f6');

        return $colors;
    }

}