<div>
    <div class="pt-6">
        <div class="items-center inline-flex gap-2">
            <span class="w-2 h-2 bg-gray-500 inline-block"></span>
            <h3 class="text-lg font-bold">Pending Applications</h3>
        </div>
        <div class="grid lg:grid-cols-3 gap-8 mt-4 mb-20">
            @forelse($applications->where('status', 'pending') as $job)
            @if($job->job)
            <x-job-card :job="$job->job" />
            @else
            {{$job}}
            @endif
            @empty
            <p>No Pending Applications</p>
            @endforelse
        </div>
    </div>

    <div class="pt-6">
        <div class="items-center inline-flex gap-2">
            <span class="w-2 h-2 bg-green-400 inline-block"></span>
            <h3 class="text-lg font-bold">Shortlisted Applications</h3>
        </div>
        <div class="grid lg:grid-cols-3 gap-8 mt-4 mb-20">
            @forelse($applications->where('status', 'shortlisted') ?? [] as $job)
            <x-job-card :job="$job->job" />
            @empty
            <p>No Shortlisted Applications</p>
            @endforelse
        </div>
    </div>
</div>