<x-layouts.main>
    <h1 class="font-bold text-2xl">{{__('Create a new contact')}}</h1>
    <form action="/contacts"
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
                   placeholder="{{__('Contact name')}}"
                   autocapitalize="none"
                   autocorrect="off"
                   spellcheck="false"
                   class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">
        </div>
        <div class="flex flex-col gap-2">
            <label for="email"
                   class="font-bold">{{__('Email')}}
                @error('email')
                <span class="font-normal block text-red-500"> {{ $message }}</span>
                @enderror
            </label>
            <input id="email"
                   type="text"
                   value="{{old('email')}}"
                   name="email"
                   placeholder="{{__('Contact email')}}"
                   autocapitalize="none"
                   autocorrect="off"
                   spellcheck="false"
                   class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">
        </div>
        <x-form-submission-button>{{__('Create this contact')}}</x-form-submission-button>
    </form>
</x-layouts.main>
