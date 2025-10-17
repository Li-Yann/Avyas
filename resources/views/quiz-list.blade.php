<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Quiz Section</title>
</head>

@extends('admin')

@section('content')

@if(Session::has('category'))
<div id="flash-message" class="bg-green-800 text-white px-4 py-2 rounded mb-4">
    {{ Session::get('category') }}
</div>

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



<div class="bg-white p-6 mt-10 rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Quiz Category:{{$category}}
    </h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-sm text-gray-900 uppercase tracking-wider">
                <tr>
                    <th class="py-3 px-4 text-left border-b">S.No</th>
                    <th class="py-3 px-4 text-left border-b">Name</th>
                    <th class="py-3 px-4 text-left border-b">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-gray-1000">
                @foreach($quizList as $index => $quizList)
                <tr class="hover:bg-gray-50">
                    <td class="py-4 px-4">{{ $index + 1 }}</td>
                    <td class="py-4 px-4">{{ $quizList->name }}</td>
                    <td class="py-4 px-4">
                        <a href="/show-mcq/{{$quizList->id}}/{{$quizList->name}}">
                            <button class="cursor-pointer inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded shadow-sm transition">Show</button>
                        </a>
                        <a href="/quiz-list/delete/{{$quizList->id}}" onclick="return confirm('Are you sure you want to delete this quiz?')">
                            <button class="cursor-pointer inline-block bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-6 rounded shadow-sm transition">Delete</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6 text-center">
        <a href="/admin-categories" class="inline-block bg-blue-900 hover:bg-blue-950 text-white font-medium py-2 px-6 rounded shadow-sm transition">
            Existing Categories
        </a>
    </div>
</div>


@endsection


</html>