@props(['job'])

<x-panel class="flex flex-col text-center">
    <div class="self-start text-sm group-hover:font-bold ">{{$job->employer->name}}</div>

    <div class="py-4">
        <div class="group-hover:text-blue-500 font-bold text-xl group-hover:transition-color-duration-500">
            {{$job->title}}
        </div>
        <p class="text-sm mt-4">Full Time - From {{$job->salary}}</p>
    </div>

    <div class="flex justify-between items-center mt-auto">
        <div class="space-x-2">
            @foreach ($job->tags as $tag)
            <x-tag :tag="$tag" size="sm" />
            @endforeach
        </div>

        <x-employer-logo :employer="$job->employer" :width="42" :height="42" />
    </div>
</x-panel>