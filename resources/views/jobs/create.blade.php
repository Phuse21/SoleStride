<x-layout>
    <x-page-heading>Create New Job</x-page-heading>
    <x-forms.form method="POST" action="/jobs">
        <x-forms.input name="title" label="Title" placeholder="Fraud Analyst" />
        <x-forms.input name="salary" label="Salary" placeholder="$10,000" />
        <x-forms.input name="location" label="Location" placeholder="Florida" />

        <x-forms.select name="schedule" label="Schedule">
            <option value="full-time">Full Time</option>
            <option value="part-time">Part Time</option>
            <option value="remote">Remote</option>
        </x-forms.select>

        <x-forms.input name="url" label="URL" placeholder="https://example.com" />
        <x-forms.checkbox name="featured" label="Feature (Costs extra)" />

        <x-forms.divider />

        <x-forms.input name="tags" label="Tags" placeholder="Frontend, Backend, Fullstack," />

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>