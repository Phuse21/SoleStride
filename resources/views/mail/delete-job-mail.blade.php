<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Deleted</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="max-w-2xl mx-auto py-10 px-6 bg-white shadow-lg rounded-lg mt-10">
        <div class="bg-red-600 text-white text-center py-4">
            <h1 class="text-2xl font-bold">SoleStride Jobs</h1>
        </div>
        <div class="p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Job Deleted</h2>
            <p class="text-gray-700 mb-4">You have successfully deleted this job listing from SoleStride Jobs.</p>
            <div class="my-4">
                <p class="text-gray-800"><strong>Job Title:</strong> {{ $job->title }}</p>
            </div>
            <p class="text-gray-700 mb-4">Thank you for using SoleStride Jobs. If you have any questions or need further
                assistance, feel free to contact us.</p>
            <p class="text-gray-700">Best regards,</p>
            <p class="text-gray-700">The SoleStride Jobs Team</p>
        </div>
        <div class="text-center py-4 bg-red-600 text-white">
            <p>&copy; 2024 SoleStride Jobs. All rights reserved.</p>
        </div>
    </div>
</body>

</html>