@props(['active' => false])

<a class="{{ $active ? ' text-blue-500' : 'text-black hover:text-blue-300'}} rounded-md px-3 py-2"
    aria-current="{{ $active ? 'page' : 'false'}}" {{$attributes}}>
    {{$slot}}
</a>