<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class EditEmployer extends Component
{

    use WithFileUploads;
    public $employer;
    public $name;
    public $employer_name;
    public $position;
    public $company_phone;
    public $company_country;
    public $company_street_address;
    public $company_state;
    public $company_city;
    public $company_zip;
    public $url;
    public $logo;

    protected $rules = [
        'name' => 'required',
        'employer_name' => 'required',
        'position' => 'required',
        'company_phone' => 'required',
        'company_country' => 'required',
        'company_street_address' => 'required|min:3|max:255',
        'company_state' => 'required',
        'company_city' => 'required',
        'company_zip' => 'required',
        'url' => 'nullable|url',
        'logo' => 'nullable|image|max:1024',
    ];


    public function mount($employer)
    {

        $this->employer = $employer;
        $this->name = $this->employer->user->name;
        $this->employer_name = $this->employer->name;
        $this->position = $this->employer->position;
        $this->company_phone = $this->employer->company_phone;
        $this->company_country = $this->employer->company_country;
        $this->company_street_address = $this->employer->company_street_address;
        $this->company_state = $this->employer->company_state;
        $this->company_city = $this->employer->company_city;
        $this->company_zip = $this->employer->company_zip;
        $this->url = $this->employer->url;
        // $this->logo = $this->employer->logo;
    }


    public function updateEmployer()
    {
        $this->validate();

        //Handle image upload
        if ($this->logo) {
            $path = $this->logo->store('logos', 'public');
            $this->employer->logo = 'storage' . '/' . $path;
        }

        $this->employer->update([

            'name' => $this->employer_name,
            'position' => $this->position,
            'company_phone' => $this->company_phone,
            'company_country' => $this->company_country,
            'company_street_address' => $this->company_street_address,
            'company_state' => $this->company_state,
            'company_city' => $this->company_city,
            'company_zip' => $this->company_zip,
            'url' => $this->url,
        ]);

        $this->employer->user->update([
            'name' => $this->name,
        ]);

        flash()->success('Profile updated successfully');

        //dispatch event to update user profile
        $this->dispatch('employerProfileUpdated', $this->employer);

        $this->dispatch('close-modal', ['name' => 'edit-employer-profile']);

        $this->reset('logo');
    }




    public function render(
    ) {
        return view('livewire.edit-employer');
    }
}