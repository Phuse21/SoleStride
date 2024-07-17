<div>
    <div class="pt-6">
        <x-section-heading>Pending Applications</x-section-heading>
        <div class="grid lg:grid-cols-3 gap-8 mt-4 mb-20">
            @forelse($applications->where('status', 'pending') as $job)
                <x-job-card :job="$job->job" />
            @empty
                <p>No tags</p>
            @endforelse
        </div>
    </div>

    <div class="pt-6">
        <x-section-heading>Shortlisted Applications</x-section-heading>
        <div class="grid lg:grid-cols-3 gap-8 mt-4 mb-20">
            @forelse($applications->where('status', 'shortlisted') as $job)
                <x-job-card :job="$job->job" />
            @empty
                <p>No tags</p>
            @endforelse
        </div>
    </div>
</div>