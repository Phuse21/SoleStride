<div>
    {{-- The whole world belongs to you. --}}
    <x-page-heading>{{$tag->name}}</x-page-heading>

    <div class="space-y-6">
        @foreach ($jobs as $job)

        <x-job-card-wide :$job />

        @endforeach
    </div>
</div>