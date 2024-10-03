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
            <a href="/jiris/{{$jiri->id}}/edit" class="bg-zinc-700 font-bold text-white rounded-md p-2 px-4 tracking-wider uppercase"><span>{{__('Edit')}}</span></a>
        <form action="{{ route('jiris.destroy',$jiri) }}" method="post" class="m-0">
            @method('DELETE')
            @csrf
            <x-form-submission-button class="bg-red-500">
                {!! __('Delete') !!}
            </x-form-submission-button>
        </form>
    </div>
    <a href="/jiris" class="font-bold m-4"> ← {{ __("Go back") }}</a>
</x-layouts.main>

