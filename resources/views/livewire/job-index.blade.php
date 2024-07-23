<div>
    <div class="space-y-6">

        <section class="pt-6 text-center">
            <h1 class="text-3xl font-bold">Let's Find Your Next Job</h1>

            <form action="" class="mt-6">
                <div class="flex justify-center w-full">
                    <livewire:search />
                </div>
            </form>
        </section>

        <section class="pt-6 mb-20">
            <x-section-heading>Featured Jobs</x-section-heading>
            <div class="grid lg:grid-cols-3 gap-8 my-4">
                @foreach ($jobs->get(1, collect())->take($perPageFeatured) as $job)
                <x-job-card :job="$job" />
                @endforeach
            </div>
            <div class="flex justify-between items-center mt-6">
                @if ($jobs->get(1, collect())->count() > $perPageFeatured)
                <a href="#" wire:click="loadMoreFeatured"
                    class="text-blue-500 hover:text-blue-600 flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <span>Show More</span>
                </a>
                @else
                <a href="#" wire:click="loadLessFeatured"
                    class="text-blue-500 hover:text-blue-600 flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                    <span>Show Less</span>
                </a>

                @endif
                <span class="text-gray-600">{{ $jobs->get(1, collect())->take($perPageFeatured)->count() }} of
                    {{ $jobs->get(1, collect())->count() }} featured jobs</span>
            </div>
        </section>



        <section>
            <x-section-heading>Tags</x-section-heading>
            <div class="mt-4 space-x-2 flex flex-wrap mb-20">



                <!-- when parameter name and the variable name are the same -->

                @if($tags->isEmpty())
                <p class="text-center">No tags available</p>
                @else
                @foreach ($tags as $tag)
                <x-tag :$tag />
                @endforeach
                @endif

            </div>
        </section>

        <section>
            <x-section-heading>Recent Jobs</x-section-heading>
            <div class="mt-4 space-y-6">

                @foreach ($jobs->get(0, collect())->take($perPageRegular) as $job)
                <x-job-card-wide :$job />
                @endforeach
            </div>
            <div class="flex justify-between items-center mt-6">
                @if ($jobs->get(0, collect())->count() > $perPageRegular)
                <a href="#" wire:click="loadMoreRegular"
                    class="text-blue-500 hover:text-blue-600 flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <span>Show More</span>
                </a>
                @else
                <a href="#" wire:click="loadLessRegular"
                    class="text-blue-500 hover:text-blue-600 flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                    <span>Show Less</span>
                </a>

                @endif
                <span class="text-gray-600">{{ $jobs->get(0, collect())->take($perPageRegular)->count() }} of
                    {{ $jobs->get(0, collect())->count() }} jobs</span>
            </div>
        </section>
    </div>
</div>