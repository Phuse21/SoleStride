@props(['hideFooter' => false, 'unscrollable' => false])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoleStride</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;600&display=swap">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="{{$unscrollable ? 'overflow-y-hidden' : ''}} bg-white text-black font-hanken overflow-x-hidden pb-10">
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
        <footer data-aos="fade-up"
            class="{{$hideFooter ? 'hidden md:block' : ''}} flex flex-col max-w-[986px] mx-auto text-black py-5 mt-20 border-t border-gray-200">
            <div class="mb-3 mx-2 grid grid-cols-1 md:grid-cols-2">
                <div class="flex-1 mb-4 text-left">
                    <img class="h-16 w-16 md:h-24 md:w-24" src="https://i.ibb.co/C0484RC/2-removebg-preview.png"
                        alt="Your Company">
                    <p class="mb-4 font-mono">"Discover Your Future with SoleStride Jobs"</p>
                </div>


                <div class="grid grid-cols-2">
                    <div class="flex-1 md:ml-20">
                        <h6 class="md:text-base text-sm font-semibold mb-2 md:mb-4">Useful Links</h6>
                        <ul>
                            <li class="mb-2">
                                <a href="#" class="text-black text-xs md:text-sm  hover:text-gray-400">Home</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-black text-xs md:text-sm hover:text-gray-400">About us</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-black text-xs md:text-sm hover:text-gray-400">Contact us</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-black text-xs md:text-sm hover:text-gray-400">Blog</a>
                            </li>
                        </ul>
                    </div>


                    <div class="flex-1 md:ml-10">
                        <h6 class="md:text-base text-sm font-semibold mb-2 md:mb-4">Resources</h6>
                        <ul>

                            <li class="mb-2">
                                <a href="#" class="text-black text-xs md:text-sm hover:text-gray-400">Support</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-black text-xs md:text-sm hover:text-gray-400">Privacy</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-black text-xs md:text-sm hover:text-gray-400">Terms and
                                    conditions</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-black text-xs md:text-sm hover:text-gray-400">Site Map</a>
                            </li>
                        </ul>
                    </div>
                </div>



            </div>
            <div
                class="w-full mx-auto flex md:flex-row flex-col items-center space-y-2 md:justify-between bg-blue-200 py-2 px-3">
                <span class="text-gray-700 text-sm">&copy; 2024 SoleStride Jobs. All rights reserved.</span>
                <div class="flex flex-row space-x-4">
                    <a href="#"><svg viewBox="0 0 24 24" class="md:h-6 md:w-6 h-4 w-4" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20 1C21.6569 1 23 2.34315 23 4V20C23 21.6569 21.6569 23 20 23H4C2.34315 23 1 21.6569 1 20V4C1 2.34315 2.34315 1 4 1H20ZM20 3C20.5523 3 21 3.44772 21 4V20C21 20.5523 20.5523 21 20 21H15V13.9999H17.0762C17.5066 13.9999 17.8887 13.7245 18.0249 13.3161L18.4679 11.9871C18.6298 11.5014 18.2683 10.9999 17.7564 10.9999H15V8.99992C15 8.49992 15.5 7.99992 16 7.99992H18C18.5523 7.99992 19 7.5522 19 6.99992V6.31393C19 5.99091 18.7937 5.7013 18.4813 5.61887C17.1705 5.27295 16 5.27295 16 5.27295C13.5 5.27295 12 6.99992 12 8.49992V10.9999H10C9.44772 10.9999 9 11.4476 9 11.9999V12.9999C9 13.5522 9.44771 13.9999 10 13.9999H12V21H4C3.44772 21 3 20.5523 3 20V4C3 3.44772 3.44772 3 4 3H20Z"
                                    fill="#0F0F0F"></path>
                            </g>
                        </svg></a>
                    <a href="#"><svg viewBox="0 0 20 20" class="md:h-6 md:w-6 h-4 w-4" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <title>github [#142]</title>
                                <desc>Created with Sketch.</desc>
                                <defs> </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Dribbble-Light-Preview" transform="translate(-140.000000, -7559.000000)"
                                        fill="#000000">
                                        <g id="icons" transform="translate(56.000000, 160.000000)">
                                            <path
                                                d="M94,7399 C99.523,7399 104,7403.59 104,7409.253 C104,7413.782 101.138,7417.624 97.167,7418.981 C96.66,7419.082 96.48,7418.762 96.48,7418.489 C96.48,7418.151 96.492,7417.047 96.492,7415.675 C96.492,7414.719 96.172,7414.095 95.813,7413.777 C98.04,7413.523 100.38,7412.656 100.38,7408.718 C100.38,7407.598 99.992,7406.684 99.35,7405.966 C99.454,7405.707 99.797,7404.664 99.252,7403.252 C99.252,7403.252 98.414,7402.977 96.505,7404.303 C95.706,7404.076 94.85,7403.962 94,7403.958 C93.15,7403.962 92.295,7404.076 91.497,7404.303 C89.586,7402.977 88.746,7403.252 88.746,7403.252 C88.203,7404.664 88.546,7405.707 88.649,7405.966 C88.01,7406.684 87.619,7407.598 87.619,7408.718 C87.619,7412.646 89.954,7413.526 92.175,7413.785 C91.889,7414.041 91.63,7414.493 91.54,7415.156 C90.97,7415.418 89.522,7415.871 88.63,7414.304 C88.63,7414.304 88.101,7413.319 87.097,7413.247 C87.097,7413.247 86.122,7413.234 87.029,7413.87 C87.029,7413.87 87.684,7414.185 88.139,7415.37 C88.139,7415.37 88.726,7417.2 91.508,7416.58 C91.513,7417.437 91.522,7418.245 91.522,7418.489 C91.522,7418.76 91.338,7419.077 90.839,7418.982 C86.865,7417.627 84,7413.783 84,7409.253 C84,7403.59 88.478,7399 94,7399"
                                                id="github-[#142]"> </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg></a>
                    <a href="#" class="text-black hover:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="md:h-6 md:w-6 h-4 w-4"
                            viewBox="0 0 50 50">
                            <path
                                d="M 6.9199219 6 L 21.136719 26.726562 L 6.2285156 44 L 9.40625 44 L 22.544922 28.777344 L 32.986328 44 L 43 44 L 28.123047 22.3125 L 42.203125 6 L 39.027344 6 L 26.716797 20.261719 L 16.933594 6 L 6.9199219 6 z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </footer>

    </div>



</body>

</html>