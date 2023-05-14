@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-9">
        <div class="text-5xl">
            {{ $post->title }}
        </div>
    </div>
</div>

<div class="w-4/5 m-auto pt-5">
    <span class="text-gray-500">
        By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
    </span>

    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $post->description }}
    </p>
</div>
@guest


 @foreach($comments as $comment)
 <article class="p-6 mb-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
    <footer class="flex justify-between items-center mb-2">
        <div class="flex items-center">
            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"><img
                    class="mr-2 w-6 h-6 rounded-full"
                    src="https://flowbite.com/docs/images/people/profile-picture-3.jpg"
                    alt="Bonnie Green">Bonnie Green</p>
            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-03-12"
                    title=""> {{$comment->created_at}}  </time></p>
        </div>

    </footer>
    <p class="text-gray-500 dark:text-gray-400">{{$comment->content}}</p>
    <div class="flex items-center mt-4 space-x-4">
        <button type="button"
            class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
            <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
            Reply
        </button>
    </div>
</article>
@endforeach

@else

    <div class=" m-auto w-4/5 shadow-md mb-5">
        <form
            class="w-full p-4"
            action="/comment"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            <label class="block mb-2">
                <span class="text-gray-600">Add a comment</span>
                <textarea  name="content" class="block w-full mt-1 rounded" rows="3"></textarea>
            </label>
            <input type="hidden" name="post_id" value="{{ $post->id }}">

            <button type="submit" class="px-3 py-2 text-sm text-blue-100 bg-blue-600 rounded">Comment</button>
        </form>
    </div>

@foreach($comments as $comment)
<article class="p-6 mb-6 w-4/5 m-auto text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
    <div class="flex justify-between items-center mb-2">
        <div class="flex items-center">
            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"> {{$comment->user->name}}</p>
            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-03-12"
                    title=""> [ {{$comment->created_at}} ] </time></p>
        </div>

    </div>
    <div class="flex justify-between">

    <p class="text-gray-500 dark:text-gray-400">{{$comment->content}}</p>

    <form action="/comment/{{$comment->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-3 py-2 text-sm text-blue-100 bg-blue-600 rounded">Delete</button>
    </form>
    </div>
</article>
@endforeach

@endguest
@endsection
