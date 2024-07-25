<div>
    <section>
        <x-section-heading>Recent Jobs</x-section-heading>
        <div class="my-4 space-y-6">

            @foreach ($regularJobs ?? [] as $job)
                <x-job-card-wide :$job />
            @endforeach
        </div>
        {{$regularJobs->links()}}
    </section>
</div>