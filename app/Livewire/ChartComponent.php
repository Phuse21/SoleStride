<?php

namespace App\Livewire;

use Livewire\Component;

class ChartComponent extends Component
{


    public $jobRequests;

    public function mount($jobRequests)
    {
        $this->jobRequests = $jobRequests;
    }
    public function render()
    {
        return view('livewire.chart-component');
    }

}