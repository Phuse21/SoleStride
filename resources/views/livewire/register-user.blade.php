<!-- method="POST" action="/register" enctype="multipart/form-data" -->
<div>
    <x-page-heading>Register</x-page-heading>

    <div class="flex space-x-2">
        <div class="flex-1">
            <form wire:submit.prevent="register" class="max-w-2xl mx-auto space-y-6">
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <x-form.label :name="'name'" :label="'Name'" />
                        <x-form.input type="text" :name="'name'" :id="'name'" wire:model="name" />
                        <x-form.error name="name" />
                    </div>

                    <div class="w-1/2">
                        <x-form.label :name="'email'" :label="'Email'" />
                        <x-form.input type="email" :name="'email'" :id="'email'" wire:model="email" />
                        <x-form.error name="email" />
                    </div>
                </div>

                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <x-form.label :name="'password'" :label="'Password'" />
                        <x-form.input type="password" :name="'password'" :id="'password'" wire:model="password" />
                        <x-form.error name="password" />
                    </div>

                    <div class="w-1/2">
                        <x-form.label :name="'password_confirmation'" :label="'Confirm Password'" />
                        <x-form.input type="password" :name="'password_confirmation'" :id="'password_confirmation'"
                            wire:model="password_confirmation" />
                        <x-form.error name="password confirmation" />
                    </div>
                </div>
                <div class="flex mr-4">
                    <div class="w-1/2">
                        <x-form.label :name="'role'" :label="'Role'" />
                        <x-form.radio :name="'role'" :id="'role'" wire:model="role" />
                        <x-form.error name="role" />
                    </div>
                </div>


                <!-- employer details -->
                @if ($role == 'employer')
                    <x-divider />
                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <x-form.label :name="'employer'" :label="'Company Name'" />
                            <x-form.input type="text" :name="'employer'" :id="'employer'" wire:model="employer" />
                            <x-form.error name="employer" />
                        </div>

                        <div class="w-1/2">
                            <x-form.label :name="'position'" :label="'Position in Company'" />
                            <x-form.select name="position" id="position" wire:model="position">
                                <option value="">--Please Select--</option>
                                <option value="CEO/CTO">CEO/CTO</option>
                                <option value="HR">HR</option>
                                <option value="Team Lead">Team Lead</option>
                                <option value="Unit Lead">Unit Lead</option>
                                <option value="Other">Other</option>
                            </x-form.select>
                            <x-form.error name="position" />
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <x-form.label :name="'country'" :label="'Country'" />
                            <x-form.input type="text" :name="'country'" :id="'country'" wire:model="company_country" />
                            <x-form.error name="country" />
                        </div>

                        <div class="w-1/2">
                            <x-form.label :name="'phone'" :label="'Phone'" />
                            <x-form.input type="text" :name="'phone'" :id="'phone'" wire:model="company_phone" />
                            <x-form.error name="phone" />
                        </div>
                    </div>

                    <div class="col-span-full">
                        <x-form.label :name="'street-address'" :label="'Street Address'" />
                        <x-form.input type="text" :name="'street-address'" :id="'company-street-address'"
                            wire:model="company_street_address" />
                        <x-form.error name="street_address" />
                    </div>

                    <div class="flex space-x-4">
                        <div class="w-1.4/4 md:w-1.5/4">
                            <x-form.label :name="'state'" :label="'State'" />
                            <x-form.input type="text" :name="'state'" :id="'state'" wire:model="company_state" />
                            <x-form.error name="state" />
                        </div>

                        <div class="w-1.4/4 md:w-1.5/4">
                            <x-form.label :name="'city'" :label="'City'" />
                            <x-form.input type="text" :name="'city'" :id="'city'" wire:model="company_city" />
                            <x-form.error name="city" />
                        </div>


                        <div class="w-1.2/4 md:w-1/4">
                            <x-form.label :name="'zip'" :label="'Zip'" />
                            <x-form.input type="text" :name="'zip'" :id="'zip'" wire:model="company_zip" />
                            <x-form.error name="zip" />
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row md:space-x-4 space-y-6">
                        <div class="w-full md:w-1/2">
                            <x-form.label :name="'linkedin'" :label="'Linkedin'" />
                            <x-form.input type="text" :name="'linkedin'" :id="'linkedin'" wire:model="url" />
                            <x-form.error name="linkedin" />
                        </div>

                        <div class="w-full md:w-1/2">
                            <x-form.label :name="'logo'" :label="'Company Logo'" />
                            <x-form.file :name="'logo'" :id="'logo'" wire:model="logo" />
                            <x-form.error name="logo" />
                        </div>
                    </div>
                @endif


                <!-- applicant details -->
                @if ($role == 'applicant')
                    <x-divider />
                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <x-form.label :name="'education'" :label="'Education'" />
                            <x-form.input type="text" :name="'education'" :id="'education'" wire:model="education" />
                            <x-form.error name="education" />
                        </div>

                        <div class="w-1/2">
                            <x-form.label :name="'date_of_birth'" :label="'Date of Birth'" />
                            <x-form.input type="date" :name="'date_of_birth'" :id="'date_of_birth'"
                                wire:model="date_of_birth" />
                            <x-form.error name="date_of_birth" />
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <x-form.label :name="'country'" :label="'Country'" />
                            <x-form.input type="text" :name="'country'" :id="'country'" wire:model="country" />
                            <x-form.error name="country" />
                        </div>

                        <div class="w-1/2">
                            <x-form.label :name="'phone'" :label="'Phone'" />
                            <x-form.input type="text" :name="'phone'" :id="'phone'" wire:model="phone" />
                            <x-form.error name="phone" />
                        </div>
                    </div>

                    <div class="col-span-full">
                        <x-form.label :name="'street-address'" :label="'Street Address'" />
                        <x-form.input type="text" :name="'street-address'" :id="'street-address'"
                            wire:model="street_address" />
                        <x-form.error name="street_address" />
                    </div>

                    <div class="flex space-x-4">
                        <div class="w-1.4/4 md:w-1.5/4">
                            <x-form.label :name="'city'" :label="'City'" />
                            <x-form.input type="text" :name="'city'" :id="'city'" wire:model="city" />
                            <x-form.error name="city" />
                        </div>

                        <div class="w-1.4/4 md:w-1.5/4">
                            <x-form.label :name="'state'" :label="'State'" />
                            <x-form.input type="text" :name="'state'" :id="'state'" wire:model="state" />
                            <x-form.error name="state" />
                        </div>

                        <div class="md:w-1/4 w-1.2/4">
                            <x-form.label :name="'zip'" :label="'Zip'" />
                            <x-form.input type="text" :name="'zip'" :id="'zip'" wire:model="zip" />
                            <x-form.error name="zip" />
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row md:space-x-4 space-y-6">
                        <div class="w-full md:w-1/2">
                            <x-form.label :name="'linkedin'" :label="'Linkedin'" />
                            <x-form.input type="text" :name="'linkedin'" :id="'linkedin'" wire:model="linkedin" />
                            <x-form.error name="linkedin" />
                        </div>

                        <div class="w-full md:w-1/2">
                            <x-form.label :name="'profile-photo'" :label="'Profile Photo'" />
                            <x-form.file :name="'profile-photo'" :id="'profile-photo'" wire:model="profile_photo" />
                            <x-form.error name="profile photo" />
                        </div>
                    </div>
                @endif
                <p>Already have an account? <a wire:navigate href="/login" class="text-blue-500 font-bold">Login</a></p>

                <p>By creating an account you agree to our <a href="#" class="text-blue-500">Terms & Privacy</a></p>
                <x-button type="submit">Create Account</x-button>

                <div wire:loading>
                    <div class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-primary motion-reduce:animate-[spin_1.5s_linear_infinite]"
                        role="status">
                        <span
                            class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                    </div>
                </div>
            </form>

        </div>

        <!-- <div class="flex-1 pb-10 -mt-10">
            <img src="https://i.ibb.co/W6YvfNY/Frame-2.png" class="pl-10 ">
        </div> -->
    </div>

</div>