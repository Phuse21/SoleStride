<div>
    <form wire:submit.prevent="apply" class="max-w-2xl mx-auto space-y-6">

        <div>
            <x-form.label :name="'cv'" :label="'Upload CV'" />
            <x-form.file :name="'cv'" :id="'cv'" wire:model="cv" />
            <x-form.error name="cv" />
        </div>

        <div wire:loading wire:target="cv" class="text-blue-500">
            Uploading...
        </div>

        <x-button type="submit">Submit</x-button>

        <div wire:loading wire:target="apply">
            <div class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-primary motion-reduce:animate-[spin_1.5s_linear_infinite]"
                role="status">
                <span
                    class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
            </div>
        </div>
    </form>
</div>