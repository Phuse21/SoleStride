@props(['type', 'id', 'name'])

@php
    $defaults = [
        'class' => 'rounded-xl bg-black/2 border border-black/30 px-5 py-4 w-full h-10 text-sm md:text-base focus:outline-none
    focus:ring-2
    focus:ring-blue-500 focus:border-transparent placeholder:text-sm placeholder:text-gray-400',
    ];
@endphp

<input {{ $attributes($defaults) }} type="{{ $type }}" id="{{ $id }}" name="{{ $name }}">