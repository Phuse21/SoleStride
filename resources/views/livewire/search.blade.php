<div class="relative w-full">
    <div class="flex justify-center w-full">
        <input wire:model.live="searchQuery" type="text" name="search" id="search" placeholder="Web Developer.."
            class="rounded-xl bg-gray-200 md:text-base text-sm border border-gray-300 md:px-5 md:py-3 px-4 py-2 md:w-[50%] w-[70%] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
    </div>
    @if (!empty($searchQuery))
    <div @click.away="open = false"
        class="absolute left-1/2 transform -translate-x-1/2 mt-2 w-[50%] max-h-60 overflow-y-auto bg-white border border-gray-300 rounded-xl shadow-lg z-10">
        <ul class="divide-y divide-gray-200">
            @forelse($searchResults as $result)
            <a wire:navigate href="{{ route('job.details', ['job' => $result->id]) }}">
                <li class="p-4 hover:bg-gray-100 cursor-pointer">{{ $result->title }}</li>
            </a>
            @empty
            <div class="p-4 text-center text-gray-700">No results found for "{{ $searchQuery }}"</div>
            @endforelse
        </ul>
    </div>
    @endif
</div>