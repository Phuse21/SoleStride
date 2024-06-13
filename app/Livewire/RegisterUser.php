<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterUser extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $password;

    public $password_confirmation;
    public $role;
    public $employer;
    public $logo;
    public $education;
    public $field;
    public $country;
    public $phone;
    public $street_address;
    public $city;
    public $state;
    public $zip;
    public $profile_photo;
    public $linkedin;



    public function register()
    {

        // dd(
        //     $this->logo,
        //     $this->employer,
        //     $this->role,
        //     $this->name,
        //     $this->email,
        //     $this->password,
        //     $this->password_confirmation,
        //     $this->education,
        //     $this->field,
        //     $this->country,
        //     $this->phone,
        //     $this->street_address,
        //     $this->city,
        //     $this->state,
        //     $this->zip,
        //     $this->profile_photo,
        //     $this->linkedin
        // );

        $userAttributes = $this->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|min:3|max:255',
            'password' => 'required|confirmed|min:6',
            'role' => 'required',
        ]);


        if ($this->role === 'employer') {
            $employerAttributes = $this->validate([
                'employer' => 'required|min:3|max:255',
                'logo' => 'required|image',
            ]);
        }


        if ($this->role === 'applicant') {

            $applicantAttributes = $this->validate([
                'education' => 'required',
                'field' => 'required',
                'country' => 'required',
                'phone' => 'required',
                'street_address' => 'required|min:3|max:255',
                'city' => 'required',
                'state' => 'required',
                'zip' => 'required',
                'profile_photo' => 'nullable|image',
                'linkedin' => 'nullable|url',
            ]);
        }




        // Create the user with validated data
        $user = User::create([
            'name' => $userAttributes['name'],
            'email' => $userAttributes['email'],
            'password' => Hash::make($userAttributes['password']),
            'role' => $this->role
        ]);


        // Handle employer-specific data
        if ($this->role === 'employer' && $this->logo) {
            $logoPath = $employerAttributes['logo']->store('logos');
            $user->employer()->create([
                'name' => $employerAttributes['employer'],
                'logo' => 'storage/' . $logoPath
            ]);
        }

        // Handle applicant-specific data
        elseif ($this->role === 'applicant' && $this->profile_photo) {
            $profilePhotoPath = $applicantAttributes['profile_photo']->store('profile_photos');
            $user->applicant()->create([
                'education' => $applicantAttributes['education'],
                'field' => $applicantAttributes['field'],
                'country' => $applicantAttributes['country'],
                'phone' => $applicantAttributes['phone'],
                'street_address' => $applicantAttributes['street_address'],
                'city' => $applicantAttributes['city'],
                'state' => $applicantAttributes['state'],
                'zip' => $applicantAttributes['zip'],
                'profile_photo' => 'storage/' . $profilePhotoPath,
                'linkedin' => $applicantAttributes['linkedin'],
            ]);
        }

        // Auth::login($user)

        return redirect()->route('login');

    }


    public function updatedRole($value)
    {
        if ($value === 'employer') {
            $this->clearApplicantData();
        } elseif ($value === 'applicant') {
            $this->clearEmployerData();
        }
    }

    // Method to clear employer-specific data
    private function clearEmployerData()
    {
        $this->employer = null;
        $this->logo = null;
    }

    // Method to clear applicant-specific data
    private function clearApplicantData()
    {
        $this->education = null;
        $this->field = null;
        $this->country = null;
        $this->phone = null;
        $this->street_address = null;
        $this->city = null;
        $this->state = null;
        $this->zip = null;
        $this->profile_photo = null;
        $this->linkedin = null;
    }


    public function render()
    {
        return view('livewire.register-user');
    }
}