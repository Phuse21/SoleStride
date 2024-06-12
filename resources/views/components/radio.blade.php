@props(['label', 'name'])

@php
$options = [
'Employer' => 'employer',
'Applicant' => 'applicant',
];
@endphp


@foreach ($options as $optionLabel => $optionValue)
<div class="form-check">
    <input wire:model.live="{{ $name }}" type="radio" name="{{ $name }}" id="{{ $optionValue }}"
        value="{{ $optionValue }}">
    <label for="{{ $name . '-' . $optionValue }}">{{ $optionLabel }}</label>
</div>
@endforeach