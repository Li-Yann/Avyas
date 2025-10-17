<nav class="bg-gray-600 shadow-md px-6 py-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between">

        <!-- Logo Section -->
        <a href="/" class="flex items-center space-x-3">
            <img src="{{ asset('images/bulb.png') }}" alt="Logo" class="h-12 w-12">
            <div class="flex flex-col items-start text-white leading-tight">
                <span class="text-xl font-bold text-yellow-500">AVYAS Quiz</span>
            </div>
        </a>

        <!-- Navigation Links -->
        <div class="items-center space-x-6 text-white font-semibold text-lg">
            <a href="/" class="hover:text-blue-400 transition">Home</a>
            <a href="/user-show-quiz" class="hover:text-blue-400 transition">Quiz</a>
            <a href="/user-categories" class="hover:text-blue-400 transition">Categories</a>

            @if(session('user'))
            <a href="/user-details" class="hover:text-green-400 transition">
                Welcome, {{ session('user')->name }}
            </a>
            <a href="/user-logout" class="hover:text-red-400 transition">Logout</a>
            @else
            <a href="/user-login" class="hover:text-blue-400 transition">Login</a>
            <a href="/user-signup" class="hover:text-blue-400 transition">Signup</a>
            @endif
        </div>

</nav>