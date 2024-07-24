<nav class="flex justify-between items-center border-b border-black/10 sticky top-0 bg-white z-10">
    <div>
        <a href="{{route('employer.home')}}">
            <img class="h-24 w-24" src="https://i.ibb.co/C0484RC/2-removebg-preview.png" alt="Your Company">
        </a>
    </div>
    <div class="space-x-4 font-bold ml-10">
        <x-nav-link href="{{route('employer.home')}}" :active="request()->routeIs('employer.home')">
            Home
        </x-nav-link>
        <x-nav-link wire:navigate href="{{route('employer.jobsPosted')}}"
            :active="request()->routeIs('employer.jobsPosted')">Jobs Posted
        </x-nav-link>
        <x-nav-link wire:navigate href="{{route('employer.jobsMarket')}}"
            :active="request()->routeIs('employer.jobsMarket')">Jobs Market
        </x-nav-link>
    </div>

    <div class="flex flex-shrink-0 items-center">
        <x-nav-link wire:navigate href="{{route('employer.profile')}}" :active="request()->routeIs('employer.profile')">
            <div class="inline-flex items-center p-2 hover:bg-gray-100 focus:bg-gray-100 rounded-lg">

                <div class="hidden md:flex md:flex-col md:items-end md:leading-tight">
                    <span class="font-semibold
                                        text-sm">{{auth()->user()->name}}</span>
                    <span class="text-xs text-gray-600">{{auth()->user()->role}}</span>
                </div>
                <span class="h-12 w-12 ml-2 sm:ml-3 mr-2 p-1 bg-gray-100 rounded-full overflow-hidden">
                    <img src="{{asset(auth()->user()->employer->logo)}}" alt="user profile photo"
                        class="h-full w-full object-cover rounded-full">
                </span>
            </div>
        </x-nav-link>
        <div class="flex space-x-2 font-bold items-center border-l pl-3 ml-3">
            <livewire:notification />
            <livewire:logout-user />
        </div>
    </div>


</nav>