<div class="flex flex-col h-full">
    <!-- Scrollable Notifications List -->
    <div class="flex-1 overflow-y-auto max-h-[450px] p-4">
        @forelse ($notifications as $notification)
            <div class="px-2 border-b border-gray-100 py-1 {{ $notification->read_at ? 'bg-white' : 'bg-gray-100' }}">
                <div class="flex items-center justify-between">
                    <div class="text-black text-sm">
                        {{ $notification?->data['title'] ?? 'N/A' }}
                    </div>
                    <div class="text-gray-600 text-2xs">{{ $notification?->created_at?->diffForHumans() ?? 'N/A' }}</div>
                </div>
                <div class="flex items-center justify-between mt-1">
                    <div class="text-gray-600 text-xs">
                        {{ $notification?->data['message'] ?? 'N/A' }}
                    </div>
                    <div class="ml-2">
                        <button wire:click="deleteNotification('{{ $notification->id }}')" class="focus:outline-none">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4">
                                <path d="M10 11V17" stroke="#f42525" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M14 11V17" stroke="#f42525" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M4 7H20" stroke="#f42525" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z"
                                    stroke="#f42525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#f42525"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mt-1 text-xs text-gray-500">
                    <em>{{ $notification->read_at ? 'Read' : 'Unread' }}</em>
                </div>
            </div>
        @empty
            <div class="px-4 py-2 text-gray-500">
                No notifications
            </div>
        @endforelse
    </div>

    <!-- Fixed Footer -->
    <div class="px-4 py-3 border-t border-gray-300 bg-white">
        <button class="text-xs text-red-500" wire:click="deleteAll">Delete All</button>
    </div>
</div>