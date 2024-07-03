<div>
    <x-section-heading>Posted Jobs</x-section-heading>
    <div class="flex space-x-6 mt-4">

        <div class="w-2/3 space-y-6">
            @if($jobs->isEmpty())
            <p class="text-center">No jobs Posted</p>
            <div class="text-center">
                <x-button wire:navigate :href="route('employer.create')">
                    <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="flex-shrink-0 h-6 w-6 text-white -ml-2 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Post new Job
                </x-button>
            </div>
            @else
            @foreach ($jobs as $job)
            <x-employer.show-jobs :$job />
            @endforeach
            @endif
            <div class="text-right">
                <x-button wire:navigate :href="route('employer.create')">
                    <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="flex-shrink-0 h-6 w-6 text-white -ml-2 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Post new Job
                </x-button>
            </div>
        </div>

        <div class="w-1/3">
            <img src="https://i.ibb.co/zGmPNzP/portrait-engineer-job-site-work-hours.jpg"
                alt="portrait-engineer-job-site-work-hours" class="rounded-xl">
        </div>
    </div>

</div>