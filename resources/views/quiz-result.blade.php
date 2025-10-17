<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navigation -->
    <x-nav-component></x-nav-component>

    <!-- Content Wrapper -->
    <div class="min-h-[calc(100vh-100px)] flex flex-col items-center px-4 py-10">

        <!-- Score Card -->
        <div class="bg-white shadow-md rounded-lg w-full max-w-4xl p-6 text-center mb-8">
            <h2 class="text-2xl font-bold text-yellow-500 mb-2">Quiz Completed!</h2>
            <p class="text-lg text-gray-700">
                You scored <span class="font-semibold text-yellow-600">{{ $correctAnswers }}</span>
                out of <span class="font-semibold">{{ count($resultData) }}</span>
            </p>
        </div>

        <!-- Results Table -->
        <div class="overflow-x-auto w-full max-w-6xl">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="py-3 px-4 text-left">S.N.</th>
                        <th class="py-3 px-4 text-left">Question</th>
                        <th class="py-3 px-4 text-center">Result</th>
                        <th class="py-3 px-4 text-left">Correct Answer</th>
                        <th class="py-3 px-4 text-left">Your Answer</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach($resultData as $key => $record)
                    @php
                    $correctOption = match($record->correct_ans) {
                    'a' => $record->option_a,
                    'b' => $record->option_b,
                    'c' => $record->option_c,
                    'd' => $record->option_d,
                    default => 'N/A'
                    };
                    $selectedOption = match($record->select_answer) {
                    'a' => $record->option_a,
                    'b' => $record->option_b,
                    'c' => $record->option_c,
                    'd' => $record->option_d,
                    default => 'Not Answered'
                    };
                    @endphp
                    <tr class="border-t border-gray-200 hover:bg-gray-50">
                        <td class="py-3 px-4 font-medium text-gray-600">{{ $key + 1 }}</td>
                        <td class="py-3 px-4">{{ $record->question }}</td>
                        <td class="py-3 px-4 text-center">
                            @if($record->is_correct)
                            <span class="inline-block px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full font-medium">
                                Correct
                            </span>
                            @else
                            <span class="inline-block px-2 py-1 text-xs bg-red-100 text-red-700 rounded-full font-medium">
                                Incorrect
                            </span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-gray-700 font-semibold">{{ $correctOption }}</td>
                        <td class="py-3 px-4 text-gray-600">
                            @if($selectedOption === 'Not Answered')
                            <span class="italic text-gray-400">Not Answered</span>
                            @else
                            {{ $selectedOption }}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-10">
            <a href="/"
                class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-3 rounded-full shadow transition">
                Back to Home
            </a>
        </div>
    </div>
</body>

</html>