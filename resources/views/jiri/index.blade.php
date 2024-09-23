<x-layouts.main>
    <h1 class="font-bold text-2xl">{{ __('Your jiris') }}</h1>
    <section>
        <h2 class="font-bold">{{ __('Upcoming Jiris') }}</h2>
        <x-jiris.list :jiris="$upcomingJiris"/>
    </section>
    <section>
        <h2 class="font-bold">{{ __('Past Jiris') }}</h2>
        <x-jiris.list :jiris="$pastJiris"/>
    </section>
    <div>
        <a href="{{ route('jiri.create') }}"
           class="bg-blue-500 font-bold text-white mt-3 rounded-md p-2 px-4 tracking-wider uppercase">
            {{ __('Create a new Jiri') }}</a>
    </div>
</x-layouts.main>


