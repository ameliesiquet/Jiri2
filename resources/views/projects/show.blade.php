<x-layouts.main>
    <h1 class="font-bold text-2xl">{{$project->name}}</h1>
    <dl class="flex flex-col gap-4 bg-slate-50 p-4">
        <div>
            <p>{{$project->description}}</p>
        </div>
    </dl>
    <div class="flex gap-2">
        <a href="/projects/{{$project->id}}/edit"
           class="bg-zinc-700 font-bold text-white rounded-md p-2 px-4 tracking-wider uppercase"><span>{{__('Edit')}}</span>
        </a>
        <form action="/projects/{{$project->id}}" method="post" class="m-0">
            @method('DELETE')
            @csrf
            <x-red-submission-button>
                {{__('Delete')}}
            </x-red-submission-button>
        </form>
    </div>
</x-layouts.main>
