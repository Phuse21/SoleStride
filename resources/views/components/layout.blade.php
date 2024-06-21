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
                @auth
                    <a wire:navigate href="{{route('home')}}">
                        <img class="h-24 w-24" src="https://i.ibb.co/C0484RC/2-removebg-preview.png" alt="Your Company">
                    </a>
                @endauth

                @guest
                    <a wire:navigate href="/">
                        <img class="h-24 w-24" src="https://i.ibb.co/C0484RC/2-removebg-preview.png" alt="Your Company">
                    </a>
                @endguest

            </div>
            <div class="space-x-4 font-bold">
                @guest
                    <x-nav-link wire:navigate href="/" :active="request()->is('/')">Home</x-nav-link>
                    <x-nav-link wire:navigate href="/careers" :active="request()->is('/careers')">Careers</x-nav-link>
                    <x-nav-link wire:navigate href="/salaries" :active="request()->is('/salaries')">Salaries</x-nav-link>
                @endguest

                @auth
                    <x-nav-link wire:navigate href="{{route('home')}}" :active="request()->routeIs('home')">Home
                    </x-nav-link>
                    <x-nav-link wire:navigate href="/careers" :active="request()->is('/careers')">Careers</x-nav-link>
                    <x-nav-link wire:navigate href="/salaries" :active="request()->is('/salaries')">Salaries</x-nav-link>
                @endauth
            </div>

            @auth
                <div class="flex space-x-4 font-bold items-center">
                    <x-nav-link wire:navigate href="/profile" :active="request()->is('profile')">Profile</x-nav-link>
                    <livewire:logout-user />
                </div>
            @endauth
            @guest
                <div class="space-x-4 font-bold">
                    <x-nav-link wire:navigate href="/register" :active="request()->is('register')">Sign Up</x-nav-link>
                    <x-nav-link wire:navigate href="/login" :active="request()->is('login')">Login</x-nav-link>
                </div>
            @endguest
        </nav>

        <main class="mt-6 max-w-[986px] mx-auto">
            {{ $slot }}
        </main>
    </div>
</body>

</html>