<div>
    <section>
        <x-section-heading>Recent Jobs</x-section-heading>
        <div class="my-4 space-y-6">
            @foreach ($regularJobs ?? [] as $job)
                <!-- Job Card for Mobile View -->
                <div class="block md:hidden">
                    <x-job-card :job="$job" />
                </div>
                <!-- Job Card Wide for Larger Screens -->
                <div class="hidden md:block">
                    <x-job-card-wide :job="$job" />
                </div>
            @endforeach
        </div>
        {{$regularJobs->links()}}
    </section>
</div>