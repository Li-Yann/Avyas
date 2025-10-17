<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-900 flex items-center justify-center min-h-screen">

    <div class="bg-gray-800 text-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-bold mb-6 text-center">Admin Login</h2>
        @error('admin')
        <div class="text-red-500 text-center">
            {{$message}}
        </div>
        @enderror
        <form action="/admin-login" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="username" class="block text-sm mb-1">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username"
                    class="w-full px-4 py-2 bg-gray-700 text-white border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('username')
                <div class="text-red-500">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm mb-1">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password"
                    class="w-full px-4 py-2 bg-gray-700 text-white border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('password')
                <div class="text-red-500">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 transition-colors py-2 rounded-md font-semibold">Log
                    In</button>
            </div>
        </form>
    </div>

</body>

</html>