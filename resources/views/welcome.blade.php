<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | {{ $company->system_title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-white text-red-800 min-h-screen flex flex-col justify-between">

    <!-- Top Gradient -->
    <div class="w-full h-40 bg-gradient-to-b from-red-100 via-transparent to-transparent absolute top-0 left-0 z-0">
    </div>

    <!-- Bottom Gradient -->
    <div class="w-full h-40 bg-gradient-to-t from-red-100 via-transparent to-transparent absolute bottom-0 left-0 z-0">
    </div>

    <!-- Content Layer -->
    <div class="relative z-10 min-h-screen flex flex-col justify-between">

        <!-- Navbar -->
        <header class="w-full max-w-7xl mx-auto px-6 py-4">
            @if (Route::has('login'))
                <nav class="flex justify-end space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="px-4 py-2 text-sm border border-red-400 text-red-700 rounded hover:bg-red-100 transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 text-sm border border-red-400 text-red-700 rounded hover:bg-red-100 transition">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="px-4 py-2 text-sm border border-red-400 text-red-700 rounded hover:bg-red-100 transition">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <!-- Welcome Content -->
        <main class="flex-1 flex flex-col items-center justify-center text-center px-4 py-12">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4 animate-fade-in-up text-red-700">
                Welcome to {{ $company->name }}
            </h1>
            <p class="text-lg text-red-600 max-w-2xl mb-8 animate-fade-in-up delay-200">
                {{ $company->description }}
            </p>

            <div class="flex flex-col md:flex-row gap-6 animate-fade-in-up delay-300">
                @auth
                    @php
                        $role = Auth::user()->roles->pluck('name')->first();
                        $routeName = $role === 'Human Resource' ? 'hr.dashboard' : strtolower($role) . '.dashboard';
                    @endphp
                    <a href="{{ route($routeName) }}"
                        class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-lg shadow-lg transition transform hover:-translate-y-1 hover:scale-105 duration-300">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-lg shadow-lg transition transform hover:-translate-y-1 hover:scale-105 duration-300">
                        Log In
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="bg-white text-red-600 border border-red-600 hover:bg-red-50 px-8 py-3 rounded-lg shadow-lg transition transform hover:-translate-y-1 hover:scale-105 duration-300">
                            Register
                        </a>
                    @endif
                @endauth
            </div>
        </main>

        <!-- Footer -->
        <footer class="text-center text-sm text-red-400 py-6 border-t border-red-100">
            &copy; {{ date('Y') }} HRMS. All rights reserved.
        </footer>
    </div>

    <!-- Custom Animation Classes -->
    <style>
        .animate-fade-in-up {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-300 {
            animation-delay: 0.3s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</body>

</html>
