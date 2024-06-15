@props(['label', 'name'])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-black/10 border border-black/10 px-3 py-4 w-full
    focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent'
    ];
@endphp


<select {{ $attributes($defaults) }}>
    {{ $slot }}
</select>