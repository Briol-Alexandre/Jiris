<x-layouts.main>
    <h1 class="font-bold text-2xl">{{__('Your projects')}}</h1>
    <x-projects.list :projects="$projects"/>
    <x-forms.controls.link text="Create a new Project" url="{{ route('project.create') }}"/>
</x-layouts.main>
