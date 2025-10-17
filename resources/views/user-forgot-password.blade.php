<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <x-nav-component></x-nav-component>

    <!-- Page Content -->
    <div class="flex items-center justify-center min-h-[calc(100vh-100px)] px-4 py-12">

        <!-- Form Card -->
        <div class="bg-white w-full max-w-md p-8 rounded-xl shadow-md">

            <!-- Title -->
            <h2 class="text-3xl font-bold text-center text-yellow-500 mb-6">Forgot Password?</h2>

            <!-- Info -->
            <p class="text-sm text-center text-gray-600 mb-6">
                Enter your registered email address, and we'll send you a password reset link.
            </p>

            <!-- Form -->
            <form action="/user-forgot-password" method="POST" class="space-y-5">
                @csrf

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                    @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-md font-semibold transition">
                        Send Reset Link
                    </button>
                </div>

                <!-- Back to login -->
                <div class="text-center mt-4">
                    <a href="/user-login" class="text-sm text-yellow-500 hover:underline">← Back to login</a>
                </div>
            </form>

        </div>
    </div>

</body>

</html>