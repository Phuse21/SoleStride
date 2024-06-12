<form {{ $attributes(["class" => "max-w-2xl mx-auto space-y-6", "method" => "GET"]) }}>
    <div>
        @if ($label)
            <x-forms.label :$name :$label />
        @endif

        <div class="mt-1">
            <input type="text" id="{{$name}}" class="rounded-xl bg-black/10 border border-black/20 px-5 py-4 w-full focus:outline-none focus:ring-2
focus:ring-blue-500 focus:border-transparent">
            <x-forms.error :name="$name" />

            <x-forms.error :error="$errors->first($name)" />
        </div>
    </div>
</form>