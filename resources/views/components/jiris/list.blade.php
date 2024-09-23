@props(['jiris'])
<ol class="flex flex-col gap-2">
    @foreach($jiris as $jiri)
        <li class="flex flex-col gap-1.5">
            <a href="/jiris/{{$jiri->id}}" class="underline text-cyan-600">
                {{$jiri->name}}
            </a>
            <p>
                {{$jiri->starting_at}}
            </p>
        </li>
    @endforeach
</ol>
