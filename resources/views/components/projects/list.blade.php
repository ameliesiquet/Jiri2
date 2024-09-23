@props(['projects'])
<ol>
    @foreach($projects as $project)
        <li >
            <a href="/projects/{{$project->id}}" class="underline text-cyan-600">
                {{$project->name}}
            </a>
        </li>
    @endforeach
</ol>
