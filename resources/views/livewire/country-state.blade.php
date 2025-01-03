<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="md:w-full w-[85%] mx-auto">
        <x-form.label name="country" label="Country" />
        <x-form.select name="country" id="country" wire:model.live="selectedCountry">
            <option value="">--Select a country--</option>
            @foreach ($countries as $country)
            <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </x-form.select>
        <x-form.error name="selectedCountry" />
    </div>

    <div class="md:w-full w-[85%] mx-auto">
        <x-form.label name="state" label="State/Province" />
        <div wire:loading wire:target="selectedCountry" class="text-sm text-blue-500">
            Updating states...
        </div>
        <x-form.select name="state" id="state" wire:model.live="selectedState">
            <option value="">--Select a state--</option>
            @foreach ($states as $state)
            <option value="{{ $state->id }}">{{ $state->name }}</option>
            @endforeach
        </x-form.select>
        <x-form.error name="selectedState" />

    </div>
</div>