<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Received</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="max-w-2xl mx-auto py-10 px-6 bg-white shadow-lg rounded-lg mt-10">
        <div class="bg-blue-600 text-white text-center py-4">
            <P class="text-2xl font-bold">SoleStride Jobs</P>
        </div>
        <div class="p-6">
            <P class="text-2xl font-semibold text-gray-800 mb-4">Thank You for Your Application,
                {{ $application?->applicants?->user?->name ?? 'N/A' }}!
            </P>
            <p class="text-gray-700 mb-4">We have received your application for the position of
                <strong>{{ $application?->job?->title ?? 'N/A' }}</strong> at
                <strong>{{ $application?->job?->employer?->name ?? 'N/A' }}</strong>.
            </p>
            <p class="text-gray-700 mb-4">Our team is currently reviewing your application and we will get back to you
                shortly with the next steps.</p>
            <p class="text-gray-700 mb-4">We appreciate your interest in joining our team. If you have any questions in
                the meantime, please feel free to contact us at
                {{ $application?->job?->employer?->user?->email ?? 'N/A' }}.
            </p>
            <p class="text-gray-700">Best regards,</p>

            <p class="text-gray-700">{{ $application?->job?->employer?->user?->name ?? 'N/A' }},
                <strong> {{$application?->job?->employer?->position ?? 'N/A'}}</strong>
            </p>
            <p class="text-gray-700">{{ $application?->job?->employer?->name ?? 'N/A' }}</p>
        </div>
        <div class="text-center py-4 bg-blue-600 text-white">
            <p>&copy; 2024 SoleStride Jobs. All rights reserved.</p>
        </div>
    </div>
</body>

</html>