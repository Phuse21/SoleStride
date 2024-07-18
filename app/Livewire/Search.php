<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Job;

class Search extends Component
{
    public $searchQuery = '';
    public $searchResults = [];

    public function updatedSearchQuery()
    {
        $this->searchResults = Job::where('title', 'like', "{$this->searchQuery}%")->get();
    }

    public function render()
    {
        return view('livewire.search');
    }
}