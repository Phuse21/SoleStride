<div>

    <div class="max-w-2xl px-10 py-4">
        <form wire:submit="updatePassword" class="max-w-2xl mx-auto space-y-6 ">

            <div class="w-full">
                <x-form.label :name="'current_password'" :label="'Current Password'" />
                <x-form.input type="password" :name="'current_password'" :id="'current_password'"
                    wire:model="current_password" autocomplete="off" />
                <x-form.error name="current_password" />
            </div>

            <div class="w-full">
                <x-form.label :name="'new_password'" :label="'New Password'" />
                <x-form.input type="password" :name="'password'" :id="'password'" wire:model="password" />
                <x-form.error name="password" />
            </div>
            <div class="w-full">
                <x-form.label :name="'password_confirmation'" :label="'Confirm Password'" />
                <x-form.input type="password" :name="'password_confirmation'" :id="'password_confirmation'"
                    wire:model="password_confirmation" />
                <x-form.error name="password_confirmation" />
            </div>

            <x-button>Save</x-button>
        </form>
    </div>
</div>