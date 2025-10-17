<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Quiz Status</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <x-nav-component></x-nav-component>

    <!-- Page Content -->
    <div class="min-h-[calc(100vh-100px)] flex flex-col items-center px-4 py-10">
        <div class="w-full max-w-4xl bg-white rounded-xl shadow-md p-6">

            <h2 class="text-2xl font-bold text-center text-yellow-500 mb-6">User Quiz Status</h2>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-200 uppercase text-gray-700">
                        <tr>
                            <th class="py-3 px-4">S.N.</th>
                            <th class="py-3 px-4">Name</th>
                            <th class="py-3 px-4 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($quizRecord as $key => $record)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-3 px-4">{{ $key + 1 }}</td>
                            <td class="py-3 px-4">{{ $record->name }}</td>
                            <td class="py-3 px-4 text-center">
                                @if($record->status == 2)
                                <span class="inline-block px-3 py-1 text-xs bg-green-100 text-green-700 rounded-full font-medium">
                                    Completed
                                </span>
                                @else
                                <span class="inline-block px-3 py-1 text-xs bg-red-100 text-red-600 rounded-full font-medium">
                                    Not Completed
                                </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>

</html>