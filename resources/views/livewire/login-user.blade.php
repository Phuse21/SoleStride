<!-- method="POST" action="/register" enctype="multipart/form-data" -->
<div>
    <x-page-heading>Login</x-page-heading>

    <div>
        <form wire:submit="login" class="max-w-2xl mx-auto space-y-6">

            <div>
                <x-form.label :name="'email'" :label="'Email'" />
                <x-form.input type="email" :name="'email'" :id="'email'" wire:model="email" />
                <x-form.error name="email" />
            </div>

            <div>
                <x-form.label :name="'password'" :label="'Password'" />
                <x-form.input type="password" :name="'password'" :id="'password'" wire:model="password" />
                <x-form.error name="password" />
            </div>

            <p>Don't have an account? <a wire:navigate href="/register" class="text-blue-500 font-bold">Register</a></p>

            <x-button type="submit">Login</x-button>
            <div wire:loading>
                <div class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-primary motion-reduce:animate-[spin_1.5s_linear_infinite]"
                    role="status">
                    <span
                        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                </div>
            </div>
        </form>

    </div>


</div>