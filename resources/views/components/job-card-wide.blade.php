@props(['job'])

<x-panel class="flex flex-col md:flex-row gap-4 relative">
    <div class="flex-shrink-0">
        <x-employer-logo :employer="$job->employer" />
        <a href="{{ route('job.details', ['job' => $job->id]) }}" class="absolute inset-0"></a>
    </div>

    <div class="flex-1 flex flex-col mt-4 md:mt-0">
        <a href="{{ route('job.details', ['job' => $job->id]) }}"
            class="text-sm text-gray-500 group-hover:font-bold group-hover:text-black group-hover:transition-color-duration-500">{{ $job->employer->name }}</a>
        <h3 class="text-xl font-bold mt-3 group-hover:text-blue-500 group-hover:transition-color-duration-500">
            {{ $job->title }}
        </h3>
        <p class="text-sm text-gray-500 mt-4 md:mt-auto">Full Time - From {{ $job->salary }}</p>
    </div>

    <div class="mt-4 md:mt-0 space-x-2 flex-wrap">
        @foreach ($job->tags as $tag)
            <x-tag :tag="$tag" size="sm" />
        @endforeach
    </div>
</x-panel>