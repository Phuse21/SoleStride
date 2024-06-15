@props(['label', 'name'])

@php
$options = [
'Employer' => 'employer',
'Applicant' => 'applicant',
];
@endphp

<div class="flex border-2 border-teal-500 rounded-lg">
    @foreach ($options as $optionLabel => $optionValue)
    <input wire:model.live="{{ $name }}" type="radio" name="{{ $name }}" id="{{ $optionValue }}"
        value="{{ $optionValue }}" class="hidden peer">
    <label for="{{ $optionValue }}"
        class="flex-1 py-2 px-4 font-semibold cursor-pointer focus:outline-none peer-checked:bg-teal-500 peer-checked:text-white bg-white text-teal-500 transition-colors duration-200 {{ $loop->first ? 'border-r border-teal-500 rounded-l-md' : '' }} {{ $loop->last ? 'rounded-r-md' : '' }}">
        {{ $optionLabel }}
    </label>
    @endforeach
</div>