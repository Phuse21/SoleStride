@props(['active' => false])

<a class="{{ $active ? ' text-blue-500' : 'text-black hover:text-blue-300'}} md:text-base text-sm rounded-md px-1 py-1"
    aria-current="{{ $active ? 'page' : 'false'}}" {{$attributes}}>
    {{$slot}}
</a>