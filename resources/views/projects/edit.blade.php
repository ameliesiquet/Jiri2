<x-layouts.main>
    <h1 class="font-bold text-2xl">{{__('Edit this Project')}}</h1>
    <form action="/projects/{{$project->id}}"
          method="post"
          class="flex flex-col gap-8 bg-slate-50 p-4">
        @method("PATCH")
        @csrf
        <div class="flex flex-col gap-2">
            <label for="name"
                   class="font-bold">{{__('Name')}}
                @error('name')
                <span class="font-normal block text-red-500"> {{ $message }}</span>
                @enderror
            </label>
            <input id="name"
                   type="text"
                   value="{{$project->name}}"
                   name="name"
                   placeholder="Project name"
                   autocapitalize="none"
                   autocorrect="off"
                   spellcheck="false"
                   class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">
        </div>
        @php($now = now()->format('Y-m-d H:i'))
        <div class="flex flex-col gap-2">
            <label for="description"
                   class="font-bold">{{__('description')}}
                @error('description')
                <span class="font-normal block text-red-500"> {{ $message }}</span>
                @enderror
            </label>
            <input id="description"
                   type="text"
                   value="{{$project->description}}"
                   name="description"
                   placeholder="{{ $now }}"
                   autocapitalize="none"
                   autocorrect="off"
                   spellcheck="false"
                   class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">
        </div>
        <x-form-submission-button class="bg-zinc-700">{{__('Edit this Project')}}</x-form-submission-button>
    </form>
    <a href="/projects/{{ $project->id }}" class="font-bold m-4"> ← {{ __("Go back") }}</a>
</x-layouts.main>
