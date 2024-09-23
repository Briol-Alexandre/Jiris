<x-layouts.main>
    <h1 class="font-bold text-2xl">{{__('Your Contacts')}}</h1>
    <x-contacts.list :contacts="$contacts"/>
    <div>
        <a href="{{ route('contact.create') }}"
           class="bg-blue-500 font-bold text-white mt-3 rounded-md p-2 px-4 tracking-wider uppercase">
            {{ __('Create a new Contact') }}</a>
    </div>
</x-layouts.main>
