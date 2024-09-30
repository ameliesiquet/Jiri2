@props(['contacts'])
<ol>
    @foreach($contacts as $contact)
        <li>
            <a href="/contacts/{{$contact->id}}" class="underline text-cyan-600">
                {{$contact->name}}
            </a>
        </li>
    @endforeach
</ol>
