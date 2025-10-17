<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Category Quizzes</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-900 text-white min-h-screen">
    <x-nav-component></x-nav-component>

    <div class="max-w-6xl mx-auto px-6 py-10">

        <!-- Category Title -->
        <h2 class="text-3xl font-bold text-yellow-400 mb-8 text-center">
            Quizzes in "{{ $category }}"
        </h2>

        <!-- Quizzes Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($quizList as $index => $quiz)
            <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-yellow-500/30 transition-transform hover:-translate-y-1">
                <div class="mb-3">
                    <h3 class="text-xl font-semibold text-yellow-300">{{ $quiz->name }}</h3>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <span class="text-sm text-gray-300">Questions: <strong>{{ $quiz->mcq_count }}</strong></span>
                    <a href="/start-quiz/{{ $quiz->id }}/{{ $quiz->name }}">
                        <button class="bg-yellow-400 text-gray-900 font-medium py-2 px-4 rounded hover:bg-yellow-500 transition cursor-pointer">
                            Start
                        </button>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Back Button -->
        <div class="mt-10 text-center">
            <a href="/user-categories" class="inline-block bg-blue-900 hover:bg-blue-950 text-white font-medium py-2 px-6 rounded shadow-sm transition cursor-pointer">
                Back
            </a>
        </div>

    </div>
</body>

</html>