<x-layout>

    <div class="space-y-6">

        <section class="pt-6 text-center">
            <h1 class="text-3xl font-bold">Let's Find Your Next Job</h1>

            <x-forms.form action="/search" class="mt-6">
                <x-forms.input :label="false" type="text" name="q" placeholder="Backend Developer..." />
            </x-forms.form>
        </section>


        <section class="pt-6">
            <x-section-heading>Featured Jobs</x-section-heading>

            <div class="grid lg:grid-cols-3 gap-8 mt-4 ">

                @foreach ($featuredJobs as $job)
                <x-job-card :job="$job" />

                @endforeach
            </div>
        </section>
        <section>
            <x-section-heading>Tags</x-section-heading>
            <div class="mt-4 space-x-2">

                <!-- @foreach ($tags as $tag)
                <x-tag>{{ $tag->name }}</x-tag>
                @endforeach -->

                <!-- @foreach ($tags as $tag)
                <x-tag :tag="$tag" />
                @endforeach -->

                <!-- when parameter name and the variable name are the same -->

                @foreach ($tags as $tag)
                <x-tag :$tag />
                @endforeach

            </div>
        </section>
        <section>
            <x-section-heading>Recent Jobs</x-section-heading>
            <div class="mt-4 space-y-6">
                @foreach ($jobs as $job)

                <x-job-card-wide :$job />

                @endforeach
            </div>
        </section>

    </div>
</x-layout>