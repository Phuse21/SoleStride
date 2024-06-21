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
        </form>

    </div>


</div>