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

<div class="flex justify-center">
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
</div>



@endsection

</html>