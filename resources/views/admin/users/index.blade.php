@extends('layouts.app')

@section('content')

    <div class="flex justify-between items-center pt-2">
        <h1 class="text-3xl font-bold text-gray-700 dark:text-gray-200">Users</h1>
        <a href="/admin/users/create/" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add User</a>
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
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-1xl">
                        {{ $user->id }}
                    </th>
                    <td class="px-6 py-4 text-2xl">
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
@endsection
