<div>
    <x-page-heading>Edit Profile</x-page-heading>

    <div class="flex space-x-2">
        <div class="flex-1">
            <form wire:submit="updateEmployer" class="max-w-2xl p-4 mx-auto space-y-6">
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <x-form.label :name="'name'" :label="'Name'" />
                        <x-form.input type="text" :name="'name'" :id="'name'" wire:model="name" />
                        <x-form.error name="name" />
                    </div>
                    <div class="w-1/2">
                        <x-form.label :name="'employer'" :label="'Company Name'" />
                        <x-form.input type="text" :name="'employer'" :id="'employer'" wire:model="employer_name" />
                        <x-form.error name="employer" />
                    </div>
                </div>

                <div class="flex space-x-4">
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

                    <div class="w-1/2">
                        <x-form.label :name="'phone'" :label="'Phone'" />
                        <x-form.input type="text" :name="'phone'" :id="'phone'" wire:model="company_phone" />
                        <x-form.error name="phone" />
                    </div>
                </div>
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <x-form.label :name="'country'" :label="'Country'" />
                        <x-form.input type="text" :name="'country'" :id="'country'" wire:model="company_country" />
                        <x-form.error name="country" />
                    </div>

                    <div class="w-1/2">
                        <x-form.label :name="'street-address'" :label="'Street Address'" />
                        <x-form.input type="text" :name="'street-address'" :id="'company-street-address'"
                            wire:model="company_street_address" />
                        <x-form.error name="street_address" />
                    </div>
                </div>


                <div class="flex space-x-4">
                    <div class="w-1.5/4">
                        <x-form.label :name="'state'" :label="'State'" />
                        <x-form.input type="text" :name="'state'" :id="'state'" wire:model="company_state" />
                        <x-form.error name="state" />
                    </div>

                    <div class="w-1.5/4">
                        <x-form.label :name="'city'" :label="'City'" />
                        <x-form.input type="text" :name="'city'" :id="'city'" wire:model="company_city" />
                        <x-form.error name="city" />
                    </div>


                    <div class="w-1/4">
                        <x-form.label :name="'zip'" :label="'Zip'" />
                        <x-form.input type="text" :name="'zip'" :id="'zip'" wire:model="company_zip" />
                        <x-form.error name="zip" />
                    </div>
                </div>
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <x-form.label :name="'linkedin'" :label="'Linkedin'" />
                        <x-form.input type="text" :name="'linkedin'" :id="'linkedin'" wire:model="url" />
                        <x-form.error name="linkedin" />
                    </div>

                    <div class="w-1/2">
                        <x-form.label :name="'logo'" :label="'Company Logo'" />
                        <x-form.file :name="'logo'" :id="'logo'" wire:model="logo" />
                        <x-form.error name="logo" />
                    </div>
                </div>


                <x-button type="submit">Update</x-button>

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