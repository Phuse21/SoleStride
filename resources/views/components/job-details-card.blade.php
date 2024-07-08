@props(['job'])

<x-panel class="flex flex-col gap-y-4">
    <div class="flex flex-wrap md:flex-nowrap gap-4">
        <div class="flex-shrink-0">
            <x-employer-logo :employer="$job->employer" />
        </div>

        <div class="flex-1 flex flex-col">
            <a href=""
                class="text-sm text-gray-500 group-hover:font-bold group-hover:text-black group-hover:transition-color duration-500">{{ $job->employer->name }}</a>
            <h3 class="text-xl font-bold mt-3 group-hover:text-blue-500 group-hover:transition-color duration-500">
                {{ $job->title }}
            </h3>
            <p class="text-sm text-gray-500 mt-auto">Full Time - From {{ $job->salary }}</p>
        </div>

        <div class="space-x-2 flex-shrink-0">
            @foreach ($job->tags as $tag)
                <x-tag :$tag size="sm" />
            @endforeach
        </div>
    </div>

    <div class="mt-8 w-full border-t-2 py-2">
        <div class="mt-2 flex flex-wrap justify-between">
            <div>
                <h6 class="text-sm"><strong>Location</strong>: {{$job->location}}</h6>
                <h5 class="text-sm font-bold ml-10 pl-5">{{$job->city}}</h5>
            </div>
            <div class="flex flex-col items-end">
                <span
                    class="text-sm  mb-2 py-2 px-2 bg-black/10 rounded-xl font-semibold hover:bg-black/30 transition-colors duration-300">{{$job->mode}}</span>
                <span
                    class="text-sm py-2 px-2 bg-black/10 rounded-xl font-semibold hover:bg-black/30 transition-colors duration-300">{{($job->created_at)->diffForHumans()}}</span>
            </div>
        </div>
    </div>

    <div class="mt-4 w-full border-t-2">
        <h6 class="font-bold mt-2">Job Summary</h6>
        <p class="mt-2 mb-2">{{ $job?->job_details?->summary }}</p>
        <ul class="list-disc pl-4">
            <li>
                <p><strong>Minimum Qualification</strong>: {{$job?->job_details?->minimum_qualifications}}</p>
            </li>
            <li>
                <p><strong>Experience Level</strong>: {{$job?->job_details?->experience_level}}</p>
            </li>
            <li>
                <p><strong>Experience Length</strong>: {{$job?->job_details?->experience_years}}</p>
            </li>
        </ul>
    </div>

    <div class="mt-8 w-full border-t-2">
        <h6 class="font-bold mt-2">Responsibilities</h6>
        <ul class="mt-2 mb-2 list-disc pl-4">
            @foreach (json_decode($job?->job_details?->responsibilities) ?? [] as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>

    <div class="mt-8 w-full border-t-2">
        <h6 class="font-bold mt-2">Required Skills</h6>
        <ul class="mt-2 mb-2 list-disc pl-4">
            @foreach (json_decode($job?->job_details?->skills) ?? [] as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>

    <div class="mt-8 w-full border-t-2">
        <div class="flex justify-end mt-2">
            @auth
                <x-button type="button" x-data @click="$dispatch('open-modal', {name: 'contactUs'})">Apply</x-button>
            @endauth

            @guest
                <p><a wire:navigate href="{{ route('login', ['redirect' => url()->current()]) }}"
                        class="text-blue-500">Login</a> to Apply</p>
            @endguest
        </div>
    </div>
</x-panel>