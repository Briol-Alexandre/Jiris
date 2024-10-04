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
    <x-forms.controls.link text="Create a new Jiri" url="{{ route('jiri.create')}}" />
</x-layouts.main>


