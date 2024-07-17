<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Job Updated Successfully</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="max-w-xl mx-auto p-5 bg-white shadow-md mt-10">
        <div class="bg-blue-600 text-white text-center py-3">
            <p class="text-lg font-semibold">SoleStride Jobs</p>
        </div>
        <div class="p-6">
            <p class="text-xl font-semibold text-gray-800 mb-4">Job Updated Successfully</p>
            <p class="text-gray-700 mb-4">Your job has been updated successfully. Below are the details of the job:</p>
            <div class="my-4">
                <p class="text-gray-800"><strong>Job Title:</strong> {{ $job?->title ?? 'N/A' }}</p>
                <p class="text-gray-800"><strong>City:</strong> {{ $job?->city ?? 'N/A' }}</p>
                <p class="text-gray-800"><strong>Salary:</strong> {{ $job?->salary ?? 'N/A' }}</p>
                <p class="text-gray-800"><strong>Status:</strong> {{ $job?->featured ? 'Featured' : 'Not Featured' }}
                </p>
            </div>
            <p class="text-gray-700">Thank you for using SoleStride Jobs!</p>
        </div>
        <div class="text-center py-3 bg-blue-600 text-white text-sm">
            <p>&copy; 2024 SoleStride Jobs. All rights reserved.</p>
        </div>
    </div>
</body>

</html>