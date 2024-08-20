<div x-data="{ step: @entangle('step') }">
    <x-page-heading>Create New Job</x-page-heading>

    <!-- Stepper -->
    <div class="md:max-w-md max-w-[60%] mx-auto mb-6" x-data="{ step: @entangle('step') }">
        <div class="flex justify-between items-center">
            <div :class="{ 'bg-blue-600 text-white': step >= 1, 'bg-gray-300': step < 1 }"
                class="md:w-8 md:h-8 w-6 h-6 rounded-full flex items-center justify-center">
                1
            </div>
            <div :class="{ 'bg-blue-600': step > 1 }" class="flex-1 h-1 bg-gray-300 mx-2"></div>
            <div :class="{ 'bg-blue-600 text-white': step >= 2, 'bg-gray-300': step < 2 }"
                class="md:w-8 md:h-8 w-6 h-6 rounded-full flex items-center justify-center">
                2
            </div>
        </div>
        <div class="flex justify-between text-xs text-gray-600 mt-2">
            <span>Job Details</span>
            <span>Job Summary</span>
        </div>
    </div>


    <!-- Step 1 -->
    <div x-show="step === 1">
        <div class="flex-1">
            <form wire:submit="nextStep">
                <div class="max-w-2xl mx-auto space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:w-full w-[85%] mx-auto">
                            <x-form.label name="title" label="Title" />
                            <x-form.input type="text" name="title" id="title" wire:model="title" />
                            <x-form.error name="title" />
                        </div>

                        <div class="md:w-full w-[85%] mx-auto">
                            <x-form.label name="salary" label="Salary" />
                            <div class="relative">
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3 text-gray-500">
                                    GHS
                                </span>
                                <x-form.input type="number" min="0" name="salary" id="salary"
                                    wire:model="salary" class="pl-12" />
                            </div>
                            <x-form.error name="salary" />
                        </div>
                    </div>
                    <div>
                        <livewire:country-state wire:model="selectedCountry" wire:model="selectedState" />
                        <div class="flex">
                            <div class="w-[85%] ml-7 block md:hidden">
                                @if ($errors->has('selectedCountry') || $errors->has('selectedState'))
                                    <span class="text-red-500 text-sm">The country and state fields are required.</span>
                                @endif
                            </div>
                            <div class="w-1/2 hidden md:block">
                                <x-form.error name="selectedCountry" />
                            </div>
                            <div class="w-1/2 hidden md:block pl-4">
                                <x-form.error name="selectedState" />
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:w-full w-[85%] mx-auto">
                            <x-form.label name="city" label="City" />
                            <x-form.input type="text" name="city" id="city" wire:model="city" />
                            <x-form.error name="city" />
                        </div>

                        <div class="md:w-full w-[85%] mx-auto">
                            <x-form.label name="schedule" label="Schedule" />
                            <x-form.select name="schedule" id="schedule" wire:model="schedule">
                                <option value="">--Please Select--</option>
                                <option value="Full-time">Full Time</option>
                                <option value="Part-time">Part Time</option>
                            </x-form.select>
                            <x-form.error name="schedule" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:w-full w-[85%] mx-auto form-checkbox">
                            <x-form.label name="feature" label="Featured (Paid)" />
                            <x-form.checkbox name="feature" id="feature" wire:model="featured" />
                            <x-form.error name="feature" />
                        </div>

                        <div class="md:w-full w-[85%] mx-auto">
                            <x-form.label name="mode" label="Mode" />
                            <x-form.select name="mode" id="mode" wire:model="mode">
                                <option value="">--Please Select--</option>
                                <option value="Remote">Remote</option>
                                <option value="On-site">On-Site</option>
                                <option value="Hybrid">Hybrid</option>
                            </x-form.select>
                            <x-form.error name="mode" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:w-full w-[85%] mx-auto">
                            <x-form.label name="url" label="Url(Optional)" />
                            <x-form.input type="text" name="url" id="url" wire:model="url" />
                            <x-form.error name="url" />
                        </div>

                        <div class="md:w-full w-[85%] mx-auto">
                            <x-form.label name="tags" label="Tags" />
                            <x-form.input type="text" placeholder="eg:frontend,API" name="tags" id="tags"
                                wire:model="tags" />
                            <x-form.error name="tags" />
                        </div>
                    </div>



                    <div>
                        <button wire:loading.attr="disabled" wire:target="nextStep,selectState" type="submit"
                            class="relative md:w-fit w-[85%] md:ml-0 mx-auto text-sm md:text-base inline-flex items-center justify-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 md:px-4 px-3 rounded-md">
                            Next
                        </button>
                        <div wire:loading wire:target="nextStep" class="text-sm text-blue-500">
                            Please wait...
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Step 2 -->
    <div x-show="step === 2">
        <div class="flex-1">
            <form wire:submit="saveJobDetails">
                <div class="max-w-2xl mx-auto space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="md:w-full w-[85%] mx-auto">
                            <x-form.label name="minimum_qualifications" label="Minimum Qualifications" />
                            <x-form.select name="minimum_qualifications" id="minimum_qualifications"
                                wire:model="minimum_qualifications">
                                <option value="">--Please Select--</option>
                                <option value="none">None</option>
                                <option value="high_school">High School</option>
                                <option value="diploma">Diploma</option>
                                <option value="bachelor">Bachelor</option>
                                <option value="master">Master</option>
                            </x-form.select>
                            <x-form.error name="minimum_qualifications" />
                        </div>

                        <div class="md:w-full w-[85%] mx-auto">
                            <x-form.label name="experience_years" label="Years of Exp" />
                            <x-form.input type="number" min="0" max="50" name="experience_years"
                                id="experience_years" wire:model="experience_years" />
                            <x-form.error name="experience_years" />
                        </div>

                        <div class="md:w-full w-[85%] mx-auto">
                            <x-form.label name="experience_level" label="Experience Level" />
                            <x-form.select name="experience_level" id="experience_level"
                                wire:model="experience_level">
                                <option value="">--Please Select--</option>
                                <option value="Any">Any</option>
                                <option value="entry">Entry</option>
                                <option value="mid">Mid</option>
                                <option value="senior">Senior</option>
                            </x-form.select>
                            <x-form.error name="experience_level" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4">
                        <div class="md:w-full w-[85%] mx-auto">
                            <x-form.label name="responsibilities" label="Responsibilities" />
                            <textarea name="responsibilities" id="responsibilities" wire:model="responsibilities"
                                placeholder="Meet client, Communicate with client etc." rows="4"
                                class="w-full border rounded-lg p-2 text-sm"></textarea>
                            <div class="flex justify-end">
                                <small class="text-gray-500">Separate responsibilities with comma</small>
                            </div>
                            <x-form.error name="responsibilities" />
                        </div>

                        <div class="md:w-full w-[85%] mx-auto">
                            <x-form.label name="skills" label="Skills" />
                            <textarea name="skills" id="skills" wire:model="skills" placeholder="Communication, English etc."
                                rows="4" class="w-full border rounded-lg p-2 text-sm"></textarea>
                            <div class="flex justify-end">
                                <small class="text-gray-500">Separate skills with comma</small>
                            </div>
                            <x-form.error name="skills" />
                        </div>
                    </div>

                    <div class="md:w-full w-[85%] mx-auto">
                        <x-form.label name="summary" label="Job Summary" />
                        <textarea name="summary" id="summary" wire:model="summary"
                            placeholder="Provide a brief description of the job (minimum 30 characters)." rows="4"
                            class="w-full border rounded-lg p-2 text-sm"></textarea>
                        <div class="flex justify-end">
                            <small class="text-gray-500">
                                <span x-text="$wire.summary.length > 0 ? $wire.summary.length : 0"></span>
                                out of 1000 characters
                            </small>
                        </div>
                        <x-form.error name="summary" />
                    </div>

                    <div class="flex space-x-4 items-center">
                        <x-button type="button" @click="step = 1">Back</x-button>
                        <x-button type="submit" wire:loading.attr="disabled" wire:target="saveJobDetails">Publish
                            <div wire:loading wire:target="saveJobDetails">
                                <div class="inline-block h-4 w-4 ml-1 animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-primary motion-reduce:animate-[spin_1.5s_linear_infinite]"
                                    role="status">
                                    <span
                                        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                                </div>
                            </div>
                        </x-button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
