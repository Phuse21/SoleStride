<div>
    <div class="space-y-6">

        <section class="pt-6 text-center">
            <h1 class="text-3xl font-bold">Let's Find Your Next Job</h1>

            <form action="" class="mt-6">
                <div class="flex justify-center w-full">
                    <input type="text" name="search" id="search" placeholder="Web Developer.." class="rounded-xl bg-black/10 border border-black/20 px-5 py-4 w-[50%] focus:outline-none focus:ring-2
        focus:ring-blue-500 focus:border-transparent">
                </div>
            </form>
        </section>

        <section class="pt-6">
            <x-section-heading>Featured Jobs</x-section-heading>
            <div class="grid lg:grid-cols-3 gap-8 mt-4 mb-20">
                @if($featuredJobs->isEmpty())
                <p class="text-center">No featured jobs available</p>
                @else
                @foreach ($featuredJobs as $job)
                <x-job-card :job="$job" />
                @endforeach
                @endif
            </div>
        </section>


        <section>
            <x-section-heading>Tags</x-section-heading>
            <div class="mt-4 space-x-2 flex flex-wrap mb-20">



                <!-- when parameter name and the variable name are the same -->

                @if($tags->isEmpty())
                <p class="text-center">No tags available</p>
                @else
                @foreach ($tags as $tag)
                <x-tag :$tag />
                @endforeach
                @endif

            </div>
        </section>

        <section>
            <x-section-heading>Recent Jobs</x-section-heading>
            <div class="mt-4 space-y-6">
                @if($regularJobs->isEmpty())
                <p class="text-center">No jobs available</p>
                @else
                @foreach ($regularJobs as $job)
                <x-job-card-wide :$job />
                @endforeach
                @endif
            </div>
        </section>
    </div>
</div>