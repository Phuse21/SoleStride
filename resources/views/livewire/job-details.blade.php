<div>
    <x-page-heading>
        {{$job->employer->name}}
        @if($hasApplied)
            <span class="text-sm text-green-600"> (Applied)</span>
        @endif
    </x-page-heading>

    <div class="flex flex-wrap md:flex-nowrap space-y-4 md:space-y-0 md:space-x-4">
        <div class="w-full md:w-2/3">
            <x-job-details-card :job="$job" :hasApplied="$hasApplied" :cvPath="$cvPath" />
        </div>

        <div class="w-full md:w-1/3 hidden md:block">
            <div>
                <img src="https://i.ibb.co/pwfFZjj/we-are-hiring-concept-collage.jpg"
                    alt="we-are-hiring-concept-collage" class="rounded-xl">
            </div>
        </div>

        @auth
            @if (!empty(auth()->user()) && auth()->user()->applicant)
                <x-modal name="apply" title="Apply for {{$job->title}} at {{$job->employer->name}}">
                    <livewire:job-apply :job="$job" :applicant_id="auth()->user()->applicant->id" />
                </x-modal>
            @endif
        @endauth
    </div>
</div>