<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Accepted</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="max-w-2xl mx-auto py-10 px-6 bg-white shadow-lg rounded-lg mt-10">
        <div class="bg-green-600 text-white text-center py-4">
            <h1 class="text-2xl font-bold">SoleStride Jobs</h1>
        </div>
        <div class="p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Congratulations,
                {{ $application?->applicants?->user?->name ?? 'N/A' }}!
            </h2>
            <p class="text-gray-700 mb-4">We are excited to inform you that your application for the position of
                <strong>{{ $application?->job?->title ?? 'N/A' }}</strong> at
                <strong>{{ $application?->job?->employer?->name ?? 'N/A' }}</strong> has been accepted.
            </p>
            <p class="text-gray-700 mb-4">We were thoroughly impressed with your qualifications and experience, and we
                are pleased to offer you the opportunity to join our team.</p>
            <p class="text-gray-700 mb-4">Further details regarding your employment, including the start date,
                onboarding process, and other relevant information, will be shared with you shortly.</p>
            <p class="text-gray-700 mb-4">We look forward to having you on board and contributing to our shared success.
            </p>
            <p class="text-gray-700">{{ $application?->job?->employer?->user?->name ?? 'N/A' }},
                <strong>{{ $application?->job?->employer?->position ?? 'N/A' }}</strong>
            </p>
            <p class="text-gray-700">{{ $application?->job?->employer?->name ?? 'N/A' }}</p>
        </div>
        <div class="text-center py-4 bg-green-600 text-white">
            <p>&copy; 2024 SoleStride Jobs. All rights reserved.</p>
        </div>
    </div>
</body>

</html>