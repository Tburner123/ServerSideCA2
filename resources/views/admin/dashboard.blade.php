@extends('layouts.app')

@section('content')
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
            <a class="no-underline hover:underline hover:text-blue-600" href="/userTable">view more</a>
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
            <a class="no-underline hover:underline hover:text-blue-600 " href="/blog">View more</a>
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
        <div class="flex justify-between items-center pt-2">
            <h1 class="text-3xl font-bold text-gray-700 dark:text-gray-200">Posts</h1>
        </div>
        @isset($posts)
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-200 uppercase bg-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-2xl text-center">ID</th>
                    <th scope="col" class="px-6 py-3 text-2xl text-center">Title</th>
                    <th scope="col" class="px-6 py-3 text-2xl text-center">Slug</th>
                    <th scope="col" class="px-6 py-3 text-2xl text-center">Vote</th>
                    <th scope="col" class="px-6 py-3 text-2xl text-center">Views</th>
                    <th scope="col" class="px-6 py-3 text-2xl text-center">Date Created</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th  scope="row" class=" text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-1xl">
                            {{ $post->id }}
                        </th>
                        <td class="px-6 py-4 text-2xl text-center">{{$post->title}}</td>
                        <td class="px-6 py-4 text-2xl text-center">{{$post->slug}}</td>
                        <td class="px-6 py-4 text-2xl text-center">{{$post->votes}}</td>
                        <td class="px-6 py-4 text-2xl text-center">{{$post->views}}</td>
                        <td class="px-6 py-4 text-2xl text-center">{{$post->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endisset
    </div>


    <div class="mb-9 mx-9">
        <div class="flex justify-between items-center pt-2">
            <h1 class="text-3xl font-bold text-gray-700 dark:text-gray-200">Users</h1>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-200 uppercase bg-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-2xl">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3 text-2xl">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-2xl">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 text-2xl">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3 text-2xl">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    @if($user->id != \Illuminate\Support\Facades\Auth::user()->id)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th  scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-1xl">
                                {{ $user->id }}
                            </th>
                            <td class="px-6 py-4 text-2xl" onclick="window.location='/admin/users/{{$user->id}}'">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4 text-2xl">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4 text-2xl">
                                {{$user->role->name}}
                            </td>
                            <td class="px-6 py-4 text-right text-2xl">
                                <a href="/admin/users/{{$user->id}}/edit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</a>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('users-delete-{{$user->id}}').submit();" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Delete</a>
                                <form id="users-delete-{{$user->id}}" action="/admin/users/{{$user->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
{{--<button data-drawer-target="separator-sidebar" data-drawer-toggle="separator-sidebar" aria-controls="separator-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">--}}
{{--    <span class="sr-only">Open sidebar</span>--}}
{{--    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">--}}
{{--        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>--}}
{{--    </svg>--}}
{{--</button>--}}
{{--<div class="flex">--}}
{{--<aside id="separator-sidebar" class=" fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">--}}
{{--    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">--}}
{{--        <ul class="space-y-2 font-medium">--}}
{{--            <li>--}}
{{--                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">--}}
{{--                    <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>--}}
{{--                    <span class="ml-3">Dashboard</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">--}}
{{--                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>--}}
{{--                    <span class="flex-1 ml-3 whitespace-nowrap">Kanban</span>--}}
{{--                    <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">--}}
{{--                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>--}}
{{--                    <span class="flex-1 ml-3 whitespace-nowrap">Inbox</span>--}}
{{--                    <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">--}}
{{--                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>--}}
{{--                    <span class="flex-1 ml-3 whitespace-nowrap">Users</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">--}}
{{--                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>--}}
{{--                    <span class="flex-1 ml-3 whitespace-nowrap">Products</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">--}}
{{--                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>--}}
{{--                    <span class="flex-1 ml-3 whitespace-nowrap">Sign In</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">--}}
{{--                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path></svg>--}}
{{--                    <span class="flex-1 ml-3 whitespace-nowrap">Sign Up</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">--}}
{{--            <li>--}}
{{--                <a href="#" class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">--}}
{{--                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white dark:text-gray-400" focusable="false" data-prefix="fas" data-icon="gem" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z"></path></svg>--}}
{{--                    <span class="ml-4">Upgrade to Pro</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#" class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">--}}
{{--                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>--}}
{{--                    <span class="ml-3">Documentation</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#" class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">--}}
{{--                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>--}}
{{--                    <span class="ml-3">Components</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#" class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">--}}
{{--                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"></path></svg>--}}
{{--                    <span class="ml-3">Help</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</aside>--}}
{{--<main class="flex-1">--}}
{{--<div class="p-4 sm:ml-64">--}}
{{--    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">--}}
{{--        <div class="grid grid-cols-3 gap-4 mb-4">--}}
{{--            <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">--}}
{{--                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>--}}
{{--            </div>--}}
{{--            <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">--}}
{{--                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>--}}
{{--            </div>--}}
{{--            <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">--}}
{{--                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">--}}
{{--            <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>--}}
{{--        </div>--}}
{{--        <div class="grid grid-cols-2 gap-4 mb-4">--}}
{{--            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">--}}
{{--                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>--}}
{{--            </div>--}}
{{--            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">--}}
{{--                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>--}}
{{--            </div>--}}
{{--            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">--}}
{{--                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>--}}
{{--            </div>--}}
{{--            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">--}}
{{--                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">--}}
{{--            <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>--}}
{{--        </div>--}}
{{--        <div class="grid grid-cols-2 gap-4">--}}
{{--            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">--}}
{{--                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>--}}
{{--            </div>--}}
{{--            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">--}}
{{--                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>--}}
{{--            </div>--}}
{{--            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">--}}
{{--                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>--}}
{{--            </div>--}}
{{--            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">--}}
{{--                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--</main>--}}
{{--</div>--}}

@endsection
