<nav class="flex justify-between items-center border-b border-black/10 sticky top-0 bg-white z-10">
    <div>
        <a wire:navigate href="/">
            <img class="h-24 w-24" src="https://i.ibb.co/C0484RC/2-removebg-preview.png" alt="Your Company">
        </a>

    </div>

    <div class="space-x-4 font-bold">
        <x-nav-link wire:navigate href="/" :active="request()->is('/')">Home</x-nav-link>
    </div>

    <div class="font-bold">
        <x-nav-link wire:navigate href="/register" :active="request()->is('register')">Sign Up</x-nav-link>
        <x-nav-link wire:navigate href="/login" :active="request()->is('login')">Login</x-nav-link>
    </div>
</nav>