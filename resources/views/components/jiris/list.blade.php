@props(['jiris'])

<ol>
    @foreach($jiris as $jiri)
        <li><a href="/jiris/{{ $jiri->id }}"
               class="underline text-blue-500">{{ $jiri->name }}</a></li>
    @endforeach
</ol>
