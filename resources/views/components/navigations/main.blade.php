<nav id="main-menu"
     class="font-bold">
    <h2 class="sr-only">{{ $title }}</h2>
    <div class="flex justify-between">
        <!----
        <div class="block">
            <img src="../../../../resources/img/jiri.svg" alt="Img">
        </div>
        --->
        <ul class="flex flex-col justify-center sm:flex-row gap-4 sm:gap-8 sm:items-center">
            @auth
                @foreach($links as $link)
                    <li><a class="underline text-white uppercase tracking-wider"
                           href="{{ $link['url'] }}">{{ __($link['name']) }}</a></li>
                @endforeach
                @if (Route::has('profile'))
                    <li><a href="{{route('profile')}}">{{ __('profile') }}</a></li>
                @endif
            @else
                @if (Route::has('login'))
                    <li><a class="underline text-white uppercase tracking-wider"
                           href="{{ route('login') }}">{{ __('login') }}</a></li>
                @endif
                @if (Route::has('register'))
                    <li><a class="underline text-white uppercase tracking-wider"
                           href="{{ route('register') }}">{{ __('register') }}</a></li>
                @endif
            @endauth
        </ul>

        <div class="text-right p-2 bg-red-500 rounded">
            @if (Route::has('logout'))
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-white uppercase tracking-wider">
                        {{ __('logout') }}
                    </button>
                </form>
            @endif
        </div>
    </div>
</nav>
