<x-employer.layout>
    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
        <div class="mr-4">
            <h3 class="text-xl font-semibold mb-2">Employer Dashboard</h3>
            <h4 class="text-sm text-gray-600 ml-0.5">Welcome {{auth()->user()->name}}</h4>
        </div>
        <div class="flex flex-wrap items-start justify-end">
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
</x-employer.layout>