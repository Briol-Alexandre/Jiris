<x-layouts.main>
    <h1 class="font-bold text-2xl">{{ $contact->name }}</h1>
    <dl class="flex flex-col gap-4 bg-slate-50 p-4">
        <div>
            <dt class="font-bold">{{__('Contact Name')}}</dt>
            <dd>{{ $contact->name }}</dd>
        </div>
        <div>
            <dt class="font-bold">{{__('Contact Email')}}</dt>
            <dd>{{ $contact->email }}</dd>
        </div>
        <x-forms.controls.link text="Edit this Contact" url=" {{ route('contact.edit', $contact) }}"/>
        <form action="{{ route('contact.destroy', $contact) }}"
              method="post">
            @csrf
            @method('DELETE')
            <input type="hidden"
                   name="id"
                   value="{{ $contact->id }}">
            <x-forms.controls.danger-button text="{{__('Delete this Contact')}}"/>
        </form>
    </dl>
</x-layouts.main>
