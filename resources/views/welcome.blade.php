<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | {{ $company->system_title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="antialiased bg-gray-50 text-gray-800 h-screen overflow-hidden font-['Poppins']">

    <!-- Single Window Layout -->
    <div class="h-screen flex flex-col justify-center items-center px-6 py-8">
        
        <!-- Logo and Title in One Line -->
        <div class="flex items-center justify-center mb-12">
            <!-- Bigger Logo with Shadow -->
            <div class="w-40 h-40 header-gradient rounded-2xl shadow-2xl p-5 flex items-center justify-center mr-10 flex-shrink-0 border border-gray-200">
                <img 
                    src="{{ url('images/logo.png') }}" 
                    alt="{{ $company->name }} Logo" 
                    class="max-w-full max-h-full object-contain drop-shadow-lg"
                    onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}'"
                >
            </div>
            
            <!-- Title Beside Logo -->
            <div class="text-left">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-800 leading-tight">
                    Welcome to
                </h1>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold">
                    <span class="bg-gradient-to-r from-red-500 to-red-400 bg-clip-text text-transparent">
                        {{ $company->name }}
                    </span>
                </h2>
            </div>
        </div>

        <!-- Company Description -->
        <div class="max-w-4xl text-center mb-12">
            <p class="text-xl md:text-2xl text-gray-600 leading-relaxed">
                {{ $company->description }}
            </p>
        </div>

        <!-- Centered Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-8">
            @auth
                @php
                    $role = Auth::user()->roles->pluck('name')->first();
                    $routeName = $role === 'Human Resource' ? 'hr.dashboard' : strtolower($role) . '.dashboard';
                @endphp
                <a href="{{ route($routeName) }}"
                    class="px-10 py-4 bg-gradient-to-r from-red-500 to-red-400 text-white text-xl font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:from-red-600 hover:to-red-500 text-center min-w-48">
                    Go to Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="px-10 py-4 bg-gradient-to-r from-red-500 to-red-400 text-white text-xl font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:from-red-600 hover:to-red-500 text-center min-w-48">
                    Log In
                </a>
                
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="px-10 py-4 bg-white text-red-500 border-2 border-red-500 text-xl font-semibold rounded-lg shadow-lg hover:bg-red-50 transition-all duration-300 text-center min-w-48">
                        Register
                    </a>
                @endif
            @endauth
        </div>

        <!-- Compact Footer -->
        <div class="text-center">
            <span class="text-sm text-gray-500">&copy; {{ date('Y') }} {{ $company->name }}. All rights reserved.</span>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        .header-gradient {
            background: linear-gradient(135deg, #ff2626, #ff6969);
        }

        /* Gradient text support */
        .bg-clip-text {
            -webkit-background-clip: text;
            background-clip: text;
        }

        /* Prevent scrolling */
        html, body {
            overflow: hidden;
            height: 100%;
        }

        /* Enhanced shadow for logo */
        .shadow-2xl {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        /* Drop shadow for logo image */
        .drop-shadow-lg {
            filter: drop-shadow(0 10px 8px rgba(0, 0, 0, 0.04)) drop-shadow(0 4px 3px rgba(0, 0, 0, 0.1));
        }

        /* Smooth transitions */
        * {
            transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</body>

</html>