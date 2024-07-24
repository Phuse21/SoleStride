<div x-data="{ open: false }" class="relative mt-1">
    <!-- Notifications Icon with Badge -->
    <button @click="open = !open" class="relative">
        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6"
            xmlns="http://www.w3.org/2000/svg">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                d="M15.585 15.5H5.415A1.65 1.65 0 0 1 4 13a10.526 10.526 0 0 0 1.5-5.415V6.5a4 4 0 0 1 4-4h2a4 4 0 0 1 4 4v1.085c0 1.907.518 3.78 1.5 5.415a1.65 1.65 0 0 1-1.415 2.5zm1.915-11c-.267-.934-.6-1.6-1-2s-1.066-.733-2-1m-10.912 3c.209-.934.512-1.6.912-2s1.096-.733 2.088-1M13 17c-.667 1-1.5 1.5-2.5 1.5S8.667 18 8 17" />
        </svg>
        @if($notifications->count())
        <div class="px-1 bg-blue-500 rounded-full text-center text-white text-2xs absolute -top-3 -end-2">
            {{ $notifications->count() }}
            <div class="absolute top-0 start-0 rounded-full -z-10 animate-ping bg-blue-200 w-full h-full"></div>
        </div>
        @endif
    </button>

    <!-- Notifications Dropdown -->
    <div x-show="open" @click.outside="open = false"
        class="absolute mt-7 py-2 right-[-67px] w-[300px] overflow-y-auto bg-white border border-gray-200 rounded-lg shadow-lg z-11">
        <div class="px-2 py-1 w-full flex items-center justify-between border-b border-gray-300">
            <div class="text-sm font-semibold text-gray-800">Unread Notifications</div>
            <button x-on:click="open = false">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        @forelse ($notifications as $notification)
        <div class="px-4 py-2 hover:bg-gray-100 cursor-pointer" wire:click="markAsRead('{{ $notification->id }}')">
            <div class="flex items-center justify-between">
                <div class="text-black text-sm">
                    {{ $notification->data['title'] }}
                </div>
                <div class="text-gray-600 text-2xs">{{ $notification->created_at->diffForHumans() }}</div>
            </div>
            <div class="text-gray-600 text-xs">
                {{ $notification->data['message'] }}
            </div>
        </div>
        @empty
        <div class="px-4 py-2 text-gray-500">
            No notifications
        </div>
        @endforelse

        <!-- Footer with buttons -->
        <div class="px-2 py-1 w-full flex items-center justify-between border-t border-gray-100">
            <button class="text-xs text-blue-500" wire:click="markAllAsRead">Mark all as read</button>
            <button class="text-xs text-blue-500">View
                All</button>
        </div>

    </div>
</div>