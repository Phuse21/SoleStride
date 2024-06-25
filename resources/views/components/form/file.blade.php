@props(['id', 'name'])

@php
    $defaults = [
        'class' => 'block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-black/2
    ',
    ];
@endphp

<input {{ $attributes($defaults) }} type="file" id="{{ $id }}" name="{{ $name }}">