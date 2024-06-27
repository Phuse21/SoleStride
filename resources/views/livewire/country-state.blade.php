<div class="flex space-x-4">
    <div class="w-1/2">
        <x-form.label name="country" label="Country" />
        <x-form.select name="country" id="country" wire:model.live="selectedCountry">
            <option value="">--Select a country--</option>
            @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </x-form.select>
        <x-form.error name="selectedCountry" />
    </div>

    <div class="w-1/2">
        <x-form.label name="state" label="State/Province" />
        <x-form.select name="state" id="state" wire:model.live="selectedState">
            <option value="">--Select a state--</option>
            @foreach ($states as $state)
                <option value="{{ $state->id }}">{{ $state->name }}</option>
            @endforeach
        </x-form.select>
        <x-form.error name="selectedState" />
    </div>
</div>