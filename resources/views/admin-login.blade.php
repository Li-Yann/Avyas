<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Quiz App</title>
    @vite('resources/css/app.css')

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-black flex items-center justify-center min-h-screen font-[Poppins]">

    <div class="bg-gray-800/80 backdrop-blur-lg p-10 rounded-2xl shadow-2xl w-full max-w-md border border-gray-700">
        <!-- Logo / Title -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-yellow-500 tracking-wide">AVYAS Quiz</h1>
            <p class="text-gray-400 mt-2 text-sm">Login to manage your quiz platform</p>
            <h1 class="text-blue-400 mt-3 text-2xl">Admin Panel</h1>
        </div>

        <!-- Error Message -->
        @error('admin')
        <div class="bg-red-600/20 border border-red-600 text-red-400 px-4 py-2 rounded-md mb-4 text-center">
            {{$message}}
        </div>
        @enderror

        <!-- Login Form -->
        <form action="/admin-login" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="username" class="block text-gray-300 mb-1 text-sm">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username"
                    class="w-full px-4 py-2.5 bg-gray-900/70 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                @error('username')
                <div class="text-red-500 text-sm mt-1">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-gray-300 mb-1 text-sm">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password"
                    class="w-full px-4 py-2.5 bg-gray-900/70 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                @error('password')
                <div class="text-red-500 text-sm mt-1">{{$message}}</div>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-md shadow-md transition-all duration-200">
                Sign In
            </button>
        </form>
    </div>

    <!-- Background Glow -->
    <!-- <div class="absolute w-96 h-96 bg-blue-500/30 rounded-full blur-3xl top-20 right-20 animate-pulse"></div>
    <div class="absolute w-80 h-80 bg-purple-500/20 rounded-full blur-3xl bottom-20 left-20 animate-pulse"></div> -->

</body>

</html>