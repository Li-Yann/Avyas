<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Quiz</title>
</head>

@extends('admin')

@section('content')

@if(Session::has('quizSec'))
<div id="flash-message" class="bg-green-800 text-white px-4 py-2 rounded mb-4">
    {{ Session::get('quizSec') }}
</div>

@endif
@if(Session::has('quizErr'))
<div id="flash-message" class="bg-red-800 text-white px-4 py-2 rounded mb-4">
    {{ Session::get('quizErr') }}
</div>
@endif

<script>
    setTimeout(() => {
        const msg = document.getElementById('flash-message');
        if (msg) {
            msg.style.transition = 'opacity 0.5s ease';
            msg.style.opacity = '0';
            setTimeout(() => msg.remove(), 500);
        }
    }, 900);
</script>

@error('quiz_name')
<div class="text-red-500 text-center">
    {{$message}}
</div>
@enderror

<div class="flex flex-col items-center gap-10">
    <!-- Quiz Name -->
    <form action="/add-quiz" method="POST" class="flex items-end gap-4">
        @csrf
        <div>
            <label for="quiz_category" class="block text-sm font-medium text-black mb-1">
                Select Category
            </label>
            <select name="quiz_category" id="quiz_category"
                class="w-60 px-4 py-2 rounded-md border border-gray-600 bg-white text-black focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
                <option value="" disabled selected>Select Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="quiz_name" class="block text-sm font-medium text-black mb-1">
                Quiz Name
            </label>
            <input type="text" id="quiz_name" name="quiz_name" placeholder="Add Quiz Name"
                class="w-full px-4 py-2 rounded-md border border-gray-600 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <button type="submit"
                class=" bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md">
                Add Quiz
            </button>
        </div>
    </form>

    <div class="overflow-x-auto w-full">
        <h1 class="text-2xl font-semibold text-gray-800 mb-4">Existing Quizzes</h1>

        <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md">
            <thead class="bg-gray-100 text-sm text-gray-900 uppercase tracking-wider">
                <tr>
                    <th class="py-3 px-4 text-left border-b">S.No</th>
                    <th class="py-3 px-4 text-left border-b">Name</th>
                    <th class="py-3 px-4 text-left border-b">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 text-gray-800">
                @foreach($quizList as $index => $quiz)
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-4 px-4">{{ $index + 1 }}</td>
                    <td class="py-4 px-4 font-medium">{{ $quiz->name }}</td>
                    <td class="py-4 px-4">
                        <a href="/show-mcq/{{ $quiz->id }}/{{ $quiz->name }}">
                            <button class="cursor-pointer bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded transition">
                                Show
                            </button>
                        </a>
                        <a href="/quiz-list/delete/{{ $quiz->id }}" onclick="return confirm('Are you sure you want to delete this quiz?')">
                            <button class="cursor-pointer bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded transition">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>



@endsection

</html>