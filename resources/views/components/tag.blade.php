@props(['tag', 'size' => 'base'])

@php
$classes = 'bg-black/20 rounded-xl font-semibold hover:bg-black/30 transition-colors-duration-300';

if ($size === 'base') {
$classes .= ' text-sm px-5 py-1';
}

if ($size === 'sm') {
$classes .= ' text-2xs px-3 py-1';
}

@endphp
@if (isset($tag))
<a href="/tags/{{$tag->name}}" {{ $attributes(['class' => $classes])}}>
    {{ $tag->name }}
</a>
@endif