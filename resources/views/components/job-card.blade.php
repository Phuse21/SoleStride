@props(['job'])

<x-panel class="flex flex-col text-center relative">
    <div class="self-start text-sm group-hover:font-bold ">{{$job?->employer?->name ?? "N/A"}}

        <a href="{{ route('job.details', ['job' => $job->id]) }}" class="absolute inset-0"></a>
    </div>

    <div class="py-4">
        <div class="group-hover:text-blue-500 font-bold text-xl group-hover:transition-color-duration-500">
            {{$job->title}}
        </div>
        <p class="text-sm mt-4">{{$job?->schedule ?? "N/A"}} -
            From {{ '$' . number_format($job?->salary, 2 ?? "N/A") }}</p>
    </div>

    <div class="flex justify-between items-center mt-auto">

        <div class="space-x-1">
            @if (!empty($job->tags) && !$job->tags->isEmpty())
                @foreach ($job->tags->take(2) as $tag)
                    <x-tag :tag="$tag" size="sm" />
                @endforeach
            @else
                <p>No Tags</p>
            @endif
        </div>

        <x-employer-logo :employer="$job->employer" :width="50" :height="42" />
    </div>

</x-panel>