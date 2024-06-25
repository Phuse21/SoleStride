@php
$classes = 'p-4 rounded-xl border hover:bg-black/10 shadow-lg border-black/20 hover:shadow-2xl
transition-colors-duration-500 group';
@endphp

<div {{$attributes(['class' => $classes])}}>

    {{$slot}}
</div>

<!-- bg-black/5 p-4 rounded-xl border hover:bg-black/10 border-transparent hover:border-blue-500
transition-colors-duration-100 group -->