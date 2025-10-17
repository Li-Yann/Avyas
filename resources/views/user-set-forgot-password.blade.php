<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set New Password</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <x-nav-component></x-nav-component>

    <!-- Main Wrapper -->
    <div class="flex items-center justify-center min-h-[calc(100vh-100px)] px-4 py-12">

        <!-- Form Card -->
        <div class="bg-white w-full max-w-md p-8 rounded-xl shadow-md">

            <!-- Heading -->
            <h2 class="text-3xl font-bold text-center text-yellow-500 mb-6">Set a New Password</h2>

            <!-- Form Start -->
            <form action="/user-set-forgot-password" method="POST" class="space-y-5">
                @csrf

                <!-- Hidden Email -->
                <input type="hidden" name="email" value="{{ $email }}">

                <!-- New Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter new password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-yellow-500 focus:border-yellow-500">
                    @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Re-enter password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-yellow-500 focus:border-yellow-500">
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-md font-semibold transition">
                        Update Password
                    </button>
                </div>
            </form>
            <!-- Form End -->

        </div>
    </div>

</body>

</html>