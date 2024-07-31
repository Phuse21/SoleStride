<div>
    <div>
        <x-page-heading>Reset Password</x-page-heading>
        <div class="max-w-2xl px-10 py-4">
            <form wire:submit="resetPassword" class="max-w-2xl mx-auto space-y-6 ">


                <input type="text" class="hidden" name="token" value="{{ $token }}">

                <div class="w-full">
                    <x-form.label :name="'email'" :label="'Email'" />
                    <x-form.input type="email" :name="'email'" :id="'email'" wire:model="email" readonly disabled />
                </div>
                <div class="w-full">
                    <x-form.label :name="'password'" :label="'New Password'" />
                    <x-form.input type="password" :name="'password'" :id="'password'" wire:model="password"
                        autocomplete="off" />
                    <x-form.error name="password" />
                </div>
                <div class="w-full">
                    <x-form.label :name="'password_confirmation'" :label="'Confirm Password'" />
                    <x-form.input type="password" :name="'password_confirmation'" :id="'password_confirmation'"
                        wire:model="password_confirmation" />
                    <x-form.error name="password confirmation" />
                </div>

                <x-button>Reset Password</x-button>
            </form>
        </div>
    </div>
</div>