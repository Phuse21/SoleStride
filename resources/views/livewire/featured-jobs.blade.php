<div>
    <section class="pt-6 mb-20">
        <x-section-heading>Featured Jobs</x-section-heading>
        <div class="grid lg:grid-cols-3 gap-8 my-4">
            @foreach ($featuredJobs ?? [] as $job)
            <x-job-card :job="$job" />
            @endforeach
        </div>
        {{$featuredJobs->links()}}
    </section>
</div>