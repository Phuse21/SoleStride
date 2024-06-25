<div class="flex space-x-2">
    <div class="flex-1">
        <x-page-heading>{{$job->title}}</x-page-heading>
        <x-job-details-card :job="$job" />
    </div>

    <div class="flex-1">
        <img src="https://i.ibb.co/cQWvHtK/ahsanization-UTO8esc-GF3-M-unsplash.jpg" class="rounded-xl">
    </div>
</div>