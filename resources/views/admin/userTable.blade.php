@extends('layouts.app')

@section('content')

<table class="min-w-full divide-y divide-gray-200">
  <thead class="bg-gray-50">
    <tr>
      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">email</th>
      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">id</th>
      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">role</th>
    </tr>
  </thead>
  @foreach ($users as $user)
  <tbody class="bg-white divide-y divide-gray-200">
    <tr>
      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->name }}</td>
      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
      <td class="px-6 py-4 whitespace-nowrap text-sm text-green-500">{{ $user->id }}</td>
      @if($user->role_id==1)
        <td class="px-6 py-4 whitespace-nowrap text-sm text-green-500">User</td>
        @else
        <td class="px-6 py-4 whitespace-nowrap text-sm text-red-500">Admin</td>
        @endif

    </tr>
    @endforeach
  </tbody>
</table>



@endsection
