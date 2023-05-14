@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="pt-10">
        <h2 class="text-6xl">
            Create Post
        </h2>
    </div>
</div>

@if ($errors->any())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="w-4/5 m-auto pt-20">
    <form
        action="/blog"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            <input type="text" name="title" id="large-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="mb-6">
            <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
            <textarea name="description" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
        </div>

        <div class="mb-6">
            <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tag:</label>
            <input type="text" name="tag" id="tagAdded" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
        </div>

        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Dropdown button <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
        <!-- Dropdown menu -->
        <div id="dropdown" class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                @foreach($tags as $tag)
                <li>
                    <div  onclick="addTag('{{$tag->tag}}')" class=" px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        {{$tag->tag}}</div>
                </li>
                @endforeach
            </ul>
        </div>
        <button type="button" onclick="resetTags()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Reset Tags </button>


        <div class="bg-grey-lighter pt-15">
            <label class="w-44 flex flex-col items-center px-2 py-2 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                <span class="mt-2 text-base leading-normal">
                    Select a file
                </span>
                <input
                    type="file"
                    name="image"
                    class="hidden">
            </label>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">JPEG, PNG OR JPG (MAX. 5048 bytes).</p>
        </div>

        <button
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Submit Post
        </button>
    </form>
</div>

    <script>
        const dropdown = document.getElementById('dropdown');
        const dropdownToggle = document.getElementById('dropdownDefaultButton');
        let tagArray = [];
        dropdownToggle.addEventListener('click', function() {
            dropdown.classList.toggle('hidden');
            dropdown.classList.toggle('block');
        });

        function addTag(tag) {
            if(!tagArray.includes(tag)) {
                tagArray.push(tag);
                if (document.getElementById('tagAdded').value === '') {
                    document.getElementById('tagAdded').value = tag;
                } else {
                    document.getElementById('tagAdded').value += ', ' + tag;
                }

            }
                dropdown.classList.toggle('hidden');
                dropdown.classList.toggle('block');
        }

        function resetTags() {
            document.getElementById('tagAdded').value = '';
        }
    </script>
@endsection
