<?php

namespace App\Livewire;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
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
        $this->responsibilities = $this->convertToArray($this->responsibilities);
        $this->skills = $this->convertToArray($this->skills);

        $this->validate([
            'summary' => 'required',
            'minimum_qualifications' => 'required',
            'experience_level' => 'required',
            'experience_years' => 'required|integer|min:1 |max:50',
            'responsibilities' => 'required',
            'skills' => 'required',
        ]);


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

        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, ['tags']));

        if ($attributes['tags'] ?? false) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag($tag); // Assuming the Job model has a method 'tag'
            }
        }

        $job->job_details()->create([
            'summary' => $this->summary,
            'minimum_qualifications' => $this->minimum_qualifications,
            'experience_level' => $this->experience_level,
            'experience_years' => $this->experience_years,
            'responsibilities' => json_encode($this->responsibilities),
            'skills' => json_encode($this->skills),
        ]);

        flash()->success('Job creation successful.');
        return redirect()->route('employer.jobsPosted');
    }

    protected function convertToArray($input)
    {
        // If the input is an array, we need to handle it accordingly
        if (is_array($input)) {
            // Convert array elements to a string separated by commas
            $input = implode(',', $input);
        }

        // Now input is guaranteed to be a string
        return array_map('trim', explode(',', $input));
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