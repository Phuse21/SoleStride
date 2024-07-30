<div>
    <div>

        <div class="max-w-2xl px-10 py-4">
            <form wire:submit="resetPasswordLink" class="max-w-2xl mx-auto space-y-6 ">
                <div class="w-full">
                    <p>Enter your email address and we will send you a link to reset your password.</p>
                    <x-form.label :name="'Email'" :label="'Email'" />
                    <x-form.input type="email" :name="'email'" :id="'email'" wire:model="email" autocomplete="off" />
                    <x-form.error name="email" />
                </div>

                <x-button>Send Link</x-button>
            </form>
        </div>
    </div>
</div>