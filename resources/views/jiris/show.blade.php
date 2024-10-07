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
    <section class="flex gap-20 mt-10">
        <div class="flex flex-col gap-3">
            <h2 class="font-bold text-xl">{{__('Students')}}</h2>
            <ul class="flex flex-col gap-4">
                @foreach($jiri->students as $student)
                    <li class="flex flex-col gap-1">
                        <span class="font-bold">{{$student->name}}</span>
                        <span>{{$student->email}}</span>
                        <div class="flex gap-2 ">
                            <form action="{{route('attendances.update', $student->pivot->id)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="role" value="{{\App\Enums\ContactRole::Evaluator->value}}">
                                <x-form-submission-button class="bg-blue-500">
                                    {!! __('Change role') !!}
                                </x-form-submission-button>
                            </form>
                            <form action="{{ route('attendances.destroy',$student->pivot->id) }}" method="post"
                                  class="m-0">
                                @method('DELETE')
                                @csrf
                                <x-form-submission-button class="bg-red-500">
                                    {!! __('Delete') !!}
                                </x-form-submission-button>
                            </form>
                        </div>

                    </li>
                @endforeach
            </ul>
        </div>
        <div class="flex flex-col gap-3">
            <h2 class="font-bold text-xl">{{__('Evaluators')}}</h2>
            <ul class="flex flex-col gap-2">
                @foreach($jiri->evaluators as $evaluator)
                    <li class="flex flex-col gap-1">
                        <span class="font-bold">{{$evaluator->name}}</span>
                        <span>{{$evaluator->email}}</span>
                        <div class="flex gap-2 ">
                            <form action="{{route('attendances.update', $evaluator->pivot->id)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="role" value="{{\App\Enums\ContactRole::Student->value}}">
                                <x-form-submission-button class="bg-blue-500">
                                    {!! __('Change role') !!}
                                </x-form-submission-button>
                            </form>
                            <form action="{{ route('attendances.destroy',$jiri) }}" method="post" class="m-0">
                                @method('DELETE')
                                @csrf
                                <x-form-submission-button class="bg-red-500">
                                    {!! __('Delete') !!}
                                </x-form-submission-button>
                            </form>
                        </div>

                    </li>
                @endforeach
            </ul>
        </div>
        <div>
            <h2 class="font-bold text-xl">{{__('Assignments')}}</h2>
            <ul class="flex flex-col gap-2">
                @foreach($jiri->projects as $project)
                    <li class="flex flex-col gap-1">
                        <a href="{{route('assignments.show', $project)}}">
                            <span>{{$project->name}}</span>
                        </a>
                        <form action="{{ route('attendances.destroy',$jiri) }}" method="post" class="m-0">
                            @method('DELETE')
                            @csrf
                            <x-form-submission-button class="bg-red-500">
                                {!! __('Delete') !!}
                            </x-form-submission-button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    <a href="/jiris" class="font-bold m-4"> ← {{ __("Go back") }}</a>
</x-layouts.main>

