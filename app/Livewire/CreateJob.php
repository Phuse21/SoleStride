<?php

namespace App\Livewire;

use App\Mail\CreateJobMail;
use App\Notifications\JobCreatedNotification;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\On;
use Livewire\Component;


class CreateJob extends Component
{
    public $listeners = ['selectedStateAndCountry'];
    public $step = 1;

    public $title;
    public $salary;
    public $city;
    public $schedule;
    public $url;
    public $tags;
    public $featured;
    public $mode;

    public $summary;
    public $minimum_qualifications;
    public $experience_level;
    public $experience_years;
    public $responsibilities;
    public $skills;
    public $selectedState;
    public $selectedCountry;


    public function nextStep()
    {
        //dd($this->selectedCountry, $this->selectedState, $this->mode, $this->title, $this->salary, $this->city, $this->schedule, $this->url, $this->tags, $this->featured);
        $this->validate([
            'title' => 'required',
            'salary' => 'required',
            'city' => 'required',
            'schedule' => 'required',
            'featured' => 'nullable',
            'mode' => 'required',
            'url' => 'nullable',
            'tags' => 'nullable',
            'selectedState' => 'required',
            'selectedCountry' => 'required',

        ]);

        $this->step = 2;
    }

    public function messages()
    {

        return [
            'selectedState.required' => 'The state field is required.',
            'selectedCountry.required' => 'The country field is required.',
        ];
    }

    public function saveJobDetails()
    {
        // Convert responsibilities and skills to arrays
        $this->responsibilities = $this->convertToArray($this->responsibilities);
        $this->skills = $this->convertToArray($this->skills);

        // Validate the input data
        $this->validate([
            'summary' => 'required|min:10|max:1000',
            'minimum_qualifications' => 'required',
            'experience_level' => 'required',
            'experience_years' => 'required|integer|min:1|max:50',
            'responsibilities' => 'required',
            'skills' => 'required',
        ]);

        // Prepare attributes for the job
        $attributes = [
            'title' => $this->title,
            'salary' => $this->salary,
            'city' => $this->city,
            'schedule' => $this->schedule,
            'featured' => $this->featured ?? false,
            'mode' => $this->mode,
            'url' => $this->url,
            'tags' => $this->tags,
            'state' => $this->selectedState,
            'country' => $this->selectedCountry
        ];

        // Open a try/catch block to handle transaction and potential errors
        try {
            // Start the transaction
            DB::beginTransaction();

            // Create the job associated with the authenticated employer
            $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, ['tags']));

            // Handle tags if provided
            if ($attributes['tags'] ?? false) {
                $tags = explode(',', $attributes['tags']);

                // Trim spaces around tags and filter out empty tags
                $tags = array_map('trim', $tags);
                $tags = array_filter($tags, fn($tag) => $tag !== '');

                // Attach valid tags to the job
                foreach ($tags as $tag) {
                    $job->tag($tag);
                }
            }

            // Create job details associated with the job
            $job->job_details()->create([
                'summary' => $this->summary,
                'minimum_qualifications' => $this->minimum_qualifications,
                'experience_level' => $this->experience_level,
                'experience_years' => $this->experience_years,
                'responsibilities' => json_encode($this->responsibilities),
                'skills' => json_encode($this->skills),
            ]);

            // Send email notification about the job creation
            Mail::to($job->employer->user)->queue(new CreateJobMail($job));

            // Save a notification for the employer
            $job->employer->user->notify(new JobCreatedNotification($job));

            // Commit the transaction
            DB::commit();

            // Flash a success message and redirect
            flash()->success('Job creation successful.');
            return redirect()->route('employer.jobsPosted');

        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();

            // Flash an error message and redirect back
            flash()->error('An error occurred while creating the job. Please try again.');
            return redirect()->back();
        }
    }


    protected function convertToArray($input)
    {
        // If the input is an array, we need to handle it accordingly
        if (is_array($input)) {
            // Convert array elements to a string separated by commas
            $input = implode(',', $input);

        }

        // Now input is guaranteed to be a string
        $inputArray = array_map('trim', explode(',', $input));

        //return filtered empty tags
        return array_filter($inputArray, fn($tag) => $tag !== '');
    }


    public function selectedStateAndCountry($state, $country)
    {
        $this->selectedState = $state;
        $this->selectedCountry = $country;
    }
    public function render()
    {
        return view('livewire.create-job');
    }
}