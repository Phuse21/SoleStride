<?php

namespace App\Livewire;

use App\Models\Tag;
use Livewire\Component;

class TagJobs extends Component
{

    public $tag;
    public $tags;
    public $jobs;

    public function mount($tag)
    {
        $this->tag = $tag;
        $this->jobs = $tag->jobs->load('employer', 'tags');

        $this->tags = Tag::with('jobs')
            ->whereHas('jobs')
            ->where('name', '!=', $tag->name)
            ->orderBy('name', 'asc')
            ->get();
    }



    public function render()
    {
        return view('livewire.tag-jobs');
    }
}