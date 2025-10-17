<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Section</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-900 text-white min-h-screen">
    <x-nav-component></x-nav-component>

    <!-- Content Wrapper -->
    <div class="max-w-6xl mx-auto px-6 py-10">

        <!-- Search Form -->
        <form action="/search-quiz" method="GET" class="mb-10">
            <div class="relative">
                <input
                    type="text"
                    name="search"
                    value=""
                    placeholder="Search topics..."
                    class="w-full pl-10 pr-4 py-3 rounded-md border border-gray-700 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" />

                <button type="submit" class="absolute right-3 top-3 text-gray-400 hover:text-yellow-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </form>

        <!-- Quiz Cards Grid -->
        <h2 class="text-2xl font-bold text-yellow-400 mb-6 text-center">Available Quizzes</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($quizList as $index => $quiz)
            <div class="bg-gray-800 rounded-lg shadow-md p-6 hover:shadow-yellow-400/40 transition-transform hover:-translate-y-1">
                <div class="mb-4">
                    <h3 class="text-xl font-semibold text-yellow-300">{{ $quiz->name }}</h3>
                </div>

                <div class="flex justify-between items-center mt-4">
                    <span class="text-sm text-gray-300">Questions: <strong>{{ $quiz->mcq_count }}</strong></span>
                    <a href="/start-quiz/{{ $quiz->id }}/{{ $quiz->name }}">
                        <button class="bg-yellow-400 text-gray-900 font-semibold px-4 py-2 rounded hover:bg-yellow-500 transition duration-200 cursor-pointer">
                            Start
                        </button>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>