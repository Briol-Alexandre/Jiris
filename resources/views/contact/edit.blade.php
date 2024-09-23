<x-layouts.main>
    <h1 class="font-bold text-2xl">{{ __('Edit') }} {{ $contact->name }}</h1>
    <form action="{{ route('contact.edit', $contact) }}"
          method="post"
          class="flex flex-col gap-8 bg-slate-50 p-4">
        @csrf
        @method('PATCH')
        <div class="flex flex-col gap-2">
            <label for="name"
                   class="font-bold">{{ __('Contact Name') }}
                @error('name')
                <span class="block text-red-500">{{ $message }}</span>
                @enderror
            </label>
            <input class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   type="text"
                   value="{{ $contact->name }}"
                   name="name"
                   id="name"
                   autocapitalize="none"
                   autocorrect="off"
                   spellcheck="false"
                   placeholder="John Doe">
        </div>
        <div class="flex flex-col gap-2">
            <label for="email"
                   class="font-bold">{{__('Contact Email')}}
                @error('email')
                <span class="block text-red-500">{{ $message }}</span>
                @enderror
            </label>
            <input class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   type="text"
                   value="{{ $contact->email }}"
                   name="email"
                   id="email"
                   placeholder="john.doe@example.com">

        </div>
        <div>
            <button type="submit"
                    class="bg-blue-500 font-bold text-white mt-3 rounded-md p-2 px-4 tracking-wider uppercase">
                {{ __('Edit this Contact') }}
            </button>
        </div>
    </form>
</x-layouts.main>
