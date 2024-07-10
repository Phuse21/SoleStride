<div class="w-full mx-auto border-b overflow-y-auto" style="max-height: 80vh">
    <div class="h-fit w-full laptop:col-span-1 col-span-2 laptop:sticky laptop:top-20 flex flex-col items-center gap-5">

        <div
            class="bg-gradient-to-t from-primary to-btn_gradient_blue/80  text-white h-fit w-full p-3 rounded-lg flex flex-col items-center border border-light_blue">
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
                    {{$this->application?->applicants?->date_of_birth ?? "N/A"}}</p>
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