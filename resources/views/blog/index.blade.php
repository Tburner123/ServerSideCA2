@extends('layouts.app')
@section('search', 'searchShow')
@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Blog Posts
        </h1>
    </div>
</div>

<div class="m-4 h-9 w-5/5 justify-center inline-flex items-center  relative rounded-md shadow-sm">
    <form method="GET" action="/search">
        @csrf
        <div class = " h-9 flex items-center justify-center">
            <input type="text" name="q"id="search" class="form-input w-full sm:text-sm sm:leading-5 rounded-md" placeholder="Search...">
            <button type="submit" class="ml-3 bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded">
              Search
            </button>
          </div>
        <label for="filter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Filter options </label>
<select name="filter" id="filter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
  <option selected value ="" >Filter Options </option>
  <option value="1">Action </option>
  <option value="2">Adventure</option>
</select>

    </form>
  </div>

@if (session()->has('message'))
    <div class="w-4/5 m-auto mt-10 pl-2">
        <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
            {{ session()->get('message') }}
        </p>
    </div>
@endif

@if (Auth::check())
    <div class="pt-15 w-4/5 m-auto">
        <a
            href="/blog/create"
            class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
            Create post
        </a>
    </div>
@endif

@foreach ($posts as $post)
    <div class="sm:grid grid-cols-3 gap-10 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div class="col-span-1"  >
            <img  src="{{ asset('images/' . $post->image_path) }}"  class ="blogIndex"alt="">
        </div>
        <div div class="col-span-2">
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{ $post->title }}
            </h2> @if($post->tag()->count() > 0)
            @foreach($post->tag as $tag)
                <p href="" class="tags bg-green-100 text-green-800 text-m font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                    {{ $tag->tag }}
                </p>
            @endforeach
        @endif<br>

            <span class="text-gray-500">
                By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
            </span>

            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                {{ $post->description }}
            </p>


            <a href="/blog/{{ $post->slug }}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Keep Reading
            </a>
            <div class="flex  mt-10">
                <div class="p-5 ">{{$post->votes}}</div>
                <div class="flex ">
                    <form action="/vote/{{ $post->id }}/like" method="POST" class="p-5">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                            Up Vote
                        </button>
                    </form>
                    <form action="/vote/{{ $post->id }}/dislike" method="POST" class="p-5">
                        @csrf
                        <button type="submit" class="bg-red-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                            Down vote
                        </button>
                    </form>
                </div>
            </div>
            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id || Auth::user()->isAdmin())
                <span class="float-right">
                    <a
                        href="/blog/{{ $post->slug }}/edit"
                        class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                        Edit
                    </a>
                </span>

                <span class="float-right">
                     <form
                        action="/blog/{{ $post->slug }}"
                        method="POST">
                        @csrf
                        @method('delete')

                        <button
                            class="text-red-500 pr-3"
                            type="submit">
                            Delete
                        </button>

                    </form>
                </span>
            @endif
        </div>
    </div>
@endforeach

@endsection
