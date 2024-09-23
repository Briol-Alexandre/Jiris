<x-layouts.main>
    <form action="/jiris"
          method="post"
          class="flex flex-col gap-8 bg-slate-50 p-4">
        @csrf
        <div class="flex flex-col gap-2">
            <label for="name"
                   class="font-bold">Name
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
                   placeholder="Projet Web 2024">
        </div>
        <div class="flex flex-col gap-2">
            <label for="date"
                   class="font-bold">Starting at
                @error('starting_at')
                <span class="block text-red-500">{{ $message }}</span>
                @enderror
            </label>
            <small>Should be in the format 2024-06-10 09:17</small>
            <input class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   type="text"
                   value="{{ old('starting_at') }}"
                   name="starting_at"
                   id="date"
                   placeholder="2024-06-10 09:17">
        </div>
        <div>
            <button type="submit"
                    class="bg-blue-500 font-bold text-white mt-3 rounded-md p-2 px-4 tracking-wider uppercase">Create
                this Jiri
            </button>
        </div>
    </form>
</x-layouts.main>
