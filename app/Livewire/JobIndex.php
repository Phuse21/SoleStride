<?php

namespace App\Livewire;

use App\Models\Job;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class JobIndex extends Component
{

    use WithPagination;
    public $tags;





    public function mount()
    {
        // $this->loadJobs();
        $this->resetPage();
        $this->tags = Tag::all();
    }




    public function render()
    {
        // dd($featuredJobs);




        return view('livewire.job-index', [

        ]);
    }
}