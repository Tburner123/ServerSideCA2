
<button id = "button" data-collapse-toggle="navbar-solid-bg" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-gray-200 text-4xl font-normal text-white  hover:bg-blue-800 focus:ring-gray-600" aria-controls="navbar-solid-bg" aria-expanded="false">
    
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
  </button>
  <div id="my-div"class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
    <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent bg-gray-800 md:bg-transparent border-gray-700">
    @if(Auth::check() && Auth::user()->isAdmin())
    <li>
        <a class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded bg-blue-600" aria-current="page" href="/admin/users">Users</a>
    </li>
    <li>
        <a class="block py-2 pl-3 pr-4  rounded hover:bg-blue-800 text-4xl font-normal text-white  hover:bg-blue-800 hover:text-gray-900" href="/">Home</a>
    </li>
    <li>
        <a class="block py-2 pl-3 pr-4  rounded hover:bg-blue-800 text-4xl font-normal text-white  hover:bg-blue-800 hover:text-gray-900" href="/blog">Blog</a>
    </li>
        <span>{{ Auth::user()->name }}</span>
        <li>
        <a href="{{ route('logout') }}"
           class="block py-2 pl-3 pr-4  rounded hover:bg-blue-800 text-4xl font-normal text-white  hover:bg-blue-800 hover:text-gray-900"
           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            {{ csrf_field() }}
        </form>
    </li>

    @else

    <li>
        <a class="block py-2 pl-3 pr-4  rounded hover:bg-blue-800 text-4xl font-normal text-white  hover:bg-blue-800 hover:text-gray-900" href="/">Home</a>
    </li>
    <li>
        <a class="block py-2 pl-3 pr-4  rounded hover:bg-blue-800 text-4xl font-normal text-white  hover:bg-blue-800 hover:text-gray-900" href="/blog">Blog</a>
    </li>
        @guest
        <li>
             <a class="block py-2 pl-3 pr-4  rounded hover:bg-blue-800 text-4xl font-normal text-white  hover:bg-blue-800 hover:text-gray-900" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
             @if (Route::has('register'))
             <li>
                <a class="block py-2 pl-3 pr-4  rounded hover:bg-blue-800 text-4xl font-normal text-white  hover:bg-blue-800 hover:text-gray-900" href="{{ route('register') }}">{{ __('Register') }}</a>
             </li>
                @endif
        @else
        
            <li>
            <a class="block py-2 pl-3 pr-4  rounded hover:bg-blue-800 text-4xl font-normal text-white  hover:bg-blue-800 hover:text-gray-900" href="/post/create">Create Post</a>
            </li>
            <li>
            <a href="{{ route('logout') }}"
               class="block py-2 pl-3 pr-4  rounded hover:bg-blue-800 text-4xl font-normal text-white  hover:bg-blue-800 hover:text-gray-900"
               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                {{ csrf_field() }}
            </form>
        </li>
        <li>
            <span class = "text-4xl font-normal text-white" >{{ Auth::user()->name }}</span>
        </li>
        @endguest
    @endif
</ul>
</div>
