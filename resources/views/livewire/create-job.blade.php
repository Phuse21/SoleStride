<div>
    <x-page-heading>Create New Job</x-page-heading>
    <div class="flex space-x-2">
        <div wire:submit="createJob" class="flex-1">
            <form class="max-w-2xl mx-auto space-y-6">
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <x-form.label :name="'title'" :label="'Title'" />
                        <x-form.input type="text" :name="'title'" :id="'title'" wire:model="title" />
                        <x-form.error name="title" />
                    </div>

                    <div class="w-1/2">
                        <x-form.label :name="'salary'" :label="'Salary'" />
                        <x-form.input type="'text" :name="'salary'" :id="'salary'" wire:model="salary" />
                        <x-form.error name="salary" />
                    </div>
                </div>

                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <x-form.label :name="'location'" :label="'Location'" />
                        <x-form.input type="text" :name="'location'" :id="'location'" wire:model="location" />
                        <x-form.error name="location" />
                    </div>

                    <div class="w-1/2">
                        <x-form.label :name="'schedule'" :label="'Schedule'" />
                        <x-form.select :name="'schedule'" :id="'schedule'" wire:model="schedule">
                            <option value="full-time">Full Time</option>
                            <option value="part-time">Part Time</option>
                        </x-form.select>
                        <x-form.error name="schedule" />
                    </div>
                </div>

                <div class="flex space-x-4">
                    <div class="w-1/2 form-check">
                        <x-form.label :name="'feature'" :label="'Featured(Cost Extra)'" />
                        <x-form.checkbox name="feature" id="feature" wire:model="featured" />
                        <x-form.error name="feature" />
                    </div>

                    <div class="w-1/2">
                        <x-form.label :name="'mode'" :label="'Mode'" />
                        <x-form.select :name="'mode'" :id="'mode'" wire:model="mode">
                            <option value="full-time">Remote</option>
                            <option value="part-time">On-Site</option>
                            <option value="part-time">Hybrid</option>
                        </x-form.select>
                        <x-form.error name="mode" />
                    </div>
                </div>

                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <x-form.label :name="'url'" :label="'Url'" />
                        <x-form.input type="text" :name="'url'" :id="'url'" wire:model="url" />
                        <x-form.error name="url" />
                    </div>

                    <div class="w-1/2">
                        <x-form.label :name="'tags'" :label="'Tags'" />
                        <x-form.input type="text" :name="'tags'" :id="'tags'" wire:model="tags" />
                        <x-form.error name="tags" />
                    </div>
                </div>
                <p>By publishing you agree to our <a href="#" class="text-blue-500">Terms & Privacy</a></p>

                <x-button type="submit">Publish</x-button>
            </form>
        </div>

        <!-- <div class="flex-1 pb-10 -mt-10">
            <img src="https://i.ibb.co/W6YvfNY/Frame-2.png" class="pl-10 ">
        </div> -->
    </div>
</div>