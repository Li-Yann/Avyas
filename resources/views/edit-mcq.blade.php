<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit MCQ</title>
</head>

@extends('admin')

@section('content')

@if(Session::has('quizInfo'))
<div id="flash-message" class="bg-green-800 text-white px-4 py-2 rounded mb-4">
    {{ Session::get('quizInfo') }}
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

<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-6">Edit MCQ for "{{ $quizName }}"</h2>

    <form action="{{ url('/update-mcq/'.$mcq->id.'/'.$quizName) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium text-gray-700">Question:</label>
            <textarea name="question" required class="w-full border p-2 rounded">{{ $mcq->question }}</textarea>
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1">Options</label>
            <input type="text" name="option_a" value="{{ $mcq->option_a }}" class="w-full border p-2 rounded mb-2" required>
            <input type="text" name="option_b" value="{{ $mcq->option_b }}" class="w-full border p-2 rounded mb-2" required>
            <input type="text" name="option_c" value="{{ $mcq->option_c }}" class="w-full border p-2 rounded mb-2" required>
            <input type="text" name="option_d" value="{{ $mcq->option_d }}" class="w-full border p-2 rounded mb-2" required>
        </div>

        <div>
            <label class="block font-medium text-gray-700">Correct Answer</label>
            <select name="correct_ans" class="w-full border p-2 rounded" required>
                <option value="a" {{ $mcq->correct_ans == 'a' ? 'selected' : '' }}>Option A</option>
                <option value="b" {{ $mcq->correct_ans == 'b' ? 'selected' : '' }}>Option B</option>
                <option value="c" {{ $mcq->correct_ans == 'c' ? 'selected' : '' }}>Option C</option>
                <option value="d" {{ $mcq->correct_ans == 'd' ? 'selected' : '' }}>Option D</option>
            </select>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">
                Update
            </button>
            <a href="{{ url('/show-mcq/'.$mcq->quiz_id.'/'.$quizName) }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded">
                Cancel
            </a>
        </div>
    </form>
</div>

@endsection

</html>