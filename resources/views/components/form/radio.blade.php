@props(['label', 'name'])

@php
    $options = [
        'Employer' => 'employer',
        'Applicant' => 'applicant',
    ];
@endphp

<div class="flex justify-between items-center">
    @foreach ($options as $optionLabel => $optionValue)
        <div class="w-1/2">
            <input wire:model.live="{{ $name }}" type="radio" name="{{ $name }}" id="{{ $optionValue }}"
                value="{{ $optionValue }}" class="hidden peer">
            <label for="{{ $optionValue }}"
                class="block w-full h-13 py-2 px-4 font-semibold cursor-pointer focus:outline-none
                             bg-white text-black transition-colors duration-200 
                             {{ $loop->first ? 'rounded-l-md border-2 border-blue-400 peer-checked:bg-blue-400 peer-checked:text-white' : '' }}
                            {{ $loop->last ? 'rounded-r-md border-r-2 border-y-2 border border-blue-400 peer-checked:bg-blue-400 peer-checked:text-white' : '' }}">
                {{ $optionLabel }}
            </label>
        </div>
    @endforeach
</div>