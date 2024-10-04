<x-layouts.main>
    <h1 class="font-bold text-2xl">{{__('Your Contacts')}}</h1>
    <x-contacts.list :contacts="$contacts"/>
    <x-forms.controls.link text="Create a new Contact" url=" {{ route('contact.create') }}"/>
</x-layouts.main>
