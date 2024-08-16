<div class="min-h-screen  overflow-hidden flex flex-col md:flex-row">
    <!-- Left Section -->
    <div class="w-full md:w-1/2 md:mt-14 mt-20 md:overflow-y-auto p-4 md:p-8">
        <div class="flex flex-col items-start space-y-2 mb-8">
            <h1 class="text-2xl font-bold">Welcome</h1>
            <h2 class="text-gray-600">Log into your account and get started</h2>
        </div>
        <form wire:submit.prevent="login" class="max-w-md mx-auto">
            <div class="mb-6 w-full md:w-2/3">
                <x-form.label :name="'email'" :label="'Email'" />
                <x-form.input type="email" :name="'email'" :id="'email'" wire:model="email" />
                <x-form.error name="email" />
            </div>
            <div class="mb-6 w-full md:w-2/3">
                <x-form.label :name="'password'" :label="'Password'" />
                <x-form.input type="password" :name="'password'" :id="'password'" wire:model="password" />
                <x-form.error name="password" />
            </div>
            <p class="mt-4 mb-4"><a x-data @click="$dispatch('open-modal', {name: 'forgotten-password'})"
                    class="text-blue-500 font-bold cursor-pointer">Forgot Password?</a></p>
            <button type="submit"
                class="relative inline-flex justify-center w-full md:w-2/3 text-center text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                <span class="flex-1 text-center">Login</span>
                <div wire:loading class="absolute right-3">
                    <div class="inline-block h-4 w-4 animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-primary motion-reduce:animate-[spin_1.5s_linear_infinite]"
                        role="status">
                        <span
                            class="absolute m-px h-px w-px overflow-hidden whitespace-nowrap border-0 p-0 [clip:rect(0,0,0,0)]">Loading...</span>
                    </div>
                </div>
            </button>

            <p class="mt-4">Don't have an account? <a wire:navigate href="/register"
                    class="text-blue-500 font-bold">Register</a></p>
        </form>
    </div>
    <!-- Right Section -->
    <div class="hidden md:block w-full md:w-1/2 relative h-64 md:h-screen">
        <img src="https://i.ibb.co/RyNjv7p/copy-space-blank-commercial-advertisement.jpg"
            alt="portrait-engineer-job-site-work-hours" class="absolute inset-0 w-full h-full object-cover rounded-xl">
        <div class="absolute inset-0 bg-blue-400 opacity-50 rounded-xl"></div>
        <div class="relative z-5 flex items-start justify-start h-full p-8">
            <div class="text-white">
                <h1 class="text-4xl mb-4">Discover Your Future with SoleStride Jobs</h1>
                <div class="flex space-x-12 mt-10">
                    <p class="text-black text-sm font-mono">Find the perfect job that matches your skills and passion.
                    </p>
                    <p class="text-black text-sm font-mono">Connect with top talent and grow your business with
                        SoleStride Jobs.</p>
                </div>
            </div>
        </div>
    </div>
    <x-modal name="forgotten-password" title="Forgotten Password">
        <livewire:forgotten-password />
    </x-modal>
</div>