

<nav class="space-x-4 text-gray-300 text-sm sm:text-base">
    @if(Auth::check() && Auth::user()->isAdmin())
        <a class="no-underline hover:underline" href="/admin/users">Users</a>
        <a class="no-underline hover:underline" href="/">Home</a>
        <a class="no-underline hover:underline" href="/blog">Blog</a>

        <span>{{ Auth::user()->name }}</span>

        <a href="{{ route('logout') }}"
           class="no-underline hover:underline"
           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            {{ csrf_field() }}
        </form>

    @else

        <a class="no-underline hover:underline" href="/post/create">Create Post</a>
        <a class="no-underline hover:underline" href="/">Home</a>
        <a class="no-underline hover:underline" href="/blog">Blog</a>
        @guest
            <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
                <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        @else
            <span>{{ Auth::user()->name }}</span>

            <a href="{{ route('logout') }}"
               class="no-underline hover:underline"
               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                {{ csrf_field() }}
            </form>
        @endguest
    @endif
</nav>
