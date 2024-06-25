@props(['job'])

<x-panel class="flex gap-x-4 relative">
    <div>
        <x-employer-logo :employer="$job->employer" />

    </div>


    <div class="flex-1 flex flex-col">
        <a href=""
            class="self-start text-sm text-gray-500 group-hover:font-bold group-hover:text-black group-hover:transition-color-duration-500">{{ $job->employer->name }}</a>
        <h3 class="text-xl font-bold mt-3 group-hover:text-blue-500 group-hover:transition-color-duration-500">
            {{ $job->title }}
        </h3>
        <p class="text-sm text-gray-500 mt-auto">Full Time - From {{ $job->salary }}</p>
    </div>

    <div class="space-x-2">
        @foreach ($job->tags as $tag)
            <x-tag :$tag size="sm" />
        @endforeach
    </div>
</x-panel>