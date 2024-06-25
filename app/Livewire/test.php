<?php

namespace App\Livewire;

use Illuminate\Support\Arr;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateJob extends Component
{

    #[On('sweetalert:confirmed')]
    public function onConfirmed(array $payload)
    {
        flash()->success('Job creation successful.');
        return redirect()->route('employer.home');
    }

    #[On('sweetalert:denied')]
    public function onDeny(array $payload): void
    {
        flash()->error('Job creation cancelled.');
    }

    public $title;
    public $salary;
    public $location;
    public $schedule;
    public $url;
    public $tags;
    public $featured;
    public $mode;

    public function createJob()
    {
        // dd(
        //     $this->mode,
        //     $this->title,
        //     $this->salary,
        //     $this->location,
        //     $this->schedule,
        //     $this->url,
        //     $this->tags,
        //     $this->featured
        // );




        $attributes = $this->validate([
            'title' => 'required',
            'salary' => 'required',
            'location' => 'required',
            'schedule' => 'required',
            'featured' => 'nullable',
            'mode' => 'required',
            'url' => 'required',
            'tags' => 'nullable',
        ]);

        // Include the 'feature' attribute if it is set
        $attributes['featured'] = $this->featured ?? false;

        // Get the authenticated user's employer
        // $employer = Auth::user()->employer;

        // Create the job excluding the tags attribute
        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, ['tags']));

        // Handle tags if provided
        if ($attributes['tags'] ?? false) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag($tag); // Assuming the Job model has a method 'tag'
            }
        }

        sweetalert()
            ->showDenyButton()
            ->info('Are you sure you want to create this job ?');
    }




    public function render()
    {
        return view('livewire.create-job');
    }
}




// namespace App\Livewire;

// use Illuminate\Support\Arr;
// use Illuminate\Support\Facades\Auth;
// use Livewire\Attributes\On;
// use Livewire\Component;

// class CreateJob extends Component
// {
//     public $step = 1;
//     public $title;
//     public $salary;
//     public $location;
//     public $schedule;
//     public $url;
//     public $tags;
//     public $featured;
//     public $mode;
//     public $summary;
//     public $minimum_qualifications;
//     public $experience_level;
//     public $experience_years;
//     public $responsibilities;
//     public $skills;

//     protected $rules = [
//         'title' => 'required',
//         'salary' => 'required',
//         'location' => 'required',
//         'schedule' => 'required',
//         'featured' => 'nullable',
//         'mode' => 'required',
//         'url' => 'required',
//         'tags' => 'nullable',
//         'summary' => 'required',
//         'minimum_qualifications' => 'required',
//         'experience_level' => 'required',
//         'experience_years' => 'required',
//         'responsibilities' => 'required',
//         'skills' => 'required',
//     ];

//     public function nextStep()
//     {
//         $this->validate($this->getRulesForStep());

//         if ($this->step == 1) {
//             $this->step++;
//         } else {
//             sweetalert()
//                 ->showDenyButton()
//                 ->info('Are you sure you want to create this job?');
//         }
//     }

//     protected function getRulesForStep()
//     {
//         if ($this->step == 1) {
//             return Arr::only($this->rules, [
//                 'title',
//                 'salary',
//                 'location',
//                 'schedule',
//                 'mode',
//                 'url',
//                 'tags',
//                 'featured'
//             ]);
//         }

//         return Arr::only($this->rules, [
//             'summary',
//             'minimum_qualifications',
//             'experience_level',
//             'experience_years',
//             'responsibilities',
//             'skills'
//         ]);
//     }

//     #[On('sweetalert:confirmed')]
//     public function saveJobDetails()
//     {
//         $attributes = $this->validate($this->rules);

//         $attributes['featured'] = $this->featured ?? false;

//         // Create the job
//         $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, ['tags', 'description', 'requirements']));

//         // Handle tags if provided
//         if ($attributes['tags'] ?? false) {
//             foreach (explode(',', $attributes['tags']) as $tag) {
//                 $job->tag($tag);
//             }
//         }

//         // Create job details
//         $job->details()->create([
//             'description' => $this->description,
//             'requirements' => $this->requirements,
//         ]);

//         flash()->success('Job creation successful.');
//         return redirect()->route('employer.home');
//     }

//     #[On('sweetalert:denied')]
//     public function onDeny(array $payload): void
//     {
//         flash()->error('Job creation cancelled.');
//     }

//     public function render()
//     {
//         return view('livewire.create-job');
//     }
// }