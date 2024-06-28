@props(['tag', 'size' => 'base'])

@php
    $classes = 'bg-primary/30 rounded-xl font-semibold hover:bg-primary/50 transition-colors-duration-300 relative';

    if ($size === 'base') {
        $classes .= ' text-sm px-5 py-1 mb-3';
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