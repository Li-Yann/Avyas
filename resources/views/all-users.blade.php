@extends('admin')

@section('content')
<div class="space-y-8">

    <!-- Dashboard Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <div class="bg-gray-900 rounded-lg p-6 shadow border border-gray-800">
            <h3 class="text-gray-400 uppercase text-sm">Total Admins</h3>
            <p class="text-3xl font-bold text-blue-400 mt-2">{{ $totalAdmin }}</p>
        </div>

        <div class="bg-gray-900 rounded-lg p-6 shadow border border-gray-800">
            <h3 class="text-gray-400 uppercase text-sm">Total Quizzes</h3>
            <p class="text-3xl font-bold text-green-400 mt-2">{{ $totalQuiz }}</p>
        </div>

        <div class="bg-gray-900 rounded-lg p-6 shadow border border-gray-800">
            <h3 class="text-gray-400 uppercase text-sm">Total Categories</h3>
            <p class="text-3xl font-bold text-yellow-400 mt-2">{{ $totalCategories }}</p>
        </div>

        <div class="bg-gray-900 rounded-lg p-6 shadow border border-gray-800">
            <h3 class="text-gray-400 uppercase text-sm">Total Questions</h3>
            <p class="text-3xl font-bold text-red-400 mt-2">{{ $totalQuestions }}</p>
        </div>

        <div class="bg-gray-900 rounded-lg p-6 shadow border border-gray-800">
            <h3 class="text-gray-400 uppercase text-sm">Quiz Completed</h3>
            <p class="text-3xl font-bold text-green-300 mt-2">{{ $quizCompleted }}</p>
        </div>

        <div class="bg-gray-900 rounded-lg p-6 shadow border border-gray-800">
            <h3 class="text-gray-400 uppercase text-sm">Quiz Incomplete</h3>
            <p class="text-3xl font-bold text-red-400 mt-2">{{ $quizIncompleted }}</p>
        </div>

        <div class="bg-gray-900 rounded-lg p-6 shadow border border-gray-800">
            <h3 class="text-gray-400 uppercase text-sm">Total Users</h3>
            <p class="text-3xl font-bold text-purple-400 mt-2">{{ $totalUsers }}</p>
        </div>

    </div>

    <!-- Users Table -->
    <div class="bg-gray-900 rounded-lg shadow border border-gray-800 overflow-hidden">
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-800">
            <h2 class="text-white text-lg font-semibold">Existing Users</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-800 text-gray-400 uppercase text-sm">
                    <tr>
                        <th class="py-3 px-4">S.N.</th>
                        <th class="py-3 px-4">User Name</th>
                        <th class="py-3 px-4">Email</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @foreach($user as $key => $u)
                    <tr class="hover:bg-gray-800 transition">
                        <td class="py-3 px-4 text-gray-300">{{ $key + 1 }}</td>
                        <td class="py-3 px-4 text-gray-200">{{ $u->name }}</td>
                        <td class="py-3 px-4 text-gray-400">{{ $u->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection