<x-layouts.main>
    <h1 class="font-bold text-2xl">{{$project->name}}</h1>
    <dl class="flex flex-col gap-4 bg-slate-50 p-4">
        <div>
            <p>{{$project->description}}</p>
        </div>
    </dl>
    <div class="flex gap-2">
        @can('edit', $project)
            <a href="/projects/{{$project->id}}/edit"
               class="bg-zinc-700 font-bold text-white rounded-md p-2 px-4 tracking-wider uppercase"><span>{{__('Edit')}}</span>
            </a>
        @endcan
        @can('delete', $project)
            <form action="/projects/{{$project->id}}" method="post" class="m-0">
                @method('DELETE')
                @csrf
                <x-form-submission-button class="bg-red-500">
                    {!! __('Delete') !!}
                </x-form-submission-button>
            </form>
        @endcan
    </div>
    <!-- richtig zurückweisen -->
    <a href="/jiris/{{$jiri->id}}" class="font-bold m-4"> ← {{ __("Go back") }}</a>
</x-layouts.main>
