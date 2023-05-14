@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                 Games forum
                </h1>
                <a 
                    href="/blog"
                    class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">
                    Read More
                </a>
            </div>
        </div>
    </div>

  

    <div class="text-center p-15 bg-black text-white">
        <h2 class="text-2xl pb-5 text-l"> 
            Some games that are there 
        </h2>

        {{-- for each oof the tag --}}
    </div>

    <div class="text-center py-15">
        <span class="uppercase text-s text-gray-400">
            Blog
        </span>

        <h2 class="text-4xl font-bold py-10">
            Recent Posts
        </h2>
    </div>
   
    
    <div class = "artical">
    @foreach($posts as $post)
    {{-- <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
                

                <h3 class="text-xl font-bold py-10">
                    {{ $post->title }}
                </h3>
                <p>{{ $post->description }}</p>
                <br>
                <br>

                
            </div> --}}
            <div class="w-full py-8 px-4 mx-auto lg:py-16">

                
                    <div class="  bg-gray-50 border-gray-200 rounded-lg p-2 md:p-2 ">
                        <p href="#" class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                            
                            Design
                        </p>
                        <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2"> {{ $post->title }}</h2>
                        <p class=" overflow-hidden max-h-15 text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">{{ $post->description }}</p>
                        <a 
                    href="/blog"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"">
                    Find Out More
                </a>
                    </div>
                
            </div>
        @endforeach
    </div>
    
@endsection