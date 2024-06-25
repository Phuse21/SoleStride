<div x-data="{ step: @entangle('step') }">
    <x-page-heading>Create New Job</x-page-heading>

    <!-- Step 1 -->
    <div x-show="step === 1">
        <div class="flex-1">
            <form wire:submit.prevent="nextStep">
                <div class="max-w-2xl mx-auto space-y-6">
                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <x-form.label name="title" label="Title" />
                            <x-form.input type="text" name="title" id="title" wire:model="title" />
                            <x-form.error name="title" />
                        </div>

                        <div class="w-1/2">
                            <x-form.label name="salary" label="Salary" />
                            <x-form.input type="text" name="salary" id="salary" wire:model="salary" />
                            <x-form.error name="salary" />
                        </div>
                    </div>

                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <x-form.label name="location" label="Location" />
                            <x-form.input type="text" name="location" id="location" wire:model="location" />
                            <x-form.error name="location" />
                        </div>

                        <div class="w-1/2">
                            <x-form.label name="schedule" label="Schedule" />
                            <x-form.select name="schedule" id="schedule" wire:model="schedule">
                                <option value="full-time">Full Time</option>
                                <option value="part-time">Part Time</option>
                            </x-form.select>
                            <x-form.error name="schedule" />
                        </div>
                    </div>

                    <div class="flex space-x-4">
                        <div class="w-1/2 form-check">
                            <x-form.label name="feature" label="Featured (Paid)" />
                            <x-form.checkbox name="feature" id="feature" wire:model="featured" />
                            <x-form.error name="feature" />
                        </div>

                        <div class="w-1/2">
                            <x-form.label name="mode" label="Mode" />
                            <x-form.select name="mode" id="mode" wire:model="mode">
                                <option value="remote">Remote</option>
                                <option value="on-site">On-Site</option>
                                <option value="hybrid">Hybrid</option>
                            </x-form.select>
                            <x-form.error name="mode" />
                        </div>
                    </div>

                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <x-form.label name="url" label="Url" />
                            <x-form.input type="text" name="url" id="url" wire:model="url" />
                            <x-form.error name="url" />
                        </div>

                        <div class="w-1/2">
                            <x-form.label name="tags" label="Tags" />
                            <x-form.input type="text" name="tags" id="tags" wire:model="tags" />
                            <x-form.error name="tags" />
                        </div>
                    </div>

                    <div class="flex space-x-4 items-center">
                        <x-button type="submit">Next</x-button>
                        <div wire:loading>
                            <div class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-primary motion-reduce:animate-[spin_1.5s_linear_infinite]"
                                role="status">
                                <span
                                    class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Step 2 -->
    <div x-show="step === 2">
        <div class="flex-1">
            <form wire:submit.prevent="saveJobDetails">
                <div class="max-w-2xl mx-auto space-y-6">


                    <div class="flex space-x-2">
                        <div class="w-2/5">
                            <x-form.label name="minimum_qualifications" label="Minimum Qualifications" />
                            <x-form.select name="minimum_qualifications" id="minimum_qualifications"
                                wire:model="minimum_qualifications">
                                <option value="none">None</option>
                                <option value="bachelor">High School</option>
                                <option value="bachelor">Bachelor</option>
                                <option value="bachelor">Master</option>
                            </x-form.select>
                            <x-form.error name="minimum_qualifications" />
                        </div>

                        <div class="w-1/5">
                            <x-form.label name="experience_years" label="Years of Exp" />
                            <x-form.input type="number" name="experience_years" id="experience_years"
                                wire:model="experience_years" />
                            <x-form.error name="experience_years" />
                        </div>

                        <div class="w-2/5">
                            <x-form.label name="experience_level" label="Experience Level" />
                            <x-form.select name="experience_level" id="experience_level" wire:model="experience_level">
                                <option value="none">Any</option>
                                <option value="bachelor">Entry</option>
                                <option value="bachelor">Mid</option>
                                <option value="bachelor">Senior</option>
                            </x-form.select>
                            <x-form.error name="experience_level" />
                        </div>

                    </div>

                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <x-form.label name="responsibilities" label="Responsibilities" />
                            <textarea name="responsibilities" id="responsibilities" wire:model="responsibilities"
                                placeholder="Meet client, Communicate with client etc."
                                class="w-full border rounded-md p-2 text-sm h-20"></textarea>
                            <x-form.error name="responsibilities" />
                        </div>

                        <div class="w-1/2">
                            <x-form.label name="skills" label="Skills" />
                            <textarea name="skills" id="skills" wire:model="skills"
                                placeholder=" Communication, English etc."
                                class="w-full border rounded-md p-2 text-sm h-20"></textarea>
                            <x-form.error name="skills" />
                        </div>
                    </div>

                    <div class="flex space-x-4">
                        <div class="w-full">
                            <x-form.label name="summary" label="Job Summary" />
                            <textarea name="summary" id="summary" wire:model="summary" p
                                placeholder="Provide a brief description of the job."
                                class="w-full border rounded-md p-2 text-sm h-20"></textarea>
                            <x-form.error name="summary" />
                        </div>
                    </div>

                    <div class="flex space-x-4 items-center">
                        <x-button type="button" @click="step = 1">Back</x-button>
                        <x-button type="submit">Publish</x-button>
                        <div wire:loading>
                            <div class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-primary motion-reduce:animate-[spin_1.5s_linear_infinite]"
                                role="status">
                                <span
                                    class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- <div wire:loading>
        <div class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-primary motion-reduce:animate-[spin_1.5s_linear_infinite]"
            role="status">
            <span
                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
        </div>
    </div> -->
</div>