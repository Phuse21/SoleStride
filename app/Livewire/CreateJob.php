<?php

namespace App\Livewire;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class CreateJob extends Component
{

    public $step = 1;

    public $title;
    public $salary;
    public $location;
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

    public function nextStep()
    {
        $this->validate([
            'title' => 'required',
            'salary' => 'required',
            'location' => 'required',
            'schedule' => 'required',
            'featured' => 'nullable',
            'mode' => 'required',
            'url' => 'required',
            'tags' => 'nullable',
        ]);

        $this->step = 2;
    }

    public function saveJobDetails()
    {
        $this->responsibilities = $this->convertToArray($this->responsibilities);
        $this->skills = $this->convertToArray($this->skills);

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
            'location' => $this->location,
            'schedule' => $this->schedule,
            'featured' => $this->featured ?? false,
            'mode' => $this->mode,
            'url' => $this->url,
            'tags' => $this->tags,
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
        return redirect()->route('employer.home');
    }

    protected function convertToArray($input)
    {
        return array_map('trim', explode(',', $input));
    }


    public function render()
    {
        return view('livewire.create-job');
    }
}