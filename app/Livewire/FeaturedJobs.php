<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;

class FeaturedJobs extends Component
{

    use WithPagination;

    public function mount()
    {
        $this->resetPage();

    }

    public function render()
    {
        $featuredJobs = Job::with(['employer', 'tags'])
            ->latest('id')
            ->where('featured', true)
            ->paginate(6);

        return view(
            'livewire.featured-jobs'
            ,
            ['featuredJobs' => $featuredJobs]
        );
    }
}