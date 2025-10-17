<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-nav-component></x-nav-component>

    @if(Session::has('message-success'))
    <div id="flash-message" class="bg-green-800 text-white px-4 py-2 rounded mb-4">
        {{ Session::get('message-success') }}
    </div>
    @endif

    <script>
        setTimeout(() => {
            const msg = document.getElementById('flash-message');
            if (msg) {
                msg.style.transition = 'opacity 0.5s ease';
                msg.style.opacity = '0';
                setTimeout(() => msg.remove(), 700);
            }
        }, 1100);
    </script>

    <div class="min-h-[calc(100vh-100px)] bg-gray-100 flex items-center justify-center px-4">
        <div class="max-w-5xl w-full text-center text-gray-800 space-y-6">

            <!-- Logo + Title -->
            <div class="flex flex-col items-center space-y-2">
                <img src="{{ asset('images/bulb.png') }}" alt="Logo" class="h-20 w-20">
                <h1 class="text-4xl md:text-5xl font-bold">Welcome to <span class="text-yellow-500">AVYAS QUIZ</span></h1>
            </div>

            <!-- Subtitle -->
            <p class="text-lg md:text-xl text-gray-600">
                Practice curated model question sets for <span class="text-yellow-500 font-semibold">BIT, BITM, and BBA</span> entrance exams in Nepal.
            </p>

            <!-- Features -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-10">
                <!-- BIT -->
                <div class="bg-white border border-gray-200 p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold text-yellow-500">BIT</h3>
                    <p class="text-gray-600 mt-2 text-sm">Strengthen your fundamentals in logic, math, and problem-solving.</p>
                </div>
                <!-- BITM -->
                <div class="bg-white border border-gray-200 p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold text-yellow-500">BITM</h3>
                    <p class="text-gray-600 mt-2 text-sm">Tackle data interpretation, business logic, and ICT fundamentals.</p>
                </div>
                <!-- BBA -->
                <div class="bg-white border border-gray-200 p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold text-yellow-500">BBA</h3>
                    <p class="text-gray-600 mt-2 text-sm">Practice aptitude, verbal, and general business awareness.</p>
                </div>
            </div>

            <!-- CTA -->
            <div class="mt-10">
                <a href="/user-show-quiz" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-3 rounded-full text-lg transition shadow-md">
                    Start Practicing →
                </a>
            </div>

        </div>
    </div>

</body>

</html>