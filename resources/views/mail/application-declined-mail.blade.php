<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Declined</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="max-w-2xl mx-auto py-10 px-6 bg-white shadow-lg rounded-lg mt-10">
        <div class="bg-red-600 text-white text-center py-4">
            <h1 class="text-2xl font-bold">SoleStride Jobs</h1>
        </div>
        <div class="p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Dear
                {{ $application?->applicants?->user?->name ?? 'N/A' }},
            </h2>
            <p class="text-gray-700 mb-4">Thank you for your application for the position of
                <strong>{{ $application?->job?->title ?? 'N/A' }}</strong> at
                <strong>{{ $application?->job?->employer?->name ?? 'N/A' }}</strong>.
            </p>
            <p class="text-gray-700 mb-4">After careful consideration, we regret to inform you that we have decided to
                move forward with other candidates whose qualifications more closely match our current needs.</p>
            <p class="text-gray-700 mb-4">We appreciate the time and effort you invested in your application and want to
                encourage you to apply for future openings that align with your skills and experience.</p>
            <p class="text-gray-700 mb-4">Thank you for your interest in our company, and we wish you success in your
                job search.</p>
            <p class="text-gray-700">Sincerely,</p>
            <p class="text-gray-700">{{ $application?->job?->employer?->user?->name ?? 'N/A' }},
                <strong>{{ $application?->job?->employer?->position ?? 'N/A' }}</strong>
            </p>
            <p class="text-gray-700">{{ $application?->job?->employer?->name ?? 'N/A' }}</p>
        </div>
        <div class="text-center py-4 bg-red-600 text-white">
            <p>&copy; 2024 SoleStride Jobs. All rights reserved.</p>
        </div>
    </div>
</body>

</html>