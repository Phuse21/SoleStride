@props(['label', 'name'])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl text-sm md:text-base bg-black/2 border border-black/30 px-3 py-1 w-full h-10
    focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent'
    ];
@endphp


<select {{ $attributes($defaults) }}>
    {{ $slot }}
</select>