<!-- method="POST" action="/register" enctype="multipart/form-data" -->
<div>
    <x-page-heading>Register</x-page-heading>

    <div>
        <form wire:submit="register" class="max-w-2xl mx-auto space-y-6">
            <x-label :name="'name'" :label="'Name'" />
            <x-input type="text" :name="'name'" :id="'name'" wire:model="name" />
            <x-label :name="'email'" :label="'Email'" />
            <x-input type="email" :name="'email'" :id="'email'" wire:model="email" />
            <x-label :name="'password'" :label="'Password'" />
            <x-input type="password" :name="'password'" :id="'password'" wire:model="password" />
            <x-label :name="'password_confirmation'" :label="'Confirm Password'" />
            <x-input type="password" :name="'password_confirmation'" :id="'password_confirmation'"
                wire:model="password_confirmation" />
            <x-label :name="'role'" :label="'Role'" />
            <x-radio :name="'role'" :id="'role'" wire:model="role" />

            @if ($role == 'employer')
            <x-divider />

            <x-label :name="'employer'" :label="'Company Name'" />
            <x-input type="text" :name="'employer'" :id="'employer'" wire:model="employer" />

            <x-label :name="'logo'" :label="'Company Logo'" />
            <x-input type="file" :name="'logo'" :id="'logo'" wire:model="logo" />
            @endif

            <x-button type="submit">Create Account</x-button>
        </form>

    </div>


</div>