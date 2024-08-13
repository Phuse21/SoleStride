<button wire:loading.attr="disabled" {{$attributes(['class' => 'relative text-sm md:text-base inline-flex items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 md:px-4 px-3 rounded-md'])}}>
    {{$slot}}
</button>