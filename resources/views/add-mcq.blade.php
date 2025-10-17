<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCQ Section</title>
</head>

@extends('admin')

@section('content')

<!-- Flash Success Message -->
@if(Session::has('quizSec'))
<div id="flash-message" class="bg-green-800 text-white px-4 py-2 rounded mb-4">
    {{ Session::get('quizSec') }}
</div>
@endif

@if(Session::has('quizInfo'))
<div id="flash-message" class="bg-yellow-500 text-white px-4 py-2 rounded mb-4">
    {{ Session::get('quizInfo') }}
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
    }, 950);
</script>

<div class="max-w-3xl mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Create MCQ for "{{ $quizName }}"</h1>

    <!-- MCQ Form -->
    <form action="/add-mcq" method="POST" class="space-y-6 bg-white p-6 rounded shadow">
        @csrf

        @if($mcqNo>1)
        <div>
            <a class="block text-sm font-medium text-green-700" href="/show-mcq/{{ session('quizSession')->id}}/{{ session('quizSession')->name}}">Display MCQs Section</a>

        </div>
        @endif

        <div>
            <label for="question" class="block text-sm font-medium text-gray-700">Enter Question {{$mcqNo}}:</label>
            <textarea name="question" id="question" required
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-blue-300"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Options</label>

            <div class="grid grid-cols-1 gap-2">
                <input type="text" name="option_a" placeholder="Option A" required class="p-2 border rounded">
                <input type="text" name="option_b" placeholder="Option B" required class="p-2 border rounded">
                <input type="text" name="option_c" placeholder="Option C" required class="p-2 border rounded">
                <input type="text" name="option_d" placeholder="Option D" required class="p-2 border rounded">
            </div>
        </div>

        <!-- Correct Answer -->
        <div>
            <label for="correct_ans" class="block text-sm font-medium text-gray-700">Correct Answer</label>
            <select name="correct_ans" id="correct_ans" required
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-blue-300">
                <option value="" disabled selected>Select Correct Option</option>
                <option value="a">Option A</option>
                <option value="b">Option B</option>
                <option value="c">Option C</option>
                <option value="d">Option D</option>
            </select>
        </div>

        <div class="flex gap-4">
            <button type="submit" name="submit" value="next" class="bg-blue-600 hover:bg-blue-600 text-white px-6 py-2 rounded">
                Next
            </button>

            <button type="submit" name="submit" value="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">
                Submit All
            </button>
        </div>
    </form>
</div>

@endsection

</html>