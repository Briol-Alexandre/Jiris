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
        <div>
            <a href="{{ route('jiri.edit', $jiri) }}"
               class="bg-blue-500 font-bold text-white mt-3 rounded-md p-2 px-4 tracking-wider uppercase">
                {{ __('Edit Jiri') }}</a>
        </div>
        <form action="{{ route('jiri.destroy', $jiri) }}"
              method="post">
            @csrf
            @method('DELETE')
            <input type="hidden"
                   name="id"
                   value="{{ $jiri->id }}">
            <x-forms.controls.danger-button text="{{__('Delete this Jiri')}}"/>
        </form>
    </dl>
</x-layouts.main>
