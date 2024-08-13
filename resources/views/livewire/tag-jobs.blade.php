<div x-data="{ open: false }">
    <!-- Container for Heading and Button -->
    <div class="flex justify-between items-center mb-4 rounded-lg p-4 border border-gray-200 bg-white shadow-sm">
        <!-- Heading -->
        <h1 class="text-xl font-semibold">{{ $tag->name }} Jobs</h1>

        <!-- Button Container -->
        <button @click="open = !open"
            class="text-sm md:text-base inline-flex items-center hover:bg-gray-200 text-gray-500 font-bold py-2 md:px-2 px-1 gap-2 border border-gray-200 rounded-md transition ease-in-out duration-150">
            <!-- Downward Arrow Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
            Change
        </button>
    </div>

    <!-- Tags Dropdown -->
    <div x-show="open" @click.outside="open = false"
        class="absolute mt-[-25px] py-2 right-[-1px] w-[300px] max-h-[350px] overflow-y-auto bg-white border border-gray-200 rounded-lg shadow-lg z-20">
        <div class="px-2 py-1 w-full flex items-center justify-between border-b border-gray-300">
            <div class="text-sm font-semibold text-gray-800">All tags</div>
            <button @click="open = false">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        @forelse ($tags as $tagList)
        <div class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
            <a href="{{ route('tag.show', [$tagList->name]) }}" class="flex items-center justify-between">
                <div class="text-black text-sm">
                    {{ $tagList?->name ?? 'N/A' }}
                </div>

                <div class="text-gray-600 text-2xs">{{ $tagList?->jobs?->count() ?? 'N/A' }} Jobs</div>

            </a>
        </div>
        @empty
        <div class="px-4 py-2 text-gray-500">
            No tag
        </div>
        @endforelse
    </div>

    <div class="space-y-6">
        @foreach ($jobs as $job)
        <x-job-card-wide :job="$job" />
        @endforeach
    </div>
</div>