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

    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

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
                <span class="text-lg font-semibold">Quiz Master</span>
                <button class="md:hidden text-white focus:outline-none" @click="open = false">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" stroke="currentColor" fill="none">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="/dashboard"
                    class="flex items-center space-x-2 px-4 py-2 rounded-md hover:bg-gray-800 transition duration-150">
                    <i class="fas fa-home text-blue-400"></i>
                    <span>Dashboard</span>
                </a>
                <a href="/add-quiz"
                    class="flex items-center space-x-2 px-4 py-2 rounded-md hover:bg-gray-800 transition duration-150">
                    <i class="fas fa-clipboard-list text-green-400"></i>
                    <span>Quizzes</span>
                </a>
                <a href="/admin-categories"
                    class="flex items-center space-x-2 px-4 py-2 rounded-md hover:bg-gray-800 transition duration-150">
                    <i class="fas fa-folder text-yellow-400"></i>
                    <span>Categories</span>
                </a>
                <a href="/admin-logout"
                    class="flex items-center space-x-2 px-4 py-2 rounded-md text-red-400 hover:bg-gray-800 hover:text-red-300 transition duration-150">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </nav>
        </nav>

        <!-- Main content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="h-16 bg-white shadow-md flex items-center justify-between px-4 md:px-8">

                <a href="/dashboard" class="flex items-center space-x-3">
                    <img src="{{ asset('images/bulb.png') }}" alt="Logo" class="h-12 w-12">
                    <div class="flex flex-col items-start leading-tight">
                        <span class="text-xl font-bold text-yellow-500">AVYAS Quiz</span>
                    </div>
                </a>

                <div class="ml-auto text-gray-800 font-semibold">
                    Welcome, <span class="text-green-500 text-lg">{{ $name ?? 'Admin' }}</span>
                </div>

                <!-- Mobile menu button -->
                <button class="md:hidden text-gray-700 focus:outline-none ml-4" @click="open = !open">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

            </header>

            <!-- Page content goes here -->
            <main class="p-4">
                @yield('content')
            </main>
        </div>
    </div>

</body>

</html>