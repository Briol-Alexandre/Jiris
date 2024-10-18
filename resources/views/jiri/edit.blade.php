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
        <div class="flex gap-48">
            <div class="mb-6 flex flex-col gap-2">
                <h2 class="font-bold mb-2">{{__('Your Contacts')}}</h2>
                <ul>
                    @foreach($students as $student)
                        <li>
                            <select name="{{$student->id}}" class="rounded mb-1 border-gray-800 font-extrabold"
                                    id="{{$student->id}}">
                                <option value="null"></option>
                                <option value="student" selected>{{__(\App\Enums\ContactRole::Student->value)}}</option>
                                <option value="evaluator">{{__(\App\Enums\ContactRole::Evaluator->value)}}</option>
                            </select>
                            <label for="{{$student->id}}">{{$student->name}}</label>
                        </li>
                    @endforeach
                </ul>
                <ul>
                    @foreach($evaluators as $evaluator)
                        <li>
                            <select name="{{$evaluator->id}}" class="rounded border-gray-800 font-extrabold"
                                    id="{{$evaluator->id}}">
                                <option value="null"></option>
                                <option value="student">{{__(\App\Enums\ContactRole::Student->value)}}</option>
                                <option value="evaluator"
                                        selected>{{__(\App\Enums\ContactRole::Evaluator->value)}}</option>
                            </select>
                            <label for="{{$evaluator->id}}">{{$evaluator->name}}</label>
                        </li>
                    @endforeach
                </ul>
                <ul>
                    @foreach($unaffectedContacts as $unaffectedContact)
                        <li>
                            <select name="{{$unaffectedContact->id}}"
                                    class="rounded mb-1 border-gray-800 font-extrabold"
                                    id="{{$unaffectedContact->id}}">
                                <option value="null" selected></option>
                                <option value="student">{{__(\App\Enums\ContactRole::Student->value)}}</option>
                                <option value="evaluator">{{__(\App\Enums\ContactRole::Evaluator->value)}}</option>
                            </select>
                            <label for="{{$unaffectedContact->id}}">{{$unaffectedContact->name}}</label>
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
        <div>
            <x-forms.controls.button text="Edit Jiri"/>
        </div>
    </form>
</x-layouts.main>
