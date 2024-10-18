<x-layouts.main>
    <h1 class="font-bold text-2xl">{{ $jiri->name }}</h1>
    <dl class="flex flex-col gap-4 bg-slate-50 p-4">
        <div>
            <dt class="font-bold">{{ __('Jiri Name') }}</dt>
            <dd>{{ $jiri->name }}</dd>
        </div>
        <div>
            <dt class="font-bold">{{ __('Starting at') }}</dt>
            <dd>{{ $jiri->starting_at->diffForHumans() }}
            </dd>
            <dd>
                <time datetime="{{ $jiri->starting_at->toDateTimeString() }}">
                    {{__('on')}} {{$jiri->starting_at->format('d M Y') }}
                    {{__('at')}} {{ $jiri->starting_at->format('H:i') }}
                </time>
            </dd>
        </div>
        <x-forms.controls.link text="Edit Jiri" url="{{ route('jiri.edit', $jiri) }}"/>
        <form action="{{ route('jiri.destroy', $jiri) }}"
              method="post">
            @csrf
            @method('DELETE')
            <input type="hidden"
                   name="id"
                   value="{{ $jiri->id }}">
            <x-forms.controls.danger-button text="{{__('Delete this Jiri')}}"/>
        </form>
        <div class="flex">
            <div class="flex-grow">
                <h2 class="font-bold text-xl mb-3 mt-7">{{__('Evaluators')}}</h2>
                @if(count($jiri->evaluators)===0)
                    <p class="text-gray-400">{{__("There's no evaluators in this jiri")}}</p>
                @endif
                <ul class="flex flex-col gap-4">
                    @foreach($jiri->evaluators as $evaluator)
                        <li class="flex gap-2">
                            {{ $evaluator->name }}
                            <form action="{{route('attendances.update', $evaluator->pivot->id)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="jiri_id" value="{{ $jiri->id }}">
                                <input type="hidden" name="contact_id" value="{{ $evaluator->id }}">
                                <input type="hidden" name="role" value="{{\App\Enums\ContactRole::Student->value}}">
                                <button
                                    class="px-2 bg-red-500 text-white rounded hover:bg-white border-red-500 border-2 hover:text-red-500">{{__('Change to student')}}
                                </button>

                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="flex-grow">
                <h2 class="font-bold text-xl mb-3 mt-7">{{__('Students')}}</h2>
                @if(count($jiri->students)===0)
                    <p class="text-gray-400">{{__("There's no students in this jiri")}}</p>
                @endif
                <ul class="flex flex-col gap-4">
                    @foreach($jiri->students as $student)
                        <li class="flex gap-2">
                            {{ $student->name }}
                            <form action="{{route('attendances.update', $student->pivot->id)}}" method="post">
                                @method('PATCH')
                                @csrf
                                <input type="hidden" name="jiri_id" value="{{ $jiri->id }}">
                                <input type="hidden" name="contact_id" value="{{ $student->id }}">
                                <input type="hidden" name="role" value="{{\App\Enums\ContactRole::Evaluator->value}}">

                                <button type="submit"
                                        class="px-2 bg-red-500 text-white rounded hover:bg-white border-red-500 border-2 hover:text-red-500">{{__('Change to evaluator')}}
                                </button>

                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="flex-grow">
                <h2 class="font-bold text-xl mb-3 mt-7">{{__('Projects')}}</h2>
                @if(count($jiri->projects)===0)
                    <p class="text-gray-400">{{__("There's no project in this jiri")}}</p>
                @endif
                <ul class="flex flex-col gap-4">
                    @foreach($jiri->projects as $project)
                        <li class="flex gap-2">
                            {{ $project->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </dl>
</x-layouts.main>
