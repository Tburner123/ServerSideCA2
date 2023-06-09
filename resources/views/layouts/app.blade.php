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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        <nav class="border-gray-200 bg-black dark:bg-gray-800 dark:border-gray-700">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        {{-- {{ config('app.name', 'Game blog') }} --}} Game Blog 
                    </a>
                </div>
                
                
                  
                 
                @include('layouts.nav')
            </div>
        </nav>
        

        <div class="content @yield('content-class')">
            @yield('content')
        </div>

        <div>
            @include('layouts.footer')
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
      $("#button").click(function(){
        $("#my-div").toggleClass("hidden");
      });
    });
</script>
</html>
