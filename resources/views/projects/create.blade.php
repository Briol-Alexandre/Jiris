<x-layouts.main>
    <form action="{{ route('project.store') }}"
          method="post"
          class="flex flex-col gap-8 bg-slate-50 p-4">
        @csrf
        <div class="flex flex-col gap-2">
            <label for="name"
                   class="font-bold">{{ __('Project Name') }}
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
                   placeholder="Site Client">
        </div>
        <div class="flex flex-col gap-2">
            <label for="description"
                   class="font-bold">{{__('Project Description')}}
                @error('description')
                <span class="block text-red-500">{{ $message }}</span>
                @enderror
            </label>
            <input class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   type="text"
                   value="{{ old('description') }}"
                   name="description"
                   id="description"
                   placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam animi aspernatur beatae consequatur dolorem impedit necessitatibus nisi non odio, rerum sed ut. At cum cupiditate, dignissimos dolorum facere nemo sapiente?">

        </div>
        <x-forms.controls.button text="Create this Project"/>
    </form>
</x-layouts.main>
