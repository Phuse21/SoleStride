<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;

class RegularJobs extends Component
{
    use WithPagination;


    public function mount()
    {
        $this->resetPage();

    }
    public function render()
    {
        $regularJobs = Job::with(['employer', 'tags'])
            ->latest('id')
            ->where('featured', false)
            ->paginate(6);

        return view(
            'livewire.regular-jobs'
            ,
            ['regularJobs' => $regularJobs]
        );
    }
}