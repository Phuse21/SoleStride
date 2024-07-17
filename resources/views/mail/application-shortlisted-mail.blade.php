<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Shortlisted</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="max-w-2xl mx-auto py-10 px-6 bg-white shadow-lg rounded-lg mt-10">
        <div class="bg-blue-600 text-white text-center py-4">
            <h1 class="text-2xl font-bold">SoleStride Jobs</h1>
        </div>
        <div class="p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Congratulations,
                {{ $application?->applicants?->user?->name ?? 'N/A' }}!
            </h2>
            <p class="text-gray-700 mb-4">We are pleased to inform you that your application for the position of
                <strong>{{ $application?->job?->title ?? 'N/A' }}</strong> at
                <strong>{{ $application?->job?->employer?->name ?? 'N/A' }}</strong> has
                been shortlisted.
            </p>
            <p class="text-gray-700 mb-4">Our team was impressed with your qualifications and experience. We will be in
                touch with you soon to discuss the next steps in the recruitment process.</p>
            <p class="text-gray-700 mb-4">Thank you for your interest in joining our team. We look forward to speaking
                with you soon.</p>
            <p class="text-gray-700">Best regards,</p>
            <p class="text-gray-700">The SoleStride Jobs Team</p>
        </div>
        <div class="text-center py-4 bg-blue-600 text-white">
            <p>&copy; 2024 SoleStride Jobs. All rights reserved.</p>
        </div>
    </div>
</body>

</html>