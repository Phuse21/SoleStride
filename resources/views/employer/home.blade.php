<x-employer.layout>
    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
        <div class="mr-4">
            <h3 class="text-xl font-semibold mb-2">Employer Dashboard</h3>
            <h4 class="text-sm text-gray-600 ml-0.5">{{auth()->user()->employer->name}}</h4>
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

    <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 mt-4">
        <div class="flex items-center p-8 bg-white shadow rounded-lg">
            <div
                class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-purple-600 bg-purple-100 rounded-full mr-6">
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <div>
                <span class="block text-2xl font-bold">62</span>
                <span class="block text-gray-500">Total Jobs Posted</span>
            </div>
        </div>
        <div class="flex items-center p-8 bg-white shadow rounded-lg">
            <div
                class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-100 rounded-full mr-6">
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                </svg>
            </div>
            <div>
                <span class="block text-2xl font-bold">6.8</span>
                <span class="block text-gray-500">Active Jobs</span>
            </div>
        </div>
        <div class="flex items-center p-8 bg-white shadow rounded-lg">
            <div
                class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-red-600 bg-red-100 rounded-full mr-6">
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                </svg>
            </div>
            <div>
                <span class="inline-block text-2xl font-bold">9</span>
                <span class="inline-block text-xl text-gray-500 font-semibold">(14%)</span>
                <span class="block text-gray-500">Job Requests</span>
            </div>
        </div>
        <div class="flex items-center p-8 bg-white shadow rounded-lg">
            <div
                class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <div>
                <span class="block text-2xl font-bold">83%</span>
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
                <span>Applicants</span>
                <button type="button"
                    class="inline-flex justify-center rounded-md px-1 -mr-1 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-600"
                    id="options-menu" aria-haspopup="true" aria-expanded="true">
                    Descending
                    <svg class="-mr-1 ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <!-- Refer here for full dropdown menu code: https://tailwindui.com/components/application-ui/elements/dropdowns -->
            </div>
            <div class="overflow-y-auto" style="max-height: 30rem;">
                <ul class="p-6 space-y-6">
                    <li class="flex items-center">
                        <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/women/82.jpg"
                                alt="Annette Watson profile picture">
                        </div>
                        <span class="text-gray-600">Annette Watson</span>
                        <span class="ml-auto font-semibold">9.3</span>
                    </li>
                    <li class="flex items-center">
                        <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/men/81.jpg"
                                alt="Calvin Steward profile picture">
                        </div>
                        <span class="text-gray-600">Calvin Steward</span>
                        <span class="ml-auto font-semibold">8.9</span>
                    </li>
                    <li class="flex items-center">
                        <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/men/80.jpg"
                                alt="Ralph Richards profile picture">
                        </div>
                        <span class="text-gray-600">Ralph Richards</span>
                        <span class="ml-auto font-semibold">8.7</span>
                    </li>
                    <li class="flex items-center">
                        <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/men/79.jpg"
                                alt="Bernard Murphy profile picture">
                        </div>
                        <span class="text-gray-600">Bernard Murphy</span>
                        <span class="ml-auto font-semibold">8.2</span>
                    </li>
                    <li class="flex items-center">
                        <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/women/78.jpg"
                                alt="Arlene Robertson profile picture">
                        </div>
                        <span class="text-gray-600">Arlene Robertson</span>
                        <span class="ml-auto font-semibold">8.2</span>
                    </li>
                    <li class="flex items-center">
                        <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/women/77.jpg" alt="Jane Lane profile picture">
                        </div>
                        <span class="text-gray-600">Jane Lane</span>
                        <span class="ml-auto font-semibold">8.1</span>
                    </li>
                    <li class="flex items-center">
                        <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/men/76.jpg"
                                alt="Pat Mckinney profile picture">
                        </div>
                        <span class="text-gray-600">Pat Mckinney</span>
                        <span class="ml-auto font-semibold">7.9</span>
                    </li>
                    <li class="flex items-center">
                        <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg"
                                alt="Norman Walters profile picture">
                        </div>
                        <span class="text-gray-600">Norman Walters</span>
                        <span class="ml-auto font-semibold">7.7</span>
                    </li>
                    <li class="flex items-center">
                        <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/men/95.jpg"
                                alt="Norman Walters profile picture">
                        </div>
                        <span class="text-gray-600">Norman Walters</span>
                        <span class="ml-auto font-semibold">7.7</span>
                    </li>
                    <li class="flex items-center">
                        <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/men/15.jpg"
                                alt="Norman Walters profile picture">
                        </div>
                        <span class="text-gray-600">Norman Walters</span>
                        <span class="ml-auto font-semibold">7.7</span>
                    </li>
                    <li class="flex items-center">
                        <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/men/85.jpg">
                        </div>
                        <span class="text-gray-600">Adli Barns</span>
                        <span class="ml-auto font-semibold">7.7</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex flex-col row-span-3 bg-white shadow rounded-lg">
            <div class="px-6 py-5 font-semibold border-b border-gray-100">Jobs by Requests</div>
            <div class="p-4 flex-grow">
                <div
                    class="flex items-center justify-center h-full px-4 py-24 text-gray-400 text-3xl font-semibold bg-gray-100 border-2 border-gray-200 border-dashed rounded-md">

                    <livewire:chart-component />

                </div>
            </div>
        </div>
    </section>
</x-employer.layout>