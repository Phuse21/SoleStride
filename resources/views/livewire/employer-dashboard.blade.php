<div>
    <div
        class="flex md:space-y-0 flex-row justify-between md:top-[104px] top-[60px] shadow-lg p-2 rounded-b-md z-10 bg-white">
        <div class="mr-4">
            <h3 class="text-base md:text-xl font-semibold mb-2">Employer Dashboard</h3>
            <h4 class="md:text-sm text-xs text-gray-600 ml-0.5">{{ auth()->user()->employer?->name ?? 'Unknown' }}</h4>
        </div>
        <div class="flex flex-wrap items-start justify-end">
            <x-button wire:navigate :href="route('employer.create')">
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="flex-shrink-0 md:h-6 md:w-6 h-4 w-4 text-white -ml-2 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Post new Job
            </x-button>
        </div>
    </div>

    <section class="grid md:grid-cols-3 xl:grid-cols-4 gap-6 mt-4">
        <a wire:navigate href="{{ route('employer.jobsPosted') }}">
            <div class="flex items-center p-8 bg-white shadow rounded-lg hover:bg-black/5">
                <div
                    class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-purple-600 bg-purple-100 hover:bg-purple-200 rounded-full mr-6">
                    <svg fill="#000000" viewBox="0 0 24 24" id="job" data-name="Line Color"
                        xmlns="http://www.w3.org/2000/svg" class="icon line-color h-6 w-6">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path id="secondary" d="M16,7H8V4A1,1,0,0,1,9,3h6a1,1,0,0,1,1,1Zm1,4H7m8,0v2"
                                style="fill: none; stroke: #7e3af2; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                            </path>
                            <rect id="primary" x="5" y="5" width="14" height="18" rx="1"
                                transform="translate(26 2) rotate(90)"
                                style="fill: none; stroke: #7e3af2; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                            </rect>
                        </g>
                    </svg>
                </div>
                <div>
                    <span class="block text-2xl font-bold">{{ $jobCount ?? 'NA' }}</span>
                    <span class="block text-gray-500">Jobs Posted</span>
                </div>
            </div>
        </a>
        <div class="flex items-center p-8 bg-white shadow rounded-lg hover:bg-black/5 cursor-pointer" x-data
            @click="$dispatch('open-modal', {name: 'applications'})">
            <div
                class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 bg-yellow-100 hover:bg-yellow-200 rounded-full mr-6">
                <svg fill="#f5ae32" viewBox="0 0 16 16" id="request-send-16px" xmlns="http://www.w3.org/2000/svg"
                    class="icon line-color h-6 w-6">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path id="Path_44" data-name="Path 44"
                            d="M-18,11a2,2,0,0,0,2-2,2,2,0,0,0-2-2,2,2,0,0,0-2,2A2,2,0,0,0-18,11Zm0-3a1,1,0,0,1,1,1,1,1,0,0,1-1,1,1,1,0,0,1-1-1A1,1,0,0,1-18,8Zm2.5,4h-5A2.5,2.5,0,0,0-23,14.5,1.5,1.5,0,0,0-21.5,16h7A1.5,1.5,0,0,0-13,14.5,2.5,2.5,0,0,0-15.5,12Zm1,3h-7a.5.5,0,0,1-.5-.5A1.5,1.5,0,0,1-20.5,13h5A1.5,1.5,0,0,1-14,14.5.5.5,0,0,1-14.5,15ZM-7,2.5v5A2.5,2.5,0,0,1-9.5,10h-2.793l-1.853,1.854A.5.5,0,0,1-14.5,12a.493.493,0,0,1-.191-.038A.5.5,0,0,1-15,11.5v-2a.5.5,0,0,1,.5-.5.5.5,0,0,1,.5.5v.793l1.146-1.147A.5.5,0,0,1-12.5,9h3A1.5,1.5,0,0,0-8,7.5v-5A1.5,1.5,0,0,0-9.5,1h-7A1.5,1.5,0,0,0-18,2.5v3a.5.5,0,0,1-.5.5.5.5,0,0,1-.5-.5v-3A2.5,2.5,0,0,1-16.5,0h7A2.5,2.5,0,0,1-7,2.5Zm-7.854,3.646L-12.707,4H-14.5a.5.5,0,0,1-.5-.5.5.5,0,0,1,.5-.5h3a.5.5,0,0,1,.191.038.506.506,0,0,1,.271.271A.5.5,0,0,1-11,3.5v3a.5.5,0,0,1-.5.5.5.5,0,0,1-.5-.5V4.707l-2.146,2.147A.5.5,0,0,1-14.5,7a.5.5,0,0,1-.354-.146A.5.5,0,0,1-14.854,6.146Z"
                            transform="translate(23)"></path>
                    </g>
                </svg>
            </div>
            <div>
                <span class="inline-block text-2xl font-bold">{{ $applicationsCount ?? 'NA' }}</span>
                <span class="block text-gray-500">Job Applications</span>
            </div>

        </div>
        <div class="flex items-center p-8 bg-white shadow rounded-lg hover:bg-black/5 cursor-pointer" x-data
            @click="$dispatch('open-modal', {name: 'shortlisted'})">
            <div
                class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16  bg-blue-100 hover:bg-blue-200 rounded-full mr-6">
                <img src="https://i.ibb.co/vdMT1yz/planning-2755487.png" alt="planning-2755487" class="w-6 h-6">
            </div>
            <div>
                <span class="block text-2xl font-bold">{{ $shortlistedCount ?? 'NA' }}</span>
                <span class="block text-gray-500">Shortlisted Applicants</span>
            </div>

        </div>
    </section>
    <section class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6 mt-6">
        <div class="flex flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
            <div class="px-6 py-5 font-semibold border-b border-gray-100">The number of applied and left students per
                month</div>
            <div class="p-4 flex-grow">
                <div
                    class="flex items-center justify-center h-full px-4 py-16 text-gray-400 text-3xl font-semibold bg-gray-100 border-2 border-gray-200 border-dashed rounded-md">
                    News</div>
            </div>
        </div>

        <div class="row-span-3 bg-white shadow rounded-lg">
            <div class="flex items-center justify-between px-6 py-5 font-semibold border-b border-gray-100">
                <span class="text-bold">Pending Applicants</span>
            </div>
            <div class="overflow-y-auto" style="max-height: 30rem;">
                <ul class="p-4 space-y-6">
                    @if ($applicants && $applicants->count() > 0)
                        @foreach ($applicants->sortBy('created_at') as $application)
                            <li class="flex items-center cursor-pointer hover:bg-black/10 p-2 rounded border-b border-black/10"
                                x-data @click="$dispatch('open-modal', {name: 'application'})"
                                wire:click="$dispatch('viewApplicantDetails', [{{ $application->id }}])">
                                <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                                    <img src="{{ asset($application?->applicants?->profile_photo ?? 'N/A') }}">
                                </div>
                                <span
                                    class=" font-semibold">{{ $application?->applicants?->user?->name ?? 'Unknown' }}</span>
                                <span
                                    class="ml-auto text-gray-600">{{ $application?->created_at->diffForHumans() ?? 'N/A' }}</span>
                            </li>
                        @endforeach
                    @else
                        <li class="text-center text-gray-500">No pending applications.</li>
                    @endif
                </ul>

            </div>
        </div>
        <div class="flex flex-col row-span-3 bg-white shadow rounded-lg">
            <div class="px-6 py-5 font-semibold border-b border-gray-100">Job Applications Chart</div>
            <div class="p-4 flex-grow">
                <div
                    class="flex items-center justify-center h-full px-4 py-14 font-semibold bg-gray-100 border-2 border-gray-200 border-dashed rounded-md">

                    <livewire:chart-component :jobRequests="$jobRequests" />

                </div>
            </div>
        </div>
    </section>


    <x-modal name="application" title="Pending Application">
        <livewire:applications :applicants="$applicants" />
    </x-modal>

    <x-modal name="shortlisted" title="Shortlisted Applicants">
        <div class="overflow-y-auto" style="max-height: 30rem;">
            <ul class="p-4 space-y-6">
                @forelse ($shortlistedApplications as $application)
                    @if ($loop->first)
                        <li
                            class="flex flex-row justify-between items-center cursor-pointer p-2 rounded border-b border-black/10">
                            <span class="font-semibold">Applicants</span>
                            <div wire:loading wire:target="acceptApplication,declineApplication"
                                class="text-sm text-blue-500">
                                Please wait...
                            </div>
                            <span class="text-gray-600">Action</span>
                        </li>
                    @endif
                    <li
                        class="flex items-center cursor-pointer hover:bg-black/10 p-2 rounded border-b border-black/10">
                        <div class="md:h-10 md:w-10 h-8 w-8 mr-3 bg-gray-100 rounded-full overflow-hidden">
                            <img src="{{ asset($application?->applicants?->profile_photo ?? 'N/A') }}">
                        </div>
                        <span
                            class="md:text-base text-sm">{{ $application?->applicants?->user?->name ?? 'Unknown' }}</span>
                        <div class="ml-auto space-x-2">
                            <button wire:loading.attr="disabled"
                                wire:click="acceptApplication({{ $application->id }})"
                                class="text-green-500 md:text-base text-sm no-underline hover:underline">Accept</button>
                            <button wire:loading.attr="disabled"
                                wire:click="declineApplication({{ $application->id }})"
                                class="text-red-500 md:text-base text-sm no-underline hover:underline">Decline</button>
                        </div>
                    </li>
                @empty
                    <li class="text-center text-gray-500">No applications found.</li>
                @endforelse

            </ul>

        </div>
    </x-modal>

    <x-modal name="applications" title="Applications">
        <div class="overflow-y-auto" style="max-height: 30rem;">
            <ul class="p-4 space-y-6">
                <li class="flex items-center cursor-pointer p-2 rounded border-b border-black/10">
                    <span class="text-gray-600 font-bold">Applicants</span>
                    <span class="ml-auto text-gray-600">Status</span>
                </li>

                @forelse ($applications->sortByDesc('updated_at') as $application)
                    <li
                        class="flex items-center cursor-pointer hover:bg-black/10 p-2 rounded border-b border-black/10">
                        <div class="md:h-10 md:w-10 h-8 w-8 mr-3 bg-gray-100 rounded-full overflow-hidden">
                            <img src="{{ asset($application?->applicants?->profile_photo ?? 'N/A') }}"
                                alt="Profile Photo">
                        </div>
                        <span class="text-gray-600 font-semibold md:text-base text-sm">
                            {{ $application?->applicants?->user?->name ?? 'Unknown' }}
                        </span>
                        <span
                            class="ml-auto md:text-base text-sm {{ $application->status === 'shortlisted'
                                ? 'text-yellow-500'
                                : ($application->status === 'accepted'
                                    ? 'text-green-500'
                                    : ($application->status === 'declined'
                                        ? 'text-red-500'
                                        : 'text-gray-700')) }}">
                            {{ $application?->status ?? 'N/A' }}
                        </span>
                    </li>
                @empty
                    <li class="text-center text-gray-500">No applications found.</li>
                @endforelse

            </ul>

        </div>
    </x-modal>
</div>
