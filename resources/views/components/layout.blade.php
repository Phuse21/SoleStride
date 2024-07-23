<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoleStride</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;600&display=swap">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="bg-white text-black font-hanken overflow-x-hidden pb-20">
    <div class="px-8">
        @if (auth()->guest())
        <x-nav-bar />
        @elseif (auth()->user()->role === 'employer')
        <x-employer.nav-bar />
        @elseif (auth()->user()->role === 'applicant')
        <x-applicant.nav-bar />
        @endif
        <main class="mt-6 max-w-[986px] mx-auto relative">
            {{ $slot }}
        </main>
    </div>
</body>

</html>