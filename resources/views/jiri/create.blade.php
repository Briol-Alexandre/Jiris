<x-layouts.main>
    <form action="/jiris"
          method="post"
          class="flex flex-col gap-8 bg-slate-50 p-4">
        <div class="flex flex-col gap-2">
            <label class="font-bold" for="name">Name</label>
            <input class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   type="text" name="name" id="name">
        </div>
        <div class="flex flex-col gap-2">
            <label class="font-bold" for="date">Starting at</label>
            <input class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   type="text" name="starting_at" id="date">
        </div>
        <div>
            <button type="submit"
                    class="bg-blue-500 font-bold text-white mt-3 rounded-md p-2 px-4 tracking-wider uppercase">Create
                this Jiri
            </button>
        </div>
    </form>
</x-layouts.main>
