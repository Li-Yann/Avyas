<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    @vite('resources/css/app.css')

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <div x-data="{ open: false }" class="min-h-screen flex flex-col md:flex-row">

        <!-- Sidebar -->
        <nav :class="{'block': open, 'hidden': !open}"
            class="md:block w-full md:w-64 bg-gray-800 text-white shadow-lg md:shadow-none md:relative z-20">
            <div class="flex items-center justify-between md:justify-center h-16 px-4 border-b border-gray-700">
                <span class="text-lg font-semibold">Admin Panel</span>
                <button class="md:hidden text-white focus:outline-none" @click="open = false">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" stroke="currentColor" fill="none">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <ul class="p-4 space-y-2">
                <li><a href="/dashboard" class="block px-3 py-2 rounded hover:bg-gray-700 transition">Dashboard</a></li>
                <li><a href="/add-quiz" class="block px-3 py-2 rounded hover:bg-gray-700 transition">Quiz</a></li>
                <li><a href="/admin-categories" class="block px-3 py-2 rounded hover:bg-gray-700 transition">Categories</a></li>
                <li><a href="/admin-logout"
                        class="block px-3 py-2 rounded text-red-400 hover:bg-gray-700 transition">Logout</a></li>
            </ul>
        </nav>

        <!-- Main content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="h-16 bg-white shadow-md flex items-center justify-between md:justify-start px-4 md:px-6">
                <button class="md:hidden text-gray-600 focus:outline-none" @click="open = !open">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <h1 class="text-lg font-semibold text-gray-800 ml-0 md:ml-4">Welcome {{ $name ?? '' }},</h1>
            </header>

            <!-- Page content goes here -->
            <main class="p-4">
                @yield('content')
            </main>
        </div>
    </div>

</body>

</html>