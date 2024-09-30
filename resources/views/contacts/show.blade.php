<x-layouts.main>
    <h1 class="font-bold text-2xl">{{$contact->name}}</h1>
    <dl class="flex flex-col gap-7 bg-slate-50 p-4">
        <div class="flex flex-col gap-1">
            <dt class="font-bold">{{__('Contact')}}</dt>
            <dd><?= $contact->name ?></dd>
            <dd><?= $contact->email ?></dd>
        </div>
    </dl>
    <div class="flex gap-2">
        <a href="/contacts/{{$contact->id}}/edit"
           class="bg-zinc-700 font-bold text-white rounded-md p-2 px-4 tracking-wider uppercase"><span>{{__('Edit')}}</span>
        </a>
        <form action="/contacts/{{$contact->id}}" method="post" class="m-0">
            @method('DELETE')
            @csrf
            <x-red-submission-button>
                {{__('Delete')}}
            </x-red-submission-button>
        </form>
    </div>
</x-layouts.main>

