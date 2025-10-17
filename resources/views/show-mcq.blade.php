<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCQs Section Display</title>
</head>

@extends('admin')

@section('content')

<!-- Simple Structure -->
<!-- <div class="bg-white p-6 mt-10 rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Existing Questions - {{ $quizName }}</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-6 text-left text-sm font-medium text-gray-600 uppercase tracking-wider border-b">MCQ ID</th>
                    <th class="py-3 px-6 text-left text-sm font-medium text-gray-600 uppercase tracking-wider border-b">Question</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($mcqs as $mcq)
                <tr class="hover:bg-gray-50">
                    <td class="py-4 px-6 text-gray-700">{{ $mcq->id }}</td>
                    <td class="py-4 px-6 text-gray-700">{{ $mcq->question }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6 text-center">
        <a href="/add-mcq" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded shadow-sm transition">
            ← Back to Quiz
        </a>
    </div>
</div> -->

<!-- Complete Structure -->
<div class="bg-white p-6 mt-10 rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Quiz Name:{{ $quizName }}</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-sm text-gray-900 uppercase tracking-wider">
                <tr>
                    <th class="py-3 px-5 text-left border-b">S.No</th>
                    <th class="py-3 px-5 text-left border-b">Question</th>
                    <th class="py-3 px-5 text-left border-b">Option A</th>
                    <th class="py-3 px-5 text-left border-b">Option B</th>
                    <th class="py-3 px-5 text-left border-b">Option C</th>
                    <th class="py-3 px-5 text-left border-b">Option D</th>
                    <th class="py-3 px-5 text-left border-b">Correct Answer</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-gray-1000">
                @foreach($mcqs as $index => $mcq)
                <tr class="hover:bg-gray-50">
                    <td class="py-4 px-4">{{ $index + 1 }}</td>
                    <td class="py-4 px-4">{{ $mcq->question }}</td>
                    <td class="py-4 px-4">{{ $mcq->option_a }}</td>
                    <td class="py-4 px-4">{{ $mcq->option_b }}</td>
                    <td class="py-4 px-4">{{ $mcq->option_c }}</td>
                    <td class="py-4 px-4">{{ $mcq->option_d }}</td>
                    <td class="py-4 px-4 font-semibold text-green-600">{{ strtoupper($mcq->correct_ans) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ url()->previous() }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded shadow-sm transition">
            Back to Quiz Category
        </a>
    </div>
</div>


@endsection


</html>