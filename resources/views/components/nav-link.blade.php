@props(['active' => false])

<a class="{{ $active ? 'bg-blue-500 text-white' : 'text-black hover:bg-blue-300 hover:text-white'}} rounded-md px-3 py-2"
    aria-current="{{ $active ? 'page' : 'false'}}" {{$attributes}}>
    {{$slot}}
</a>