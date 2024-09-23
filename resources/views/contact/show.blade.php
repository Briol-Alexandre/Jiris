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
        <div>
            <a href="{{ route('contact.edit', $contact) }}"
               class="bg-blue-500 font-bold text-white mt-3 rounded-md p-2 px-4 tracking-wider uppercase">
                {{ __('Edit this Contact') }}</a>
        </div>
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
