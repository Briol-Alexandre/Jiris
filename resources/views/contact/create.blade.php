<x-layouts.main>
    <form action="{{ route('contact.store') }}"
          method="post"
          class="flex flex-col gap-8 bg-slate-50 p-4">
        @csrf
        <div class="flex flex-col gap-2">
            <label for="name"
                   class="font-bold">{{ __('Contact Name') }}
                @error('name')
                <span class="block text-red-500">{{ $message }}</span>
                @enderror
            </label>
            <input class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   type="text"
                   value="{{ old('name') }}"
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
                   value="{{ old('email') }}"
                   name="email"
                   id="email"
                   placeholder="john.doe@example.com">

        </div>
        <x-forms.controls.button text="Create this Contact"/>



</x-layouts.main>
