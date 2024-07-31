<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="max-w-2xl mx-auto py-10 px-6 bg-white shadow-lg rounded-lg mt-10">
        <div class="bg-blue-600 text-white text-center py-4">
            <h1 class="text-2xl font-bold">SoleStride Jobs</h1>
        </div>
        <div class="p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Hello!</h2>
            <p class="text-gray-700 mb-4">You are receiving this email because we received a password reset request for
                your account.</p>
            <div class="text-center my-6">
                <a href="{{ $url }}" class="bg-blue-600 text-white px-6 py-3 rounded-full text-lg font-bold"
                    style="text-decoration: none;">Reset Password</a>
            </div>
            <p class="text-gray-700 mb-4">This password reset link will expire in 60 minutes.</p>
            <p class="text-gray-700 mb-4">If you did not request a password reset, no further action is required.</p>
            <p class="text-gray-700 mb-4">Regards,<br>SoleStride Jobs.</p>
            <div class="border-t border-gray-200 mt-6 pt-6 text-gray-600 text-sm">
                <p>If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your
                    web browser:</p>
                <p><a href="{{ $url }}" class="text-blue-600 break-all">{{ $url }}</a></p>
            </div>
        </div>
        <div class="text-center py-4 bg-blue-600 text-white">
            <p>&copy; 2024 SoleStride Jobs. All rights reserved.</p>
        </div>
    </div>
</body>

</html>