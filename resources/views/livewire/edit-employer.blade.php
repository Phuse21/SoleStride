<div>
    <x-page-heading>Edit Profile</x-page-heading>

    <div class="flex space-x-2">
        <div class="flex-1">
            <form wire:submit="updateEmployer" class="max-w-2xl p-4 mx-auto space-y-6">
                <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label :name="'name'" :label="'Name'" />
                        <x-form.input type="text" :name="'name'" :id="'name'" wire:model="name" />
                        <x-form.error name="name" />
                    </div>
                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label :name="'employer'" :label="'Company Name'" />
                        <x-form.input type="text" :name="'employer'" :id="'employer'" wire:model="employer_name" />
                        <x-form.error name="employer" />
                    </div>
                </div>

                <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                    <div class="md:w-full w-[85%] mx-auto">
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

                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label :name="'phone'" :label="'Phone'" />
                        <x-form.input type="text" :name="'phone'" :id="'phone'" wire:model="company_phone" />
                        <x-form.error name="phone" />
                    </div>
                </div>
                <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label :name="'country'" :label="'Country'" />
                        <x-form.input type="text" :name="'country'" :id="'country'"
                            wire:model="company_country" />
                        <x-form.error name="country" />
                    </div>

                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label :name="'street-address'" :label="'Street Address'" />
                        <x-form.input type="text" :name="'street-address'" :id="'company-street-address'"
                            wire:model="company_street_address" />
                        <x-form.error name="street_address" />
                    </div>
                </div>


                <div class="grid md:grid-cols-3 grid-cols-1 gap-4">
                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label :name="'state'" :label="'State'" />
                        <x-form.input type="text" :name="'state'" :id="'state'" wire:model="company_state" />
                        <x-form.error name="state" />
                    </div>

                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label :name="'city'" :label="'City'" />
                        <x-form.input type="text" :name="'city'" :id="'city'" wire:model="company_city" />
                        <x-form.error name="city" />
                    </div>


                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label :name="'zip'" :label="'Zip'" />
                        <x-form.input type="text" :name="'zip'" :id="'zip'" wire:model="company_zip" />
                        <x-form.error name="zip" />
                    </div>
                </div>
                <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label :name="'linkedin'" :label="'Linkedin'" />
                        <x-form.input type="text" :name="'linkedin'" :id="'linkedin'" wire:model="url" />
                        <x-form.error name="linkedin" />
                    </div>

                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label :name="'logo'" :label="'Company Logo'" />
                        <x-form.file :name="'logo'" :id="'logo'" accept="image/*" wire:model="logo" />
                        <x-form.error name="logo" />
                        <div class="flex justify-between">
                            <small class="text-gray-500">Only images are accepted</small>
                            <div wire:loading wire:target="logo" class="text-sm text-blue-500">
                                Uploading...
                            </div>
                        </div>

                    </div>
                </div>

                <div class="md:w-full w-[85%] mx-auto">
                    <x-button type="submit" wire:loading.attr="disabled" wire:target="logo,updateEmployer">
                        Update
                        <div wire:loading wire:target="updateEmployer">
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
