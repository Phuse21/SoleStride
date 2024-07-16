<?php

namespace App\Livewire;

use App\Mail\EditJobMail;
use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class EditJob extends Component
{

    public $listeners = ['selectedStateAndCountry'];
    public $jobId;
    public $step = 1;
    public $title;
    public $salary;
    public $city;
    public $schedule;
    public $url;
    public $tags;
    public $featured = false;
    public $mode;
    public $summary;
    public $minimum_qualifications;
    public $experience_level;
    public $experience_years;
    public $responsibilities;
    public $skills;
    public $selectedState;
    public $selectedCountry;

    public function mount($jobId)
    {
        $job = Job::findOrFail($jobId);

        $this->jobId = $job->id;
        $this->title = $job->title;
        $this->salary = $job->salary;
        $this->selectedState = $job->state;
        $this->selectedCountry = $job->Country;
        $this->city = $job->city;
        $this->schedule = $job->schedule;
        $this->url = $job->url;
        $this->tags = implode(',', $job->tags->pluck('name')->toArray());
        $this->featured = $job->featured;
        $this->mode = $job->mode;

        $details = $job->job_details;
        $this->summary = $details->summary;
        $this->minimum_qualifications = $details->minimum_qualifications;
        $this->experience_level = $details->experience_level;
        $this->experience_years = $details->experience_years;
        $this->responsibilities = implode(',', json_decode($details->responsibilities, true));
        $this->skills = implode(',', json_decode($details->skills, true));

    }


    public function nextStep()
    {
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

    public function saveJobDetails()
    {
        $this->validate([
            'summary' => 'required',
            'minimum_qualifications' => 'required',
            'experience_level' => 'required',
            'experience_years' => 'required|integer',
            'responsibilities' => 'required',
            'skills' => 'required',
        ]);

        $attributes = [
            'title' => $this->title,
            'salary' => $this->salary,
            'city' => $this->city,
            'schedule' => $this->schedule,
            'featured' => $this->featured,
            'mode' => $this->mode,
            'url' => $this->url,
            'tags' => $this->tags,
            'state' => $this->selectedState,
            'country' => $this->selectedCountry,
        ];

        $job = Auth::user()->employer->jobs()->findOrFail($this->jobId);
        $job->update(Arr::except($attributes, ['tags']));

        $job->job_details()->update([
            'summary' => $this->summary,
            'minimum_qualifications' => $this->minimum_qualifications,
            'experience_level' => $this->experience_level,
            'experience_years' => $this->experience_years,
            'responsibilities' => json_encode($this->convertToArray($this->responsibilities)),
            'skills' => json_encode($this->convertToArray($this->skills)),
        ]);

        if ($attributes['tags'] ?? false) {
            $job->tags()->detach();
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag($tag);
            }
        }
        //send email
        Mail::to($job->employer->user)->queue(new EditJobMail($job));

        //flash message
        flash()->success('Job Updated successful.');
        return redirect()->route('employer.jobsPosted');
    }

    protected function convertToArray($input)
    {
        if (is_array($input)) {
            $input = implode(',', $input);
        }
        return array_map('trim', explode(',', $input));
    }


    public function selectedStateAndCountry($state, $country)
    {
        $this->selectedState = $state;
        $this->selectedCountry = $country;
    }



    public function render()
    {
        return view('livewire.edit-job');
    }
}