<x-layouts.main>
    <h1 class="font-bold text-2xl">{{ $contact->name }}</h1>
    <dl class="flex flex-col gap-4 bg-slate-50 p-4">
        <div>
            <dt class="font-bold">Contact Name</dt>
            <dd>{{ $contact->name }}</dd>
        </div>
        <div>
            <dt class="font-bold">Contact Email</dt>
            <dd>{{ $contact->email }}</dd>
        </div>
    </dl>
</x-layouts.main>
