<x-layouts.main>
    <h1 class="font-bold text-2xl">{{ __('Edit') }} {{ $project->name }}</h1>
    <form action="{{ route('project.edit', $project) }}"
          method="post"
          class="flex flex-col gap-8 bg-slate-50 p-4">
        @csrf
        @method('PATCH')
        <div class="flex flex-col gap-2">
            <label for="name"
                   class="font-bold">{{ __('Project Name') }}
                @error('name')
                <span class="block text-red-500">{{ $message }}</span>
                @enderror
            </label>
            <input class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   type="text"
                   value="{{ $project->name }}"
                   name="name"
                   id="name"
                   autocapitalize="none"
                   autocorrect="off"
                   spellcheck="false"
                   placeholder="Site Client">
        </div>
        <div class="flex flex-col gap-2">
            <label for="date"
                   class="font-bold">{{__('Project Description')}}
                @error('description')
                <span class="block text-red-500">{{ $message }}</span>
                @enderror
            </label>
            <input class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   type="text"
                   value="{{ $project->description }}"
                   name="description"
                   id="description"
                   placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam animi aspernatur beatae consequatur dolorem impedit necessitatibus nisi non odio, rerum sed ut. At cum cupiditate, dignissimos dolorum facere nemo sapiente?">

        </div>
        <div>
            <button type="submit"
                    class="bg-blue-500 font-bold text-white mt-3 rounded-md p-2 px-4 tracking-wider uppercase">
                {{ __('Edit this Project') }}
            </button>
        </div>
    </form>
</x-layouts.main>
