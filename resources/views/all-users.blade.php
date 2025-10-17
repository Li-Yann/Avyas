<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Categories</title>
</head>

@extends('admin')

@section('content')

<div class="bg-gray-800 p-4 mt-10 rounded-md shadow-md text-white">
    <h2 class="text-lg font-semibold mb-3">Existing Users</h2>
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-700">
                <th class="py-2 px-4 border-b border-gray-600">S.N.</th>
                <th class="py-2 px-4 border-b border-gray-600">User Name</th>
                <th class="py-2 px-4 border-b border-gray-600">Emails</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $key=>$user)
            <tr class="hover:bg-gray-700">
                <td class="py-2 px-4 border-b border-gray-600">{{$key+1}}</td>
                <td class="py-2 px-4 border-b border-gray-600">{{$user->name}}</td>
                <td class="py-2 px-4 border-b border-gray-600">{{$user->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection


</html>