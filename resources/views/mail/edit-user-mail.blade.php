<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>User Updated Successfully</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="max-w-xl mx-auto p-5 bg-white shadow-md mt-10">
        <div class="bg-blue-600 text-white text-center py-3">
            <p class="text-lg font-semibold">SoleStride Jobs</p>
        </div>
        <div class="p-6">
            <p class="text-xl font-semibold text-gray-800 mb-4">User Details Updated, {{ $user?->name ?? 'N/A' }}!</p>
            <p class="text-gray-700 mb-4">Here are some details about your account:</p>
            <div class="my-4">
                <p class="text-gray-800"><strong>Name:</strong> {{ $user?->name ?? 'N/A' }}</p>
                <p class="text-gray-800"><strong>Email:</strong> {{ $user?->email ?? 'N/A' }}</p>
                <p class="text-gray-800 capitalize"><strong>Account Type:</strong> {{ $user?->role ?? 'N/A' }}</p>
                @if ($user->role == 'employer')
                    <p class="text-gray-800"><strong>Company Name:</strong> {{ $user?->employer?->name ?? 'N/A' }}</p>
                @endif
            </div>
            <p class="text-gray-700">If you have any questions or need assistance, feel free to contact our support
                n team.</p>
            <p class="text-gray-700">Thank you for choosing SoleStride Jobs!</p>
        </div>
        <div class="text-center py-3 bg-blue-600 text-white text-sm">
            <p>&copy; 2024 SoleStride Jobs. All rights reserved.</p>
        </div>
    </div>
</body>

</html>