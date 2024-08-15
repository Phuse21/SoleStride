<div>
    <div class="space-y-6">

        <section class="pt-6 text-center">
            <h1 class="md:text-3xl text-2xl font-bold">Let's Find Your Next Job</h1>

            <form action="" class="mt-6">
                <div class="flex justify-center w-full">
                    <livewire:search />
                </div>
            </form>
        </section>


        <livewire:featured-jobs />


        <section>
            <x-section-heading>Tags</x-section-heading>
            <div data-aos="fade-up" class="flex py-4 justify-start gap-4 overflow-x-auto mb-20">



                @if($tags->isEmpty())
                    <p class="text-center">No tags available</p>
                @else
                    @foreach ($tags as $tag)
                        <x-tag :$tag />
                    @endforeach
                @endif

            </div>
        </section>


        <livewire:regular-jobs />

    </div>
</div>