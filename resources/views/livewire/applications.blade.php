<div class="w-full mx-auto border-b overflow-y-auto" style="max-height: 80vh">
    <div class="h-fit w-full laptop:col-span-1 col-span-2 laptop:sticky laptop:top-20 flex flex-col items-center gap-5">

        <div
            class="bg-gradient-to-t from-primary to-btn_gradient_blue/80 text-white h-fit w-full p-3 rounded-lg flex flex-col items-center border border-light_blue relative">

            <!-- LinkedIn Icon -->
            <a href="{{$this->application?->applicants?->linkedin ?? '#'}}" target="_blank"
                class="absolute top-3 right-3">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="h-10 w-10">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill="#0A66C2"
                            d="M12.225 12.225h-1.778V9.44c0-.664-.012-1.519-.925-1.519-.926 0-1.068.724-1.068 1.47v2.834H6.676V6.498h1.707v.783h.024c.348-.594.996-.95 1.684-.925 1.802 0 2.135 1.185 2.135 2.728l-.001 3.14zM4.67 5.715a1.037 1.037 0 01-1.032-1.031c0-.566.466-1.032 1.032-1.032.566 0 1.031.466 1.032 1.032 0 .566-.466 1.032-1.032 1.032zm.889 6.51h-1.78V6.498h1.78v5.727zM13.11 2H2.885A.88.88 0 002 2.866v10.268a.88.88 0 00.885.866h10.226a.882.882 0 00.889-.866V2.865a.88.88 0 00-.889-.864z">
                        </path>
                    </g>
                </svg>
            </a>

            <div class="h-32 w-32 rounded-full overflow-hidden flex items-center justify-center bg-white"
                style="font-size: 50px;">
                <img src="{{asset($application?->applicants?->profile_photo)}}" class="object-cover h-full w-full">
            </div>
            <p class="text-white text-xl font-bold font-content capitalize mt-3">
                {{$this->application?->applicants?->user?->name ?? "N/A"}}
            </p>
            <p class="text-base font-light text-white font-content">
                {{$this->application?->applicants?->user?->email ?? "N/A"}}
            </p>
        </div>


        <div
            class="bg-white p-3 text-black h-fit w-full rounded-lg flex flex-col items-center border border-light_blue">

            <div class="flex flex-col items-start justify-start border-light_blue w-full p-2">
                <p class="text-zinc-400 text-sm font-content w-full capitalize">Applying For</p>
                <p class="text-base font-medium text-black font-content capitalize">
                    {{$this->application?->job->title ?? "N/A"}}
                </p>
            </div>
            <div class="flex flex-col items-start justify-start border-t border-light_blue w-full p-2">
                <p class="text-zinc-400 text-sm font-content w-full capitalize">Education</p>
                <p class="text-base font-medium text-black font-content capitalize">
                    {{$this->application?->applicants?->education ?? "N/A"}}
                </p>
            </div>
            <div class="flex flex-col items-start justify-start border-t border-light_blue w-full p-2">
                <p class="text-zinc-400 text-sm font-content w-full capitalize">Date of Birth</p>
                <p class="text-base font-medium text-black font-content capitalize">
                    {{$this->application?->applicants?->date_of_birth ?? "N/A"}}
                </p>
            </div>
            <div class="flex flex-col items-start justify-start border-t border-light_blue w-full p-2">
                <p class="text-zinc-400 text-sm font-content w-full capitalize">Country</p>
                <p class="text-base font-medium text-black font-content capitalize">
                    {{$this->application?->applicants?->country ?? "N/A"}}
                </p>
            </div>
            <div class="flex flex-col items-start justify-start border-t border-light_blue w-full p-2">
                <p class="text-zinc-400 text-sm font-content w-full capitalize">CV</p>
                <div class="flex items-center justify-between w-full">
                    <p class="text-base font-medium text-black font-content capitalize">cv</p>
                    <a href="{{ Storage::url($application?->cv_path) }}" target="_blank"
                        class="border border-blue-500 text-blue-500 py-1 px-3 rounded-lg hover:text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        view
                    </a>
                </div>
            </div>
            <div class="flex flex-col items-start justify-start border-t border-light_blue w-full p-2">
                <x-button wire:click="addToShortlist">Add to shortlist</x-button>
            </div>
        </div>

    </div>
</div>