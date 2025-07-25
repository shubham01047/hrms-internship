<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | {{ $company->system_title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="antialiased min-h-screen overflow-x-hidden">
    <!-- Animated Background -->
    <div class="fixed inset-0 z-0">
        <!-- Primary Gradient Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-red-50 via-white to-red-100"></div>
        
        <!-- Animated Gradient Overlays -->
        <div class="absolute inset-0 bg-gradient-to-r from-red-600/10 via-transparent to-red-800/10 animate-gradient-x"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-red-500/5 to-transparent animate-gradient-y"></div>
        
        <!-- Floating Elements -->
        <div class="absolute top-16 left-8 w-20 h-20 bg-gradient-to-br from-red-200 to-red-300 rounded-full opacity-20 animate-float"></div>
        <div class="absolute top-32 right-16 w-16 h-16 bg-gradient-to-br from-red-300 to-red-400 rounded-full opacity-15 animate-float-delayed"></div>
        <div class="absolute bottom-24 left-1/4 w-14 h-14 bg-gradient-to-br from-red-100 to-red-200 rounded-full opacity-25 animate-float-slow"></div>
        <div class="absolute bottom-16 right-1/3 w-18 h-18 bg-gradient-to-br from-red-400 to-red-500 rounded-full opacity-10 animate-float-reverse"></div>
        
        <!-- Geometric Patterns -->
        <div class="absolute top-0 left-0 w-full h-full opacity-5">
            <svg class="w-full h-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                        <path d="M 10 0 L 0 0 0 10" fill="none" stroke="#dc2626" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100" height="100" fill="url(#grid)" />
            </svg>
        </div>
    </div>

    <!-- Content Layer -->
    <div class="relative z-10 h-screen flex flex-col">
        <!-- Enhanced Navbar -->
        <header class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4" x-data="{ isVisible: false }" x-init="setTimeout(() => isVisible = true, 100)">
            @if (Route::has('login'))
                <nav class="flex flex-wrap justify-end space-x-3" 
                     x-show="isVisible"
                     x-transition:enter="transition ease-out duration-700"
                     x-transition:enter-start="opacity-0 -translate-y-4"
                     x-transition:enter-end="opacity-100 translate-y-0">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="group relative px-4 py-2 text-sm font-semibold text-red-700 border-2 border-red-300 rounded-lg overflow-hidden transition-all duration-300 hover:text-white hover:border-red-500 hover:scale-105">
                            <span class="absolute inset-0 bg-gradient-to-r from-red-500 to-red-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                            <span class="relative flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                                <span>Dashboard</span>
                            </span>
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="group relative px-4 py-2 text-sm font-semibold text-red-700 border-2 border-red-300 rounded-lg overflow-hidden transition-all duration-300 hover:text-white hover:border-red-500 hover:scale-105">
                            <span class="absolute inset-0 bg-gradient-to-r from-red-500 to-red-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                            <span class="relative flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                </svg>
                                <span>Log in</span>
                            </span>
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="group relative px-4 py-2 text-sm font-semibold text-red-700 border-2 border-red-300 rounded-lg overflow-hidden transition-all duration-300 hover:text-white hover:border-red-500 hover:scale-105">
                                <span class="absolute inset-0 bg-gradient-to-r from-red-500 to-red-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                                <span class="relative flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                    </svg>
                                    <span>Register</span>
                                </span>
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <!-- Enhanced Welcome Content -->
        <main class="flex-1 flex flex-col items-center justify-center text-center px-4" 
              x-data="{ 
                  titleVisible: false, 
                  subtitleVisible: false, 
                  buttonsVisible: false 
              }" 
              x-init="
                  setTimeout(() => titleVisible = true, 300);
                  setTimeout(() => subtitleVisible = true, 800);
                  setTimeout(() => buttonsVisible = true, 1300);
              ">
            
            <!-- Company Logo/Icon -->
            <div class="mb-4" 
                 x-show="titleVisible"
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0 scale-50 rotate-180"
                 x-transition:enter-end="opacity-100 scale-100 rotate-0">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-red-500 to-red-700 rounded-full flex items-center justify-center shadow-2xl animate-pulse-slow">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H9m0 0H5m0 0h4m6 0v1a1 1 0 11-2 0v-1m2 0V9a1 1 0 00-1-1H8a1 1 0 00-1 1v10.5"></path>
                    </svg>
                </div>
            </div>

            <!-- Enhanced Title -->
            <div x-show="titleVisible"
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0 translate-y-8 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-black mb-2 bg-gradient-to-r from-red-600 via-red-700 to-red-800 bg-clip-text text-transparent leading-tight">
                    Welcome to
                </h1>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-3 text-red-700 animate-text-shimmer">
                    Demerg Systems India
                </h2>
            </div>

            <!-- Enhanced Subtitle -->
            <div x-show="subtitleVisible"
                 x-transition:enter="transition ease-out duration-800"
                 x-transition:enter-start="opacity-0 translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="max-w-3xl mb-6">
                <p class="text-base md:text-lg text-red-600 leading-relaxed font-medium">
                    {{ $company->description }}
                </p>
                <div class="mt-3 w-24 h-1 bg-gradient-to-r from-red-400 to-red-600 mx-auto rounded-full"></div>
            </div>

            <!-- Enhanced Action Buttons -->
            <div x-show="buttonsVisible"
                 x-transition:enter="transition ease-out duration-800"
                 x-transition:enter-start="opacity-0 translate-y-8"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="flex flex-col md:flex-row gap-4 mb-6">
                @auth
                    @php
                        $role = Auth::user()->roles->pluck('name')->first();
                        $routeName = $role === 'Human Resource' ? 'hr.dashboard' : strtolower($role) . '.dashboard';
                    @endphp
                    <a href="{{ route($routeName) }}"
                        class="group relative px-8 py-3 text-base font-bold text-white bg-gradient-to-r from-red-600 to-red-700 rounded-xl shadow-2xl overflow-hidden transition-all duration-500 hover:scale-110 hover:shadow-red-500/25 hover:shadow-2xl transform-gpu">
                        <span class="absolute inset-0 bg-gradient-to-r from-red-700 to-red-800 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></span>
                        <span class="relative flex items-center space-x-2">
                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                            <span>Go to Dashboard</span>
                        </span>
                        <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="group relative px-8 py-3 text-base font-bold text-white bg-gradient-to-r from-red-600 to-red-700 rounded-xl shadow-2xl overflow-hidden transition-all duration-500 hover:scale-110 hover:shadow-red-500/25 hover:shadow-2xl transform-gpu">
                        <span class="absolute inset-0 bg-gradient-to-r from-red-700 to-red-800 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></span>
                        <span class="relative flex items-center space-x-2">
                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            <span>Log In</span>
                        </span>
                        <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                    </a>
                    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="group relative px-8 py-3 text-base font-bold text-red-700 bg-white border-3 border-red-600 rounded-xl shadow-2xl overflow-hidden transition-all duration-500 hover:scale-110 hover:shadow-red-500/25 hover:shadow-2xl hover:text-white transform-gpu">
                            <span class="absolute inset-0 bg-gradient-to-r from-red-600 to-red-700 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></span>
                            <span class="relative flex items-center space-x-2">
                                <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                                <span>Register</span>
                            </span>
                            <div class="absolute inset-0 bg-red-50 opacity-0 group-hover:opacity-0 transition-opacity duration-300"></div>
                        </a>
                    @endif
                @endauth
            </div>

            <!-- Feature Highlights - Compact Version -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 max-w-4xl" 
                 x-show="buttonsVisible"
                 x-transition:enter="transition ease-out duration-1000 delay-500"
                 x-transition:enter-start="opacity-0 translate-y-8"
                 x-transition:enter-end="opacity-100 translate-y-0">
                
                <div class="group p-4 bg-white/80 backdrop-blur-sm rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:scale-105 border border-red-100">
                    <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mb-2 group-hover:rotate-6 transition-transform duration-300 mx-auto">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-bold text-red-700 mb-1">Employee Management</h3>
                    <p class="text-xs text-red-600">Comprehensive employee data management</p>
                </div>

                <div class="group p-4 bg-white/80 backdrop-blur-sm rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:scale-105 border border-red-100">
                    <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mb-2 group-hover:rotate-6 transition-transform duration-300 mx-auto">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-bold text-red-700 mb-1">Role-Based Access</h3>
                    <p class="text-xs text-red-600">Secure permission management system</p>
                </div>

                <div class="group p-4 bg-white/80 backdrop-blur-sm rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:scale-105 border border-red-100">
                    <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mb-2 group-hover:rotate-6 transition-transform duration-300 mx-auto">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-bold text-red-700 mb-1">Analytics Dashboard</h3>
                    <p class="text-xs text-red-600">Real-time insights and reporting</p>
                </div>
            </div>
        </main>

        <!-- Enhanced Footer -->
        <footer class="text-center py-3 border-t border-red-200/50 backdrop-blur-sm" 
                x-data="{ footerVisible: false }" 
                x-init="setTimeout(() => footerVisible = true, 2000)">
            <div x-show="footerVisible"
                 x-transition:enter="transition ease-out duration-800"
                 x-transition:enter-start="opacity-0 translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0">
                <p class="text-red-500 font-medium text-sm">
                    &copy; {{ date('Y') }} Demerg Systems India. All rights reserved.
                </p>
                <p class="text-red-400 text-xs mt-1">
                    Powered by Advanced HRMS Technology
                </p>
            </div>
        </footer>
    </div>

    <!-- Enhanced Custom Styles -->
    <style>
        @keyframes gradient-x {
            0%, 100% { transform: translateX(-50%); }
            50% { transform: translateX(50%); }
        }
        
        @keyframes gradient-y {
            0%, 100% { transform: translateY(-50%); }
            50% { transform: translateY(50%); }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        @keyframes float-delayed {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(-180deg); }
        }
        
        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(90deg); }
        }
        
        @keyframes float-reverse {
            0%, 100% { transform: translateY(-10px) rotate(0deg); }
            50% { transform: translateY(10px) rotate(-90deg); }
        }
        
        @keyframes text-shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }
        
        @keyframes pulse-slow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        
        .animate-gradient-x { animation: gradient-x 15s ease infinite; }
        .animate-gradient-y { animation: gradient-y 20s ease infinite; }
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-float-delayed { animation: float-delayed 8s ease-in-out infinite; }
        .animate-float-slow { animation: float-slow 10s ease-in-out infinite; }
        .animate-float-reverse { animation: float-reverse 7s ease-in-out infinite; }
        .animate-pulse-slow { animation: pulse-slow 3s ease-in-out infinite; }
        
        .animate-text-shimmer {
            background: linear-gradient(90deg, #dc2626, #ef4444, #f87171, #dc2626);
            background-size: 200% auto;
            color: transparent;
            -webkit-background-clip: text;
            background-clip: text;
            animation: text-shimmer 3s linear infinite;
        }
        
        .border-3 { border-width: 3px; }
        
        .transform-gpu { transform: translateZ(0); }
    </style>
</body>

</html>
