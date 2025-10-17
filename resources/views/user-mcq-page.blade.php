<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quizName }} : Quiz</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navigation -->
    <x-nav-component></x-nav-component>

    <!-- Quiz Wrapper -->
    <div class="min-h-[calc(100vh-100px)] flex flex-col items-center px-4 py-6">

        <!-- Title -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-yellow-500">{{ $quizName }}</h1>
            <p class="text-sm text-gray-600 mt-1">
                Question {{ session('currentQuiz')['currentMcq'] }} of {{ session('currentQuiz')['totalMcq'] }}
            </p>
        </div>

        <!-- Question Card -->
        <div class="bg-white w-full max-w-3xl rounded-xl shadow p-6 space-y-6">

            <!-- Question -->
            <h2 class="text-xl font-semibold text-gray-900">{{ $mcqData->question }}</h2>

            <!-- MCQ Form -->
            <form action="/submit-mcq/{{ $mcqData->id }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="id" value="{{ $mcqData->id }}">

                @foreach (['a', 'b', 'c', 'd'] as $key)
                    <label for="option_{{ $key }}"
                        class="flex items-center border border-gray-200 px-4 py-3 rounded-xl cursor-pointer hover:bg-gray-50 transition">
                        <input type="radio" id="option_{{ $key }}" name="option" value="{{ $key }}"
                            class="form-radio text-yellow-500 focus:ring-yellow-500" required>
                        <span class="ml-3 text-gray-800">
                            {{ $mcqData->{'option_' . $key} }}
                        </span>
                    </label>
                @endforeach

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 rounded-lg transition">
                    Submit & Next →
                </button>
            </form>

        </div>
    </div>
</body>

</html>
