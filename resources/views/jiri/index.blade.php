<x-layouts.main>
    <h1 class="font-bold text-2xl">Your jiris</h1>
    <section>
        <h2 class="font-bold">Upcoming Jiris</h2>
        <x-jiris.list :jiris="$upcomingJiris"/>
    </section>
    <section>
        <h2 class="font-bold">Past Jiris</h2>
        <x-jiris.list :jiris="$pastJiris"/>
    </section>
    <div>
        <a href="/jiris/create"
           class="bg-blue-500 font-bold text-white mt-3 rounded-md p-2 px-4 tracking-wider uppercase">Create
            a new Jiri</a>
    </div>
</x-layouts.main>


