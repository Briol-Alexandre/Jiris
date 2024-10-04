<x-layouts.main>
    <h1 class="font-bold text-2xl">{{ ($project->name) }}</h1>
    <dl class="flex flex-col gap-4 bg-slate-50 p-4">
        <div>
            <dt class="font-bold">{{__('Project Name')}}</dt>
            <dd>{{ $project->name }}</dd>
        </div>
        <div>
            <dt class="font-bold">{{__('Project Description')}}</dt>
            <dd>{{ $project->description }}</dd>
        </div>
        <x-forms.controls.link text="Edit Project" url="{{ route('project.edit', $project) }}"/>
        <form action="{{ route('project.destroy', $project) }}"
              method="post">
            @csrf
            @method('DELETE')
            <input type="hidden"
                   name="id"
                   value="{{ $project->id }}">
            <x-forms.controls.danger-button text="{{__('Delete this Project')}}"/>
        </form>
    </dl>
</x-layouts.main>
