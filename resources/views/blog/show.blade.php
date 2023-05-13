@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            {{ $post->title }}
        </h1>
    </div>
</div>

<div class="w-4/5 m-auto pt-20">
    <span class="text-gray-500">
        By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
    </span>

    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $post->description }}
    </p>
</div>
@guest


 @foreach($comments as $comment)
<div class="w-4/5 m-auto pt-20">
    

    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $comment->comment }}
    </p>
    
</div>
@endforeach

@else
        
<div class="max-w-lg shadow-md">
      <form 
      class="w-full p-4"
      action="/comment"
        method="POST"
        enctype="multipart/form-data"
       >
        @csrf
        
        <label class="block mb-2">
          <span class="text-gray-600">Add a comment</span>
          <textarea name="content" class="block w-full mt-1 rounded" rows="3"></textarea>
        </label>
        <input type="hidden" name="post_id" value="{{ $post->id }}">

        <button type="submit" class="px-3 py-2 text-sm text-blue-100 bg-blue-600 rounded">Comment</button>
      </form>
</div>
@endguest
@endsection 