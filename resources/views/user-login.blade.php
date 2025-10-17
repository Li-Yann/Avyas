<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navigation -->
    <x-nav-component></x-nav-component>

    <!-- Flash Success Message -->
    @if(Session::has('message-success'))
    <div id="flash-message" class="bg-green-500 text-white px-4 py-2 rounded-md shadow-md max-w-md mx-auto mt-6 text-center">
        {{ Session::get('message-success') }}
    </div>
    @endif

    <script>
        setTimeout(() => {
            const msg = document.getElementById('flash-message');
            if (msg) {
                msg.style.transition = 'opacity 0.5s ease';
                msg.style.opacity = '0';
                setTimeout(() => msg.remove(), 500);
            }
        }, 2000);
    </script>

    <!-- Login Form -->
    <div class="flex items-center justify-center min-h-[calc(100vh-100px)] px-4 py-12">
        <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">

            <h2 class="text-3xl font-bold text-center text-yellow-500 mb-6">Login to Your Account</h2>

            <form action="/user-login" method="POST" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email"
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-yellow-500 focus:border-yellow-500">
                    @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password"
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-yellow-500 focus:border-yellow-500">
                    @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Login Error -->
                @if(session('message-error'))
                <div class="text-sm text-red-500 text-center">
                    {{ session('message-error') }}
                </div>
                @endif

                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-md font-semibold transition">
                        Log In
                    </button>
                </div>

                <!-- Forgot password -->
                <div class="text-center mt-4">
                    <a href="/user-forgot-password" class="text-sm text-black hover:underline">
                        Forgot Password?
                    </a>
                </div>
            </form>

        </div>
    </div>

</body>

</html>