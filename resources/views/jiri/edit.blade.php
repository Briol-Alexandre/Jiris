<x-layouts.main>
    <h1 class="font-bold text-2xl">{{ __('Edit') }} {{ $jiri->name }}</h1>
    <form action="{{ route('jiri.edit', $jiri) }}"
          method="post"
          class="flex flex-col gap-8 bg-slate-50 p-4">
        @csrf
        @method('PATCH')
        <div class="flex flex-col gap-2">
            <label for="name"
                   class="font-bold">Name
                @error('name')
                <span class="block text-red-500">{{ $message }}</span>
                @enderror
            </label>
            <input class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   type="text"
                   value="{{ $jiri->name }}"
                   name="name"
                   id="name"
                   autocapitalize="none"
                   autocorrect="off"
                   spellcheck="false"
                   placeholder="Projet Web 2024">
        </div>
        <div class="flex flex-col gap-2">
            <label for="date"
                   class="font-bold">Starting at
                @error('starting_at')
                <span class="block text-red-500">{{ $message }}</span>
                @enderror
            </label>
            <small>{{__('Should be in the format')}} 2024-06-10 09:17</small>
            <input class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   type="text"
                   value="{{ $jiri->starting_at }}"
                   name="starting_at"
                   id="date"
                   placeholder="2024-06-10 09:17">
        </div>
        <div>
            <x-forms.controls.button text="Edit Jiri"/>
        </div>
    </form>
</x-layouts.main>
