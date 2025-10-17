<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Quiz: {{ $quizName }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-900 text-white min-h-screen">
    <x-nav-component></x-nav-component>

    <div class="flex flex-col items-center justify-center px-4 min-h-[calc(100vh-100px)]">

        <div class="bg-gray-800 max-w-2xl w-full p-8 mt-6 rounded-xl shadow-lg text-center">

            <h1 class="text-3xl font-bold text-yellow-400 mb-4">
                Ready to Test Your Knowledge?
            </h1>

            <p class="text-gray-400 italic mb-6">
                "Believe in yourself. Believe in the process."
            </p>

            <div class="mb-6 space-y-2">
                <h2 class="text-xl font-semibold text-gray-300">
                    Quiz Topic: <span class="text-yellow-300">{{ $quizName }}</span>
                </h2>
                <h2 class="text-xl font-semibold text-gray-300">
                    Total Questions: <span class="text-yellow-300">{{ $quizCount }}</span>
                </h2>
            </div>

            @if(session('user'))
            <a href="/user-mcq/{{ session('firstMCQ')->id . '/' . $quizName }}"
                class="inline-block bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold px-6 py-2 rounded-md text-lg transition duration-200 cursor-pointer">
                Start Quiz
            </a>
            @else
            <p class="text-sm text-gray-400 mb-4">Make sure you are logged in or signup before starting.</p>
            <div class="flex justify-center gap-4">
                <a href="/user-signup-quiz"
                    class="bg-blue-700 hover:bg-blue-800 text-white px-5 py-2 rounded-md font-medium transition cursor-pointer">
                    Sign Up
                </a>
                <a href="/user-login-quiz"
                    class="bg-blue-700 hover:bg-blue-800 text-white px-5 py-2 rounded-md font-medium transition cursor-pointer">
                    Log In
                </a>
            </div>
            @endif

        </div>
    </div>
</body>

</html>