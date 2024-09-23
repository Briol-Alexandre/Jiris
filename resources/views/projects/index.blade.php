<x-layouts.main>
    <h1 class="font-bold text-2xl">{{__('Your projects')}}</h1>
    <x-projects.list :projects="$projects"/>
    <div>
        <a href="{{ route('project.create') }}"
           class="bg-blue-500 font-bold text-white mt-3 rounded-md p-2 px-4 tracking-wider uppercase">
            {{ __('Create a new Project') }}</a>
    </div>
</x-layouts.main>
