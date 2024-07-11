@props(['name', 'title'])

<div x-data="{ show: false, name: '{{ $name }}' }" x-show="show"
    x-on:open-modal.window="show = ($event.detail.name === name)" x-on:close-modal.window="show = false"
    x-on:keydown.escape.window="show = false" style="display: none;"
    class="fixed z-40 inset-0 flex items-center justify-center" x-transition.duration>

    {{-- Gray Background --}}
    <div x-on:click="show = false" class="fixed inset-0 bg-black bg-opacity-50"></div>

    {{-- Modal Body --}}
    <div class="bg-white z-50 rounded-lg m-4 md:m-6 lg:m-8 xl:m-12 p-4 w-full max-w-md md:max-w-xl overflow-y-auto"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90">

        @if (isset($title))
        <div class="px-4 py-3 flex items-center justify-between border-b border-gray-300">
            <div class="text-sm font-semibold text-gray-800">{{ $title }}</div>
            <button x-on:click="$dispatch('close-modal')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        @endif

        <div class="p-4">
            {{ $slot }}
        </div>
    </div>
</div>