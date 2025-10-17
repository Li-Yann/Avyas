<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Categories</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-900 text-white min-h-screen">
    <x-nav-component></x-nav-component>

    <!-- Main Container -->
    <div class="max-w-6xl mx-auto px-6 py-10">
        <h2 class="text-3xl font-bold text-center text-yellow-400 mb-2">Explore Quiz Categories</h2>
        <p class="text-center text-gray-400 mb-8">Choose a category and test your knowledge</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($getCategories as $category)
            <div class="bg-gray-800 rounded-lg shadow-lg p-6 border border-gray-700 hover:border-yellow-400 transition duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-semibold text-yellow-400 border-l-4 border-yellow-400 pl-2">{{ $category->name }}</h3>
                    <span class="bg-green-600 text-white text-xs px-3 py-1 rounded-full">{{ $category->quizzes_count }} Quizzes</span>
                </div>
                <p class="text-gray-400 mb-4">Discover quizzes under this category and challenge yourself.</p>
                <a href="user-show-quiz-list/{{ $category->id }}/{{ $category->name }}">
                    <button class="w-full border border-yellow-400 text-yellow-300 hover:bg-yellow-400 hover:text-gray-900 font-medium py-2 px-4 rounded-md transition duration-300 cursor-pointer">
                        View Quizzes
                    </button>
                </a>
            </div>
            @endforeach