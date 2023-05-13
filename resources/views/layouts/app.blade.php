<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    {{-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css?v=').time()}}">
    {{-- <style  
    type="text/css">
    .background-image1
{
    background-image: url('https://images.unsplash.com/photo-1517245386807-9b0f8b5b7c5f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80');
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    height: 100vh;
    width: 100%;
  
}
    </style> --}}
    
</head>
<body class="@yield('content-class') bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app" class = "@yield('content-class')">
        <header class="bg-gray-800 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        {{-- {{ config('app.name', 'Game blog') }} --}} Game Blog 
                    </a>
                </div>
                <div class="search @yield('search') relative rounded-md shadow-sm">
                    <form method="POST" action="/search">
                        <div class = " flex items-center justify-center">
                        <input type="text" name="q"id="search" class="form-input w-full sm:text-sm sm:leading-5 rounded-md" placeholder="Search...">
                        <button type="submit" class="ml-3 bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded">
                          Search
                        </button>
                      </div>
                    </form>
                  </div>
                @include('layouts.nav')
            </div>
        </header>
        

        <div class="content @yield('content-class')">
            @yield('content')
        </div>

        <div>
            @include('layouts.footer')
        </div>
    </div>
</body>
</html>
