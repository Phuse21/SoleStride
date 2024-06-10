<x-layout>
    <x-page-heading>Login</x-page-heading>
    <!-- create a form -->
    <x-forms.form method="POST" action="/login">

        <x-forms.input name="email" type="email" label="Email" />
        <x-forms.input name="password" type="password" label="Password" />

        <x-forms.button>Login</x-forms.button>

    </x-forms.form>

</x-layout>