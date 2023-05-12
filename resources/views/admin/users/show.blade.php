@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="w-4/5 m-auto mt-2">
            <ul class="flex">
                @foreach ($errors->all() as $error)
                    <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4 text-center">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="grid gap-3 mb-6 md:grid-cols-2 m-9 ">
            <div class="mb-6">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" name="name" value="{{$user->name}}" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
            </div>
            <div class="mb-6">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="text" name="email" value="{{$user->email}}" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
            </div>

            <div class="mb-6">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                <input type="text" name="email" value="{{$user->role->name}}" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
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

@endsection
