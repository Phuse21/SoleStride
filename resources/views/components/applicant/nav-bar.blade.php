<nav x-data="{ open: false }"
    class="flex justify-between items-center border-b border-black/10 sticky top-0 bg-white z-20 pt-3">
    <div>
        <a wire:navigate href="{{ route('home') }}">
            <img class="h-12 w-12 md:h-24 md:w-24" src="https://i.ibb.co/C0484RC/2-removebg-preview.png"
                alt="Your Company">
        </a>
    </div>

    <div class="space-x-4 font-bold hidden md:flex">
        <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-nav-link>
        <x-nav-link wire:navigate href="{{ route('applications') }}" :active="request()->is('/applications')">
            Applications</x-nav-link>
    </div>

    <div class="flex-shrink-0 items-center ml-auto hidden md:flex">
        <x-nav-link wire:navigate href="{{ route('applicant.profile') }}">
            <div class="inline-flex items-center p-2 hover:bg-gray-100 focus:bg-gray-100 rounded-lg">
                <div class="hidden md:flex md:flex-col md:items-end md:leading-tight">
                    <span class="font-semibold text-sm">{{ auth()->user()->name }}</span>
                    <span class="text-xs text-gray-600">{{ auth()->user()->role }}</span>
                </div>
                <span class="h-12 w-12 ml-2 sm:ml-3 mr-2 p-1 bg-gray-100 rounded-full overflow-hidden">
                    <img src="{{ asset(auth()->user()->applicant->profile_photo) }}" alt="user profile photo"
                        class="h-full w-full object-cover rounded-full">
                </span>
            </div>
        </x-nav-link>
        <div class="flex space-x-2 font-bold items-center border-l pl-3 ml-3">
            <x-nav-link>
                <livewire:notification />
            </x-nav-link>
            <livewire:logout-user />
        </div>
    </div>
    <!-- Mobile view -->
    <div class="md:hidden flex items-center">
        <div class="flex space-x-2 font-bold items-center">
            <x-nav-link class="pt-2">
                <livewire:notification />
            </x-nav-link>
            <button @click="open = !open"
                class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                <svg x-show="!open" class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg x-show="open" class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <div x-show="open" @click.away="open = false"
            class="md:hidden fixed top-12 z-[20%] bg-white rounded-lg shadow-xl right-6" id="mobile-menu">
            <div class="px-2 pb-3 pt-2 sm:px-3 grid">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <x-nav-link wire:navigate href="{{ route('home') }}" :active="request()->routeIs('home')">Home
                </x-nav-link>
                <x-nav-link wire:navigate href="{{ route('applications') }}" :active="request()->is('/applications')">
                    Applications</x-nav-link>
            </div>
            <div class="border-t border-gray-700 pb-3 pt-4">
                <div class="flex items-center px-3">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="{{ asset(auth()->user()->applicant->profile_photo) }}"
                            alt="Profile Picture">
                    </div>
                    <div class="ml-3">
                        <div class="leading-none font-semibold text-sm">{{ auth()->user()->name }}</div>
                        <div class="text-sm font-medium leading-none text-gray-500">{{ auth()->user()->role }}</div>
                    </div>
                </div>
                <div class="mt-3 flex items-center space-y-1 px-2">
                    <livewire:logout-user />
                    <span class="text-sm font-medium leading-none text-red-500">Logout </span>
                </div>
            </div>
        </div>
    </div>


</nav>