<?php

namespace App\Livewire;

use App\Mail\RegisterUserMail;
use App\Models\User;

use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\Mail;
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
    public $position;
    public $company_country;
    public $company_phone;
    public $company_street_address;
    public $company_state;
    public $company_city;
    public $company_zip;
    public $url;
    public $logo;
    public $education;
    public $date_of_birth;
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
            'email' => 'required|email|min:3|max:255|unique:users',
            'password' => 'required|confirmed|min:8',
            'role' => 'required',
        ]);


        if ($this->role === 'employer') {
            $employerAttributes = $this->validate([
                'employer' => 'required|min:3|max:255',
                'position' => 'required',
                'company_country' => 'required',
                'company_phone' => 'required',
                'company_street_address' => 'required|min:3|max:255',
                'company_state' => 'required',
                'company_city' => 'required',
                'company_zip' => 'required',
                'url' => 'nullable|url',
                'logo' => 'required|image',
            ]);
        }


        if ($this->role === 'applicant') {

            $applicantAttributes = $this->validate([
                'education' => 'required',
                'date_of_birth' => 'required',
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
                'position' => $employerAttributes['position'],
                'company_country' => $employerAttributes['company_country'],
                'company_phone' => $employerAttributes['company_phone'],
                'company_street_address' => $employerAttributes['company_street_address'],
                'company_state' => $employerAttributes['company_state'],
                'company_city' => $employerAttributes['company_city'],
                'company_zip' => $employerAttributes['company_zip'],
                'url' => $employerAttributes['url'],
                'logo' => "storage/{$logoPath}"
            ]);
        }

        // Handle applicant-specific data
        elseif ($this->role === 'applicant' && $this->profile_photo) {
            $profilePhotoPath = $applicantAttributes['profile_photo']->store('profile_photos');
            $user->applicant()->create([
                'education' => $applicantAttributes['education'],
                'date_of_birth' => $applicantAttributes['date_of_birth'],
                'country' => $applicantAttributes['country'],
                'phone' => $applicantAttributes['phone'],
                'street_address' => $applicantAttributes['street_address'],
                'city' => $applicantAttributes['city'],
                'state' => $applicantAttributes['state'],
                'zip' => $applicantAttributes['zip'],
                'profile_photo' => "storage/{$profilePhotoPath}",
                'linkedin' => $applicantAttributes['linkedin'],
            ]);
        }

        //send email for user registration
        Mail::to($user)->queue(new RegisterUserMail($user));

        // Auth::login($user)
        flash()->success('User created successfully.');
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
        $this->position = null;
        $this->company_country = null;
        $this->company_phone = null;
        $this->company_street_address = null;
        $this->company_state = null;
        $this->company_city = null;
        $this->company_zip = null;
        $this->url = null;
        $this->logo = null;
    }

    // Method to clear applicant-specific data
    private function clearApplicantData()
    {
        $this->education = null;
        $this->date_of_birth = null;
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