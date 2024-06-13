<!-- method="POST" action="/register" enctype="multipart/form-data" -->
<div>
    <x-page-heading>Register</x-page-heading>

    <div>
        <form wire:submit="register" class="max-w-2xl mx-auto space-y-6">
            <div>
                <x-label :name="'name'" :label="'Name'" />
                <x-input type="text" :name="'name'" :id="'name'" wire:model="name" />
                <x-error name="name" />
            </div>

            <div>
                <x-label :name="'email'" :label="'Email'" />
                <x-input type="email" :name="'email'" :id="'email'" wire:model="email" />
                <x-error name="email" />
            </div>

            <div>
                <x-label :name="'password'" :label="'Password'" />
                <x-input type="password" :name="'password'" :id="'password'" wire:model="password" />
                <x-error name="password" />
            </div>

            <div>
                <x-label :name="'password_confirmation'" :label="'Confirm Password'" />
                <x-input type="password" :name="'password_confirmation'" :id="'password_confirmation'"
                    wire:model="password_confirmation" />
                <x-error name="password confirmation" />
            </div>

            <div>
                <x-label :name="'role'" :label="'Role'" />
                <x-radio :name="'role'" :id="'role'" wire:model="role" />
                <x-error name="role" />
            </div>


            <!-- employer details -->
            @if ($role == 'employer')
                <x-divider />

                <div>
                    <x-label :name="'employer'" :label="'Company Name'" />
                    <x-input type="text" :name="'employer'" :id="'employer'" wire:model="employer" />
                    <x-error name="employer" />
                </div>

                <div>
                    <x-label :name="'logo'" :label="'Company Logo'" />
                    <x-input type="file" :name="'logo'" :id="'logo'" wire:model="logo" />
                </div>
                <x-error name="logo" />
            @endif


            <!-- applicant details -->
            @if ($role == 'applicant')
                <x-divider />
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <x-label :name="'education'" :label="'Education'" />
                        <x-input type="text" :name="'education'" :id="'education'" wire:model="education" />
                        <x-error name="education" />
                    </div>

                    <div class="w-1/2">
                        <x-label :name="'field'" :label="'Field'" />
                        <x-input type="text" :name="'field'" :id="'field'" wire:model="field" />
                        <x-error name="field" />
                    </div>
                </div>
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <x-label :name="'country'" :label="'Country'" />
                        <x-input type="text" :name="'country'" :id="'country'" wire:model="country" />
                        <x-error name="country" />
                    </div>

                    <div class="w-1/2">
                        <x-label :name="'phone'" :label="'Phone'" />
                        <x-input type="text" :name="'phone'" :id="'phone'" wire:model="phone" />
                        <x-error name="phone" />
                    </div>
                </div>

                <div class="col-span-full">
                    <x-label :name="'street-address'" :label="'Street Address'" />
                    <x-input type="text" :name="'street-address'" :id="'street-address'" wire:model="street_address" />
                    <x-error name="street_address" />
                </div>

                <div class="flex space-x-4">
                    <div class="w-1.5/4">
                        <x-label :name="'city'" :label="'City'" />
                        <x-input type="text" :name="'city'" :id="'city'" wire:model="city" />
                        <x-error name="city" />
                    </div>

                    <div class="w-1.5/4">
                        <x-label :name="'state'" :label="'State'" />
                        <x-input type="text" :name="'state'" :id="'state'" wire:model="state" />
                        <x-error name="state" />
                    </div>

                    <div class="w-1/4">
                        <x-label :name="'zip'" :label="'Zip'" />
                        <x-input type="text" :name="'zip'" :id="'zip'" wire:model="zip" />
                        <x-error name="zip" />
                    </div>
                </div>

                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <x-label :name="'linkedin'" :label="'Linkedin'" />
                        <x-input type="text" :name="'linkedin'" :id="'linkedin'" wire:model="linkedin" />
                        <x-error name="linkedin" />
                    </div>

                    <div class="w-1/2">
                        <x-label :name="'profile-photo'" :label="'Profile Photo'" />
                        <x-input type="file" :name="'profile-photo'" :id="'profile-photo'" wire:model="profile_photo" />
                        <x-error name="profile photo" />
                    </div>
                </div>
            @endif

            <x-button type="submit">Create Account</x-button>
        </form>

    </div>


</div>