<?php

namespace App\Livewire;

use Livewire\Component;

class TagJobs extends Component
{

    public $tag;
    public $jobs;

    public function mount($tag)
    {
        $this->tag = $tag;
        $this->jobs = $tag->jobs->load('employer', 'tags');
    }



    public function render()
    {
        return view('livewire.tag-jobs');
    }
}