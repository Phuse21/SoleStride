@props(['label', 'name'])

@php
$defaults = [
'type' => 'checkbox',
'id' => $name,
'name' => $name,
'value' => $name
];
@endphp

<div class="rounded-xl bg-black/10 border border-black/10 px-5 py-4 w-full
     focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
    <input {{ $attributes($defaults) }}>
    <span class="pl-1">{{ $name }}</span>
</div>