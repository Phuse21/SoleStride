<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoleStride</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;600&display=swap">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="bg-white text-black font-hanken">
    <div class="px-8">
        <nav class="flex justify-between items-center border-b border-black/10">
            <div>
                <a href="">
                    <img class="h-24 w-24" src="https://i.ibb.co/C0484RC/2-removebg-preview.png" alt="Your Company">
                </a>
            </div>
            <div class="space-x-4 font-bold">
                <a href="">Jobs</a>
                <a href="">Careers</a>
                <a href="">Salaries</a>
                <a href="">Companies</a>
            </div>
            <div>
                <a href="">
                    Post a Job
                </a>
            </div>
        </nav>

        <main class="mt-6 max-w-[986px] mx-auto">
            {{ $slot }}
        </main>

    </div>
</body>

</html>