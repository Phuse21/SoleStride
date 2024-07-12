<x-layout>
    @if (auth()->user()->role === 'employer')
    <livewire:employer-profile />
    @elseif (auth()->user()->role === 'applicant')
    <livewire:applicant-profile />
    @else
    @php
    abort(404);
    @endphp
    @endif
</x-layout>