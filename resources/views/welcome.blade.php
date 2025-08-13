<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | {{ $company->system_title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="antialiased font-['Poppins'] theme-app">
    <div class="min-h-screen relative overflow-hidden">

        <!-- Background Gradient + Overlay -->
        <div class="absolute inset-0" style="background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg));"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
        <div class="absolute inset-0 backdrop-blur-sm"></div>

        <!-- Floating Shapes -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-20 left-10 w-32 h-32 rounded-full opacity-10 animate-float-slow" style="background: var(--hover-bg);"></div>
            <div class="absolute top-40 right-20 w-24 h-24 rounded-full opacity-15 animate-float-medium" style="background: var(--secondary-bg);"></div>
            <div class="absolute bottom-32 left-1/4 w-40 h-40 rounded-full opacity-8 animate-float-fast" style="background: var(--primary-border);"></div>
            <div class="absolute bottom-20 right-10 w-28 h-28 rounded-full opacity-12 animate-float-slow" style="background: var(--hover-bg);"></div>
        </div>

        <!-- Header -->
        <header class="relative z-10 w-full py-6 sm:py-8 px-4 lg:px-6">
            <div class="max-w-7xl mx-auto relative z-10 flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-white/20 p-2 flex items-center justify-center">
                        <img src="{{ url('images/logo.png') }}" alt="{{ $company->name }} Logo"
                             class="max-w-full max-h-full object-contain filter brightness-0 invert"
                             onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}'">
                    </div>
                    <span class="text-lg sm:text-xl font-bold" style="color: var(--primary-text);">
                        {{ $company->system_title }}
                    </span>
                </div>
                @auth
                    @php
                        $role = Auth::user()->roles->pluck('name')->first();
                        $routeName = $role === 'Human Resource' ? 'hr.dashboard' : strtolower($role) . '.dashboard';
                    @endphp
                    <a href="{{ route($routeName) }}"
                       class="hidden sm:flex items-center gap-2 px-4 py-2 rounded-lg transition-all duration-300 font-medium text-sm shadow-md"
                       style="background: var(--primary-bg); color: var(--primary-text);"
                       onmouseover="this.style.background='var(--hover-bg)'"
                       onmouseout="this.style.background='var(--primary-bg)'">
                        <i class="fas fa-tachometer-alt w-4 h-4"></i>
                        <span>Dashboard</span>
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="hidden sm:flex items-center gap-2 px-4 py-2 rounded-lg transition-all duration-300 font-medium text-sm shadow-md"
                       style="background: var(--primary-bg); color: var(--primary-text);"
                       onmouseover="this.style.background='var(--hover-bg)'"
                       onmouseout="this.style.background='var(--primary-bg)'">
                        <i class="fas fa-sign-in-alt w-4 h-4"></i>
                        <span>Sign In</span>
                    </a>
                @endauth
            </div>
        </header>

        <!-- Main -->
        <main class="relative z-10 flex flex-col items-center justify-center px-4 lg:px-6 py-12">
            <!-- Hero -->
            <div class="text-center max-w-4xl mx-auto mb-12">
                <div class="flex flex-col lg:flex-row items-center justify-center gap-6 lg:gap-12 mb-8">
                    <div class="relative w-24 h-24 md:w-32 md:h-32 lg:w-36 lg:h-36 rounded-full bg-white/20 p-4 flex items-center justify-center">
                        <img src="{{ url('images/logo.png') }}" alt="{{ $company->name }} Logo"
                             class="max-w-full max-h-full object-contain filter brightness-0 invert"
                             onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}'">
                    </div>
                    <div class="text-center lg:text-left">
                        <h1 class="text-3xl lg:text-5xl font-bold mb-2" style="color: var(--primary-text);">
                            Welcome to
                        </h1>
                        <h2 class="text-2xl lg:text-4xl font-bold" style="color: var(--secondary-text);">
                            {{ $company->name }}
                        </h2>
                    </div>
                </div>
                <p class="text-base lg:text-lg font-light mb-8" style="color: var(--secondary-text);">
                    {{ $company->description }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    @auth
                        <a href="{{ route($routeName) }}"
                           class="px-6 py-3 rounded-xl font-bold shadow-lg transition-all duration-300"
                           style="background: var(--primary-bg); color: var(--primary-text);"
                           onmouseover="this.style.background='var(--hover-bg)'"
                           onmouseout="this.style.background='var(--primary-bg)'">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="px-6 py-3 rounded-xl font-bold shadow-lg transition-all duration-300"
                           style="background: var(--primary-bg); color: var(--primary-text);"
                           onmouseover="this.style.background='var(--hover-bg)'"
                           onmouseout="this.style.background='var(--primary-bg)'">
                            Sign In
                        </a>
                    @endauth
                    <a href="#features"
                       class="px-6 py-3 rounded-xl shadow-md bg-white/90 text-gray-700 border border-white/20 hover:bg-white transition-all duration-300">
                        Learn More
                    </a>
                </div>
            </div>

            <!-- Features -->
            <div id="features" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white/20 rounded-2xl p-6 shadow-lg hover:scale-105 transition-all duration-300 border border-white/30">
                    <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4" style="background: var(--primary-bg);">
                        <i class="fas fa-shield-alt text-lg" style="color: var(--primary-text);"></i>
                    </div>
                    <h3 class="text-lg font-bold mb-3" style="color: var(--primary-text);">Secure & Reliable</h3>
                    <p class="text-sm" style="color: var(--secondary-text);">Enterprise-grade security with reliable performance for your business operations.</p>
                </div>
                <div class="bg-white/20 rounded-2xl p-6 shadow-lg hover:scale-105 transition-all duration-300 border border-white/30">
                    <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4" style="background: var(--primary-bg);">
                        <i class="fas fa-users text-lg" style="color: var(--primary-text);"></i>
                    </div>
                    <h3 class="text-lg font-bold mb-3" style="color: var(--primary-text);">User-Friendly</h3>
                    <p class="text-sm" style="color: var(--secondary-text);">Intuitive interface designed for seamless user experience across all devices.</p>
                </div>
                <div class="bg-white/20 rounded-2xl p-6 shadow-lg hover:scale-105 transition-all duration-300 border border-white/30">
                    <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4" style="background: var(--primary-bg);">
                        <i class="fas fa-chart-line text-lg" style="color: var(--primary-text);"></i>
                    </div>
                    <h3 class="text-lg font-bold mb-3" style="color: var(--primary-text);">Analytics & Insights</h3>
                    <p class="text-sm" style="color: var(--secondary-text);">Comprehensive reporting and analytics to drive informed business decisions.</p>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="relative z-10 w-full py-4 px-4 lg:px-6 mt-12">
            <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center">
                <span class="text-sm" style="color: var(--secondary-text);">&copy; {{ date('Y') }} {{ $company->name }}. All rights reserved.</span>
                <div class="flex items-center space-x-6">
                    <a href="#" style="color: var(--secondary-text);" class="hover:scale-110 transition-all duration-300"><i class="fab fa-twitter text-lg"></i></a>
                    <a href="#" style="color: var(--secondary-text);" class="hover:scale-110 transition-all duration-300"><i class="fab fa-linkedin text-lg"></i></a>
                    <a href="#" style="color: var(--secondary-text);" class="hover:scale-110 transition-all duration-300"><i class="fab fa-facebook text-lg"></i></a>
                </div>
            </div>
        </footer>
    </div>

    <style>
        @keyframes float-slow {0%,100%{transform:translateY(0)}50%{transform:translateY(-20px)}} 
        @keyframes float-medium {0%,100%{transform:translateY(0)}50%{transform:translateY(-15px)}} 
        @keyframes float-fast {0%,100%{transform:translateY(0)}50%{transform:translateY(-10px)}}
        .animate-float-slow {animation: float-slow 6s ease-in-out infinite;}
        .animate-float-medium {animation: float-medium 4s ease-in-out infinite;}
        .animate-float-fast {animation: float-fast 3s ease-in-out infinite;}
    </style>
</body>
</html>
