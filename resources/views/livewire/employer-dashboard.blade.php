<div>
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
                <span class="block text-2xl font-bold">62</span>
                <span class="block text-gray-500">Total Jobs Posted</span>
            </div>
        </div>
        <div class="flex items-center p-8 bg-white shadow rounded-lg">
            <div
                class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-100 hover:bg-green-200 rounded-full mr-6">
                <svg viewBox="0 -9.65 75.554 75.554" xmlns="http://www.w3.org/2000/svg" fill="#000000"
                    class="icon line-color h-6 w-6">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g id="Group_2" data-name="Group 2" transform="translate(-309.723 -164.741)">
                            <circle id="Ellipse_1" data-name="Ellipse 1" cx="15.049" cy="15.049" r="15.049"
                                transform="translate(347.784 172.134)" fill="#057a55"></circle>
                            <path id="Path_7" data-name="Path 7"
                                d="M362.833,219.487a20.944,20.944,0,0,0,0-41.888H332.167a20.944,20.944,0,1,0,0,41.888Z"
                                fill="none" stroke="#000000" stroke-linecap="round" stroke-miterlimit="10"
                                stroke-width="3" opacity="0.15"></path>
                            <path id="Path_8" data-name="Path 8"
                                d="M362.833,208.129a20.944,20.944,0,0,0,0-41.888H332.167a20.944,20.944,0,1,0,0,41.888Z"
                                fill="none" stroke="#000000" stroke-miterlimit="10" stroke-width="3"></path>
                        </g>
                    </g>
                </svg>
            </div>
            <div>
                <span class="block text-2xl font-bold">6.8</span>
                <span class="block text-gray-500">Active Jobs</span>
            </div>
        </div>
        <div class="flex items-center p-8 bg-white shadow rounded-lg">
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
                <span class="inline-block text-2xl font-bold">9</span>
                <span class="inline-block text-sm text-gray-500 font-semibold">(Up by 14% this month)</span>
                <span class="block text-gray-500">Job Requests</span>
            </div>
        </div>
        <div class="flex items-center p-8 bg-white shadow rounded-lg">
            <div
                class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16  bg-blue-100 hover:bg-blue-200 rounded-full mr-6">
                <img src="https://i.ibb.co/vdMT1yz/planning-2755487.png" alt="planning-2755487" class="w-6 h-6">
            </div>
            <div>
                <span class="block text-2xl font-bold">3</span>
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
                    class="inline-flex w-1/4 justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                    id="menu-button" aria-expanded="true" aria-haspopup="true">
                    Sort by
                    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
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
                        <span class="ml-auto font-semibold">1 hr ago</span>
                    </li>
                    <li class="flex items-center">
                        <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/men/81.jpg"
                                alt="Calvin Steward profile picture">
                        </div>
                        <span class="text-gray-600">Calvin Steward</span>
                        <span class="ml-auto font-semibold">2 days ago</span>
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
</div>