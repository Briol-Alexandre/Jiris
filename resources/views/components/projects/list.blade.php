@props(['projects'])

<ol>
    @foreach($projects as $project)
        <li><a href="/projects/{{ $project->id }}"
               class="underline text-blue-500">{{ $project->name }}</a></li>
    @endforeach
</ol>
