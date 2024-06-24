<?php

namespace App\Livewire;

use Livewire\Component;

class ChartComponent extends Component
{


    public $jobRequests = [
        ['job' => 'Fraud Analyst', 'requests' => '10'],
        ['job' => 'Software Developer', 'requests' => '20'],
        ['job' => 'Business Analyst', 'requests' => '15'],
        ['job' => 'Data Scientist', 'requests' => '25'],
        ['job' => 'Software Engineer', 'requests' => '30'],
    ];

    public function render()
    {
        return view('livewire.chart-component');
    }
}