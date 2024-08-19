<div>
    <x-page-heading>Edit Profile</x-page-heading>

    <div class="flex space-x-2">
        <div class="flex-1">
            <form wire:submit="updateApplicant" class="max-w-2xl mx-auto px-4 space-y-6">
                <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label :name="'name'" :label="'Name'" />
                        <x-form.input type="text" :name="'name'" :id="'name'" wire:model="name" />
                        <x-form.error name="name" />
                    </div>

                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label :name="'education'" :label="'Education'" />
                        <x-form.select name="education" id="education" wire:model="education">
                            <option value="">--Please Select--</option>
                            <option value="none">None</option>
                            <option value="High School">High School</option>
                            <option value="Diploma">Diploma</option>
                            <option value="Bachelor">Bachelor</option>
                            <option value="Masters">Masters</option>
                            <option value="Doctorate">Doctorate</option>
                        </x-form.select>
                        <x-form.error name="education" />
                    </div>
                </div>



                <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label :name="'country'" :label="'Country'" />
                        <x-form.input type="text" :name="'country'" :id="'country'" wire:model="country" />
                        <x-form.error name="country" />
                    </div>

                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label :name="'phone'" :label="'Phone'" />
                        <x-form.input type="text" :name="'phone'" :id="'phone'" wire:model="phone" />
                        <x-form.error name="phone" />
                    </div>
                </div>

                <div class="grid md:grid-cols-2 grid-cols-1 gap-4">

                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label :name="'date_of_birth'" :label="'Date of Birth'" />
                        <x-form.input type="date" :name="'date_of_birth'" :id="'date_of_birth'" wire:model="date_of_birth" />
                        <x-form.error name="date_of_birth" />
                    </div>

                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label :name="'street-address'" :label="'Street Address'" />
                        <x-form.input type="text" :name="'street-address'" :id="'street-address'"
                            wire:model="street_address" />
                        <x-form.error name="street_address" />
                    </div>

                </div>

                <div class="grid md:grid-cols-3 grid-cols-1 gap-4">
                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label :name="'city'" :label="'City'" />
                        <x-form.input type="text" :name="'city'" :id="'city'" wire:model="city" />
                        <x-form.error name="city" />
                    </div>

                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label :name="'state'" :label="'State'" />
                        <x-form.input type="text" :name="'state'" :id="'state'" wire:model="state" />
                        <x-form.error name="state" />
                    </div>

                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label :name="'zip'" :label="'Zip'" />
                        <x-form.input type="text" :name="'zip'" :id="'zip'" wire:model="zip" />
                        <x-form.error name="zip" />
                    </div>
                </div>

                <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label :name="'linkedin'" :label="'Linkedin'" />
                        <x-form.input type="text" :name="'linkedin'" :id="'linkedin'" wire:model="linkedin" />
                        <x-form.error name="linkedin" />
                    </div>

                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label :name="'profile-photo'" :label="'Profile Photo'" />
                        <x-form.file :name="'profile-photo'" :id="'profile-photo'" accept="image/*"
                            wire:model="profile_photo" />
                        <x-form.error name="profile photo" />
                        <div class="flex justify-between">
                            <small class="text-gray-500">Only images are accepted</small>
                            <div wire:loading wire:target="profile_photo" class="text-sm text-blue-500">
                                Uploading...
                            </div>
                        </div>

                    </div>
                </div>

                <div class="md:w-full w-[85%] mx-auto">
                    <x-button type="submit" wire:loading.attr="disabled" wire:target="logo,updateApplicant">
                        Update
                        <div wire:loading wire:target="updateApplicant">
                            <div class="inline-block h-4 w-4 ml-1 animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-gray-300 motion-reduce:animate-[spin_1.5s_linear_infinite]"
                                role="status">
                                <span
                                    class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                            </div>
                        </div>
                    </x-button>
                </div>
            </form>

        </div>
    </div>

</div>
