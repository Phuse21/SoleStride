<?php

namespace App\Livewire;

use App\Mail\EditUserMail;
use App\Notifications\EditUserNotification;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditApplicant extends Component
{

    use WithFileUploads;
    public $applicant;
    public $name;
    public $education;
    public $country;
    public $phone;
    public $date_of_birth;
    public $street_address;
    public $city;
    public $state;
    public $zip;
    public $profile_photo;
    public $linkedin;

    protected $rules = [
        'name' => 'required',
        'education' => 'required',
        'phone' => 'required',
        'country' => 'required',
        'date_of_birth' => 'required',
        'street_address' => 'required',
        'city' => 'required',
        'state' => 'required',
        'zip' => 'required',
        'profile_photo' => 'nullable|image|max:1024',
        'linkedin' => 'required',
    ];

    public function mount($applicant)
    {
        $this->applicant = $applicant;
        $this->name = $this->applicant->user->name;
        $this->education = $this->applicant->education;
        $this->country = $this->applicant->country;
        $this->phone = $this->applicant->phone;
        $this->date_of_birth = $this->applicant->date_of_birth;
        $this->street_address = $this->applicant->street_address;
        $this->city = $this->applicant->city;
        $this->state = $this->applicant->state;
        $this->zip = $this->applicant->zip;
        // $this->profile_photo = $this->applicant->profile_photo;
        $this->linkedin = $this->applicant->linkedin;
    }


    public function updateApplicant()
    {


        $this->validate();

        //Handle image upload
        if ($this->profile_photo) {
            $path = $this->profile_photo->store('profile_photos', 'public');
            $this->applicant->profile_photo = 'storage' . '/' . $path;
        }

        $this->applicant->update([
            'education' => $this->education,
            'phone' => $this->phone,
            'country' => $this->country,
            'date_of_birth' => $this->date_of_birth,
            'street_address' => $this->street_address,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'linkedin' => $this->linkedin,
        ]);

        $this->applicant->user->update([
            'name' => $this->name,
        ]);

        //send email
        Mail::to($this->applicant->user)->queue(new EditUserMail($this->applicant->user));

        //send notification
        // $this->applicant->user->notify(new EditUserNotification($this->applicant->user));

        flash()->success('Profile updated successfully');

        //dispatch event to update user profile
        $this->dispatch('applicantProfileUpdated', $this->applicant);

        $this->dispatch('close-modal', ['name' => 'edit-applicant']);

    }
    public function render()
    {
        return view('livewire.edit-applicant');
    }
}