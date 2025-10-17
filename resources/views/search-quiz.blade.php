<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Quiz</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <x-nav-component></x-nav-component>

    <!-- Page Container -->
    <div class="container mx-auto px-4 py-12">

        <!-- Title -->
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-yellow-500">Search Results for: <span class="text-gray-800">{{ $quiz }}</span></h2>
        </div>

        <!-- Table Wrapper -->
        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100 text-sm font-semibold text-gray-700 uppercase">
                    <tr>
                        <th class="px-6 py-3 text-left">S.No</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Total Questions</th>
                        <th class="px-6 py-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($quizData as $index => $quizData)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 font-medium text-gray-800">{{ $quizData->name }}</td>
                        <td class="px-6 py-4">{{ $quizData->mcq_count }}</td>
                        <td class="px-6 py-4">
                            <a href="/start-quiz/{{ $quizData->id }}/{{ $quizData->name }}">
                                <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md text-sm font-semibold transition">
                                    Start
                                </button>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-6 text-gray-500">No quizzes found for "{{ $quiz }}"</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Back Button -->
        <div class="text-center mt-8">
            <a href="/user-show-quiz"
                class="inline-block bg-gray-800 hover:bg-gray-900 text-white px-6 py-2 rounded-md font-medium transition">
                ← Back to All Quizzes
            </a>
        </div>

    </div>

</body>

</html>