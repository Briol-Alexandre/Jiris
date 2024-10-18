<x-layouts.main>
    <form action="{{ route('jiri.store') }}"
          method="post"
          class="flex flex-col gap-8 bg-slate-50 p-4">
        @csrf
        <div class="flex flex-col gap-2">
            <label for="name"
                   class="font-bold">{{ __('Jiri Name') }}
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
                   class="font-bold">{{__('Starting at')}}
                @error('starting_at')
                <span class="block text-red-500">{{ $message }}</span>
                @enderror
            </label>
            <small>{{__('Should be in the format')}} 2024-06-10 09:17</small>
            <input class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   type="text"
                   value="{{ old('starting_at') }}"
                   name="starting_at"
                   id="date"
                   placeholder="2024-06-10 09:17">
        </div>
        <div class="flex gap-48">
            <div class="mb-6 flex flex-col gap-2">
                <h2 class="font-bold mb-2">{{__('Your Contacts')}}</h2>
                <ul>
                    @foreach($contacts as $contact)
                        <li>
                            <select name="{{$contact->id}}" class="rounded mb-1 border-gray-800 font-extrabold"
                                    id="{{$contact->id}}">
                                <option value="null"></option>
                                <option value="student">{{__(\App\Enums\ContactRole::Student->value)}}</option>
                                <option value="evaluator">{{__(\App\Enums\ContactRole::Evaluator->value)}}</option>
                            </select>
                            <label for="{{$contact->id}}">{{$contact->name}}</label>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h2 class="font-bold mb-2">{{__('Your Projects')}}</h2>
                <ul class="flex-col">
                    @foreach($projects as $project)
                        <li>
                            <input
                                id="p-{{$project->id}}"
                                type="checkbox"
                                name="projects[]"
                                value="{{$project->id}}"
                                class="rounded checked:bg-gray-800 hover:bg-gray-600"
                            >
                            <label for="p-{{$project->id}}">{{$project->name}}</label>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <x-forms.controls.button text="Create this Jiri"/>
    </form>
</x-layouts.main>
