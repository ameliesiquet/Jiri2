<x-layouts.main>
    <h1 class="font-bold text-2xl">{{ __('Edit this contact') }}</h1>
    <form action="/contacts/{{$contact->id}}"
          method="post"
          class="flex flex-col gap-8 bg-slate-50 p-4">
        @method('PATCH')
        @csrf
        <div class="flex flex-col gap-2">
            <label for="name"
                   class="font-bold">{{ __('Name') }}
                @error('name')
                <span class="font-normal block text-red-500"> {{ $message }}</span>
                @enderror
            </label>
            <input id="name"
                   type="text"
                   value="{{ old('name', $contact->name) }}"
                   name="name"
                   placeholder="Contact name"
                   autocapitalize="none"
                   autocorrect="off"
                   spellcheck="false"
                   class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">
        </div>
        <div class="flex flex-col gap-2">
            <label for="email"
                   class="font-bold">{{ __('Email') }}
                @error('email')
                <span class="font-normal block text-red-500"> {{ $message }}</span>
                @enderror
            </label>
            <input id="email"
                   type="email"
                   value="{{ old('email', $contact->email) }}"
                   name="email"
                   placeholder="{{'Contact email'}}"
                   autocapitalize="none"
                   autocorrect="off"
                   spellcheck="false"
                   class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">
        </div>
        <x-form-submission-button class="bg-zinc-700">{{ __('Edit this contact') }}</x-form-submission-button>
    </form>
    <a href="/contacts/{{ $contact->id }}" class="font-bold m-4"> ← {{ __("Go back") }}</a>
</x-layouts.main>
