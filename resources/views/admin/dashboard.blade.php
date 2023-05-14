@extends('layouts.app')

@section('content')
<div class="pb-28">
    <div class="grid grid-cols-1 gap-4 px-4 mt-8 sm:grid-cols-3 sm:px-8">
        <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
            <div class="p-4 bg-green-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                                               viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg></div>
            <div class="px-4 text-gray-700">
                <h3 class="text-sm tracking-wider">Total User</h3>
                <p class="text-3xl">{{$num_user}}</p>
            </div>
            <a class="no-underline hover:underline" href="/userTable">view more</a>
        </div>
        <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
            <div class="p-4 bg-blue-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                                              viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2">
                    </path>
                </svg></div>
            <div class="px-4 text-gray-700">
                <h3 class="text-sm tracking-wider">Total Post</h3>
                <p class="text-3xl">{{$num_post}}</p>
            </div>
        </div>
        <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
            <div class="p-4 bg-indigo-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z">
                    </path>
                </svg></div>
            <div class="px-4 text-gray-700">
                <h3 class="text-sm tracking-wider">Total Comment</h3>
                <p class="text-3xl">{{$num_comment}}</p>
            </div>
        </div>
    </div>

    <div class="m-9 relative overflow-x-auto shadow-md sm:rounded-lg">
        @isset($posts)
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-200 uppercase bg-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-2xl">ID</th>
                    <th scope="col" class="px-6 py-3 text-2xl">Title</th>
                    <th scope="col" class="px-6 py-3 text-2xl">Slug</th>
                    <th scope="col" class="px-6 py-3 text-2xl">Vote</th>
                    <th scope="col" class="px-6 py-3 text-2xl">Date Created</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th  scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-1xl">
                            {{ $post->id }}
                        </th>
                        <td class="px-6 py-4 text-2xl">{{$post->title}}</td>
                        <td class="px-6 py-4 text-2xl">{{$post->slug}}</td>
                        <td class="px-6 py-4 text-2xl">num votes</td>
                        <td class="px-6 py-4 text-2xl">{{$post->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endisset
    </div>
</div>
@endsection
