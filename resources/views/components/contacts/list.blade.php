@props(['contacts'])

<ol>
    @foreach($contacts as $contact)
        <li><a href="/contacts/{{ $contact->id }}"
               class="underline text-blue-500">{{ $contact->name }}</a></li>
    @endforeach
</ol>
