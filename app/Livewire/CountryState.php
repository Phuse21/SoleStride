<?php

namespace App\Livewire;

use Livewire\Component;
use WisdomDiala\Countrypkg\Models\Country;
use WisdomDiala\Countrypkg\Models\State;

class CountryState extends Component
{
    public $countries;
    public $states;

    public $selectedCountry = null;
    public $selectedState = null;

    public function mount($selectedState = null)
    {
        $this->countries = Country::all();
        $this->states = collect();
        $this->selectedState = $selectedState;

        if (!is_null($selectedState)) {
            $state = State::with('country')->find($selectedState);
            if ($state) {
                $this->states = State::where('country_id', $state->country_id)->get();
                $this->selectedCountry = $state->country_id;
            }
        }
    }

    public function render()
    {
        return view('livewire.country-state');
    }

    public function updatedSelectedCountry($country)
    {
        $this->states = State::where('country_id', $country)->get();
        $this->selectedState = null;
    }
}