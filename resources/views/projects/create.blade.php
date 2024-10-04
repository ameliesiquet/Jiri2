<x-layouts.main>
    <h1 class="font-bold text-2xl">{{__('Create a new project')}}</h1>
    <form action="/projects"
          method="post"
          class="flex flex-col gap-8 bg-slate-50 p-4">
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
                   value="{{old('name')}}"
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
                   value="{{old('description')}}"
                   name="description"
                   placeholder="Description"
                   autocapitalize="none"
                   autocorrect="off"
                   spellcheck="false"
                   class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">
        </div>
        <x-form-submission-button class="bg-zinc-700">{{__('Create this Project')}}</x-form-submission-button>
    </form>
    <a href="/projects" class="font-bold m-4"> ← {{ __("Go back") }}</a>
</x-layouts.main>
