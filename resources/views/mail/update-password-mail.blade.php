<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Password Updated</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="max-w-xl mx-auto p-5 bg-white shadow-md mt-10">
        <div class="bg-blue-600 text-white text-center py-3">
            <p class="text-lg font-semibold">SoleStride Jobs</p>
        </div>
        <div class="p-6">
            <p class="text-xl font-semibold text-gray-800 mb-4">Password Updated Successfully</p>
            <p class="text-gray-700 mb-4">Hello {{ $user->name }},</p>
            <p class="text-gray-700 mb-4">This is a confirmation that the password for your account has just been
                updated.</p>
            <p class="text-gray-700 mb-4">If you did not perform this action, please contact our support team
                immediately.</p>
            <p class="text-gray-700 mb-4">Thank you for using SoleStride Jobs!</p>
        </div>
        <div class="text-center py-3 bg-blue-600 text-white text-sm">
            <p>&copy; 2024 SoleStride Jobs. All rights reserved.</p>
        </div>
    </div>
</body>

</html>