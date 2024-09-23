<x-layouts.main>
    <h1 class="font-bold text-2xl">{{__('Edit this Jiri')}}</h1>
    <form action="/jiris/{{$jiri->id}}"
          method="post"
          class="flex flex-col gap-8 bg-slate-50 p-4">
        @method('PATCH')
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
                   value="{{$jiri->name}}"
                   name="name"
                   placeholder="Jiri name"
                   autocapitalize="none"
                   autocorrect="off"
                   spellcheck="false"
                   class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">
        </div>
        @php($now = now()->format('Y-m-d H:i'))
        <div class="flex flex-col gap-2">
            <label for="starting_at"
                   class="font-bold">{{__('Starting at')}}
                @error('starting_at')
                <span class="font-normal block text-red-500"> {{ $message }}</span>
                @enderror
            </label>
            <input id="starting_at"
                   type="text"
                   value="{{$jiri->starting_at->format('Y-m-d H:i')}}"
                   name="starting_at"
                   placeholder="{{ $now }}"
                   autocapitalize="none"
                   autocorrect="off"
                   spellcheck="false"
                   class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">
        </div>
        <x-form-submission-button>{{__('Edit this Jiri')}}</x-form-submission-button>
    </form>
</x-layouts.main>
