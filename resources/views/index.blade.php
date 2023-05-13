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
   
    
    <div class="sm:grid grid-row-2 w-4/5 m-auto">
    @foreach($posts as $post)
        <div class=" container mx-auto px-4 bg-orange-300 border border-slate-300 hover:border-slate-700 background-color: rgb(253 186 116) rounded-xl ">
        
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5">
                

                <h3 class="text-xl font-bold py-10">
                    {{ $post->title }}
                </h3>
                <p>{{ $post->description }}</p>
                <br>
                <br>

                <a 
                    href=""
                    class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                    Find Out More
                </a>
            </div>
        
        </div>

        
        @endforeach
    </div>
    
@endsection