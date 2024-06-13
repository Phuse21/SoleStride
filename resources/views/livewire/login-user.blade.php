<!-- method="POST" action="/register" enctype="multipart/form-data" -->
<div>
    <x-page-heading>Register</x-page-heading>

    <div>
        <form wire:submit="register" class="max-w-2xl mx-auto space-y-6">

            <div>
                <x-label :name="'email'" :label="'Email'" />
                <x-input type="email" :name="'email'" :id="'email'" wire:model="email" />
                <x-error name="email" />
            </div>

            <div>
                <x-label :name="'password'" :label="'Password'" />
                <x-input type="password" :name="'password'" :id="'password'" wire:model="password" />
                <x-error name="password" />
            </div>




            <x-button type="submit">Login</x-button>
        </form>

    </div>


</div>