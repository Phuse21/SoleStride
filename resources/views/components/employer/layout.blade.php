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
        <nav class="flex justify-between items-center border-b border-black/10 sticky top-0 bg-white z-50">
            <div>
                <a wire:navigate href="{{route('employer.home')}}">
                    <img class="h-24 w-24" src="https://i.ibb.co/C0484RC/2-removebg-preview.png" alt="Your Company">
                </a>
            </div>
            <div class="space-x-4 font-bold">
                <x-nav-link wire:navigate href="{{route('employer.home')}}"
                    :active="request()->routeIs('employer.home')">
                    Home
                </x-nav-link>
                <x-nav-link wire:navigate href="/posted-jobs" :active="request()->is('/careers')">Jobs Posted
                </x-nav-link>
                <x-nav-link wire:navigate href="/requests" :active="request()->is('/salaries')">Job
                    Requests</x-nav-link>
            </div>


            <div class="flex space-x-4 font-bold items-center">
                <x-nav-link wire:navigate href="{{route('employer.create')}}"
                    :active="request()->routeIs('employer.create')">
                    Post a Job
                </x-nav-link>
                <livewire:logout-user />
            </div>


        </nav>

        <main class="mt-6 max-w-[986px] mx-auto">
            {{ $slot }}
        </main>
    </div>
</body>

</html>