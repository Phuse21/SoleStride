<div>
    <form wire:submit.prevent="apply" class="max-w-2xl mx-auto space-y-6">

        <div>
            <x-form.label :name="'cv'" :label="'Upload CV'" />
            <x-form.file :name="'cv'" :id="'cv'" accept=".pdf" wire:model="cv" />
            <x-form.error name="cv" />
            <div class="flex justify-between">
                <small class="text-gray-500">only .pdf files</small>
                <div wire:loading wire:target="cv" class="text-sm text-blue-500">
                    Uploading...
                </div>
            </div>
        </div>



        <x-button type="submit" wire:loading.attr="disabled" wire:target="cv">Submit
            <div wire:loading wire:target="apply">
                <div class="inline-block md:h-5 md:w-5 h-4 w-4 ml-1 animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-primary motion-reduce:animate-[spin_1.5s_linear_infinite]"
                    role="status">
                    <span
                        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                </div>
            </div>

        </x-button>


    </form>
</div>