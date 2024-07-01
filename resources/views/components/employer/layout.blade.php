<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoleStride</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;600&display=swap">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="bg-white text-black font-hanken overflow-x-hidden pb-20">
    <div class="px-8">
        <nav class="flex justify-between items-center border-b border-black/10 sticky top-0 bg-white z-10">
            <div>
                <a wire:navigate href="{{route('employer.home')}}">
                    <img class="h-24 w-24" src="https://i.ibb.co/C0484RC/2-removebg-preview.png" alt="Your Company">
                </a>
            </div>
            <div class="space-x-4 font-bold ml-10">
                <x-nav-link wire:navigate href="{{route('employer.home')}}"
                    :active="request()->routeIs('employer.home')">
                    Home
                </x-nav-link>
                <x-nav-link wire:navigate href="{{route('employer.jobsPosted')}}"
                    :active="request()->routeIs('employer.jobsPosted')">Jobs Posted
                </x-nav-link>
            </div>


            <div class="flex flex-shrink-0 items-center">
                <button class="inline-flex items-center p-2 hover:bg-gray-100 focus:bg-gray-100 rounded-lg">

                    <div class="hidden md:flex md:flex-col md:items-end md:leading-tight">
                        <span class="font-semibold
                                    text-sm">{{auth()->user()->name}}</span>
                        <span class="text-xs text-gray-600">{{auth()->user()->role}}</span>
                    </div>
                    <span class="h-12 w-12 ml-2 sm:ml-3 mr-2 p-1 bg-gray-100 rounded-full overflow-hidden">
                        <img src="{{asset(auth()->user()->employer->logo)}}" alt="user profile photo"
                            class="h-full w-full object-cover rounded-full">
                    </span>
                </button>
                <div class="flex space-x-2 font-bold items-center border-l pl-3 ml-3">
                    <x-nav-link wire:navigate>
                        <div class="relative mt-1">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="h-6 w-6" xmlns="http://www.w3.org/2000/svg">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.585 15.5H5.415A1.65 1.65 0 0 1 4 13a10.526 10.526 0 0 0 1.5-5.415V6.5a4 4 0 0 1 4-4h2a4 4 0 0 1 4 4v1.085c0 1.907.518 3.78 1.5 5.415a1.65 1.65 0 0 1-1.415 2.5zm1.915-11c-.267-.934-.6-1.6-1-2s-1.066-.733-2-1m-10.912 3c.209-.934.512-1.6.912-2s1.096-.733 2.088-1M13 17c-.667 1-1.5 1.5-2.5 1.5S8.667 18 8 17" />
                            </svg>
                            <div
                                class="px-1 bg-blue-500 rounded-full text-center text-white text-2xs absolute -top-3 -end-2">
                                3
                                <div
                                    class="absolute top-0 start-0 rounded-full -z-10 animate-ping bg-blue-200 w-full h-full">
                                </div>
                            </div>
                        </div>
                    </x-nav-link>
                    <livewire:logout-user />
                </div>
            </div>


        </nav>

        <main class="mt-6 max-w-[986px] mx-auto">
            {{ $slot }}
        </main>
    </div>

</body>

</html>