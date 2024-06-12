<!-- method="POST" action="/register" enctype="multipart/form-data" -->
<div>
    <x-forms.form>

        <x-forms.input name="name" label="Name" />
        <x-forms.input name="email" type="email" label="Email" />
        <x-forms.input name="password" type="password" label="Password" />
        <x-forms.input name="password_confirmation" type="password" label="Confirm Password" />
        <x-forms.select name="role" label="Role" wire:model="selectedRole">
            <option value="employer">Employer</option>
            <option value="applicant">Applicant</option>
        </x-forms.select>



        @if ($selectedRole == 'employer')
        <x-forms.divider />
        <x-forms.input name="employer" label="Employer Name" />
        <x-forms.input name="logo" label="Employer Logo" type="file" />
        @endif


        <x-forms.button>Create Account</x-forms.button>

    </x-forms.form>
</div>