<div class="grid md:grid-cols-2 gap-5 py-4">

    <div class="w-full mx-auto border-b overflow-y-auto h-full">
        <div class="h-fit w-full flex flex-col items-center gap-5">
            <div
                class="bg-gradient-to-t from-primary to-btn_gradient_blue/80 text-white h-fit w-full p-3 rounded-lg flex flex-col items-center border relative">
                <div class="h-32 w-32 rounded-full overflow-hidden flex items-center justify-center bg-white"
                    style="font-size: 50px;">
                    <img src="{{ asset($applicant->profile_photo) }}" class="object-cover h-full w-full">
                </div>
                <p class="text-white text-xl font-bold font-content capitalize mt-3">{{ $applicant->user->name }}</p>
                <p class="text-base font-light text-white font-content">{{ $applicant->user->email }}</p>
            </div>

            <div
                class="bg-white p-3 text-black h-fit w-full rounded-lg flex flex-col items-center border border-light_blue">
                <div class="flex flex-col items-start justify-start border-light_blue w-full p-2">
                    <p class="text-zinc-400 text-sm font-content w-full capitalize">Applied Jobs</p>
                    <p class="text-base font-medium text-black font-content capitalize">{{ $applications->count() }}</p>
                </div>
                <div class="flex flex-col items-start justify-start border-t border-light_blue w-full p-2">
                    <p class="text-zinc-400 text-sm font-content w-full capitalize">Shortlisted</p>
                    <p class="text-base font-medium text-black font-content capitalize">
                        {{ $applications->where('status', 'shortlisted')->count() }}
                    </p>
                </div>
                <div class="flex flex-col items-start justify-start border-t border-light_blue w-full p-2">
                    <p class="text-zinc-400 text-sm font-content w-full capitalize">Accepted</p>
                    <p class="text-base font-medium text-black font-content capitalize">
                        {{ $applications->where('status', 'accepted')->count() }}
                    </p>
                </div>
                <div class="flex flex-col items-start justify-start border-t border-light_blue w-full p-2">
                    <p class="text-zinc-400 text-sm font-content w-full capitalize">Declined</p>
                    <p class="text-base font-medium text-black font-content capitalize">
                        {{ $applications->where('status', 'declined')->count() }}
                    </p>
                </div>
                <div class="flex flex-col items-start justify-start border-t border-light_blue w-full p-2">
                    <p class="text-zinc-400 text-sm font-content w-full capitalize">Date of Birth</p>
                    <p class="text-base font-medium text-black font-content capitalize">
                        {{ Carbon\Carbon::parse($applicant->date_of_birth)->format('F j, Y') }}
                    </p>
                    </p>
                </div>
                <div class="flex flex-col items-start justify-start border-t border-light_blue w-full p-2">
                    <p class="text-zinc-400 text-sm font-content w-full capitalize">Country</p>
                    <p class="text-base font-medium text-black font-content capitalize">{{ $applicant->country }}</p>
                </div>
                <div class="flex flex-col items-start justify-start border-t border-light_blue w-full p-2">
                    <p class="text-zinc-400 text-sm font-content w-full capitalize">Socials</p>
                    <div class="flex items-center justify-between w-full">
                        Linkedin
                        <a href="{{ $applicant?->linkedin ?? '#' }}" target="_blank" class="flex flex-row items-center">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none"
                                class="h-12 w-12">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill="#0A66C2"
                                        d="M12.225 12.225h-1.778V9.44c0-.664-.012-1.519-.925-1.519-.926 0-1.068.724-1.068 1.47v2.834H6.676V6.498h1.707v.783h.024c.348-.594.996-.95 1.684-.925 1.802 0 2.135 1.185 2.135 2.728l-.001 3.14zM4.67 5.715a1.037 1.037 0 01-1.032-1.031c0-.566.466-1.032 1.032-1.032.566 0 1.031.466 1.032 1.032 0 .566-.466 1.032-1.032 1.032zm.889 6.51h-1.78V6.498h1.78v5.727zM13.11 2H2.885A.88.88 0 002 2.866v10.268a.88.88 0 00.885.866h10.226a.882.882 0 00.889-.866V2.865a.88.88 0 00-.889-.864z">
                                    </path>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="flex flex-col items-start justify-start w-full h-full col-span-2 gap-3">
            <div class="w-full h-fit p-5 bg-white border rounded-lg border-light_blue">
                <div
                    class="flex items-center justify-between pb-3 mb-5 text-lg font-medium capitalize border-b-2 text-primary border-black/20">
                    <span>Basic Information</span>
                </div>
                <form class="max-w-2xl mx-auto space-y-6">
                    <div class="flex text-sm items-center capitalize text-black">
                        <label class="w-1/3" title="Nationality">Nationality</label>
                        <div class="w-2/3 p-2 text-base text-left border rounded-lg h-fit border-gray2/50 break-words">
                            {{ $applicant->country }}
                        </div>
                    </div>
                    <div class="flex text-sm items-center capitalize text-black">
                        <label class="w-1/3" title="Street address">Street address</label>
                        <div class="w-2/3 p-2 text-base text-left border rounded-lg h-fit border-gray2/50 break-words">
                            {{ $applicant->street_address }}
                        </div>
                    </div>
                    <div class="flex text-sm items-center capitalize text-black">
                        <label class="w-1/3" title="State">State/province</label>
                        <div class="w-2/3 p-2 text-base text-left border rounded-lg h-fit border-gray2/50 break-words">
                            {{ $applicant->state }}
                        </div>
                    </div>

                    <div class="flex text-sm items-center capitalize text-black">
                        <label class="w-1/3" title="City">City</label>
                        <div class="w-2/3 p-2 text-base text-left border rounded-lg h-fit border-gray2/50 break-words">
                            {{ $applicant->city }}
                        </div>
                    </div>
                    <div class="flex text-sm items-center capitalize text-black">
                        <label class="w-1/3" title="Phone">Phone Number</label>
                        <div class="w-2/3 p-2 text-base text-left border rounded-lg h-fit border-gray2/50 break-words">
                            {{ $applicant->phone }}
                        </div>
                    </div>
                    <div class="flex text-sm items-center capitalize text-black">
                        <label class="w-1/3" title="Education">Education</label>
                        <div class="w-2/3 p-2 text-base text-left border rounded-lg h-fit border-gray2/50 break-words">
                            {{ $applicant->education }}
                        </div>
                    </div>
                </form>
            </div>
            <div class="flex items-center justify-between space-x-[210px]">
                <x-button x-data @click="$dispatch('open-modal', {name: 'edit-applicant-profile'})">Edit Profile
                </x-button>
                <button
                    class="relative inline-flex items-center hover:bg-yellow-400 text-yellow-400 hover:text-white border border-yellow-400 font-bold py-2 px-4 rounded-md"
                    x-data @click="$dispatch('open-modal', {name: 'update-password'})">
                    Update Password</button>
            </div>
        </div>
    </div>
    <x-modal name="edit-applicant-profile" title="Edit Profile">
        <livewire:edit-applicant :applicant="$applicant" />
    </x-modal>

    <x-modal name="update-password" title="Update Password">
        <livewire:update-password />
    </x-modal>
</div>
