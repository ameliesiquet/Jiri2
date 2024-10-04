<x-layouts.main>
    <h1 class="font-bold text-2xl">{{$jiri->name}}</h1>
    <dl class="flex flex-col gap-7 bg-slate-50 p-4">
        <div class="flex flex-col gap-1">
            <dt class="font-bold">{{__('Jiri name')}}</dt>
            <dd><?= $jiri->name ?></dd>
        </div>
        <div>
            <dt class="font-bold">{{__('Starting at')}}</dt>
            <dd>{{ $jiri->starting_at->diffForHumans()}}
            </dd>
            <dd>
                <time datetime="{{$jiri->starting_at}}">
                    {{__('on')}} {{$jiri->starting_at->format('d M Y') }}
                    {{__('at')}} {{$jiri->starting_at->format('H:i') }}
                </time>
            </dd>
        </div>
    </dl>
    <div class="flex gap-3">
        <div>
            <h2 class="font-bold text-xl">{{__('Students')}}</h2>
            <ul class="flex flex-col gap-2">
                @foreach($jiri->students as $student)
                    <li class="flex flex-col gap-1">
                        <span class="font-bold">{{$student->name}}</span>
                        <span>{{$student->email}}</span>
                    </li>
                @endforeach
            </ul>
        </div>
        <div>
            <h2 class="font-bold text-xl">{{__('Evaluators')}}</h2>
            <ul class="flex flex-col gap-2">
                @foreach($jiri->evaluators as $evaluator)
                    <li class="flex flex-col gap-1">
                        <span class="font-bold">{{$evaluator->name}}</span>
                        <span>{{$evaluator->email}}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="flex gap-2">
        @can('update', $jiri)
            <a href="/jiris/{{$jiri->id}}/edit"
               class="bg-zinc-700 font-bold text-white rounded-md p-2 px-4 tracking-wider uppercase"><span>{{__('Edit')}}</span></a>
        @endcan
        @can('delete', $jiri)
            <form action="{{ route('jiris.destroy',$jiri) }}" method="post" class="m-0">
                @method('DELETE')
                @csrf
                <x-form-submission-button class="bg-red-500">
                    {!! __('Delete') !!}
                </x-form-submission-button>
            </form>
        @endcan
    </div>
    <a href="/jiris" class="font-bold m-4"> ← {{ __("Go back") }}</a>
    <!--- Liste des étudiants inscrits à ce jiri -->
</x-layouts.main>

