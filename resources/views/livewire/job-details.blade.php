<div>
    <x-page-heading>{{$job->employer->name}}</x-page-heading>
    <div class="flex space-x-4">

        <div class="w-2/3">
            <x-job-details-card :job="$job" />
        </div>

        @guest
            <div class="w-1/3">
                <livewire:login-user />
            </div>
        @endguest
        @auth
            <div class="w-1/3">
                <img src="https://i.ibb.co/cQWvHtK/ahsanization-UTO8esc-GF3-M-unsplash.jpg" class="rounded-xl">
            </div>
        @endauth
    </div>
</div>