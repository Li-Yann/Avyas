<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Categories</title>
</head>

@extends('admin')

@section('content')

<!-- //Controller Session (category) -->
@if(Session::has('category'))
<div id="flash-message" class="bg-green-800 text-white px-4 py-2 rounded mb-4">
    {{ Session::get('category') }}
</div>
<!-- Display delete or add data msg  -->
<script>
    setTimeout(function() {
        const msg = document.getElementById('flash-message');
        if (msg) {
            msg.style.transition = 'opacity 0.5s ease';
            msg.style.opacity = '0';
            setTimeout(() => msg.remove(), 500);
        }
    }, 1500);
</script>
@endif

<div class="flex justify-center">
    <form action="/add-categories" method="POST" class="flex items-end gap-4">
        @csrf
        <div>
            <label for="category_name" class="block text-sm font-medium text-black mb-1">Category Name</label>
            <input type="text" id="category_name" name="category_name" placeholder="Add Category"
                class="w-100 px-4 py-2 rounded-md border border-gray-600 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md cursor-pointer">
            Add Category
        </button>
    </form>
</div>
@error('category_name')
<div class="text-red-500 text-center">
    {{$message}}
</div>
@enderror


<div class="bg-gray-800 p-4 mt-10 rounded-md shadow-md text-white">
    <h2 class="text-lg font-semibold mb-3">Existing Categories</h2>
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-700">
                <th class="py-2 px-4 border-b border-gray-600">S.N.</th>
                <th class="py-2 px-4 border-b border-gray-600">Category Name</th>
                <th class="py-2 px-4 border-b border-gray-600">Created By</th>
                <th class="py-2 px-4 border-b border-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($getCategories as $getcategories)
            <tr class="hover:bg-gray-700">
                <td class="py-3 px-4 border-b border-gray-600">{{$getcategories->id}}</td>
                <td class="py-3 px-4 border-b border-gray-600">{{$getcategories->name}}</td>
                <td class="py-3 px-4 border-b border-gray-600">{{$getcategories->creator}}</td>
                <td class="py-3 px-4 border-b border-gray-600">
                    <a href="show-quiz-list/{{$getcategories->id}}/{{$getcategories->name}}">
                        <button class="bg-blue-600 hover:bg-blue-700 px-2 py-1 rounded ml-2 cursor-pointer">Show</button>
                    </a>
                    <a href="categories/delete/{{$getcategories->id}}" onclick="return confirm('Are you sure you want to delete this quiz?')">
                        <button class="bg-red-600 hover:bg-red-700 px-2 py-1 rounded ml-2 cursor-pointer">Delete</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection


</html>