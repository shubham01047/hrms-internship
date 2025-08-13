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

    <!-- Applied corporate theme with light gradient background -->
    <div class="min-h-screen relative overflow-hidden bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100">
        
        <!-- Updated animated background elements with better colors for light background -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-10 left-10 w-20 h-20 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob" style="background: var(--hover-bg);"></div>
            <div class="absolute top-20 right-10 w-20 h-20 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000" style="background: var(--secondary-bg);"></div>
            <div class="absolute -bottom-8 left-20 w-20 h-20 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000" style="background: var(--hover-bg);"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-32 h-32 rounded-full mix-blend-multiply filter blur-xl opacity-15 animate-blob animation-delay-6000" style="background: var(--secondary-bg);"></div>
        </div>

        <!-- Updated header with white background and dark text -->
        <header class="relative z-10 w-full py-4 px-4 lg:px-6 bg-white/80 backdrop-blur-md shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl shadow-lg p-2 flex items-center justify-center" style="background: var(--hover-bg);">
                            <img 
                                src="{{ url('images/logo.png') }}" 
                                alt="{{ $company->name }} Logo" 
                                class="max-w-full max-h-full object-contain"
                                onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}'"
                            >
                        </div>
                        <span class="text-lg font-semibold text-gray-800">{{ $company->system_title }}</span>
                    </div>
                    
                    @auth
                        @php
                            $role = Auth::user()->roles->pluck('name')->first();
                            $routeName = $role === 'Human Resource' ? 'hr.dashboard' : strtolower($role) . '.dashboard';
                        @endphp
                        <a href="{{ route($routeName) }}"
                            class="hidden sm:flex items-center gap-2 px-4 py-2 rounded-lg hover:scale-105 transition-all duration-300 font-medium shadow-md text-white"
                            style="background: var(--hover-bg);"
                            onmouseover="this.style.background='var(--secondary-bg)'"
                            onmouseout="this.style.background='var(--hover-bg)'">
                            <i class="fas fa-tachometer-alt w-4 h-4"></i>
                            <span>Dashboard</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="hidden sm:flex items-center gap-2 px-4 py-2 rounded-lg hover:scale-105 transition-all duration-300 font-medium shadow-md text-white"
                            style="background: var(--hover-bg);"
                            onmouseover="this.style.background='var(--secondary-bg)'"
                            onmouseout="this.style.background='var(--hover-bg)'">
                            <i class="fas fa-sign-in-alt w-4 h-4"></i>
                            <span>Sign In</span>
                        </a>
                    @endauth
                </div>
            </div>
        </header>

        <!-- Updated main content with light theme -->
        <main class="relative z-10 flex-1 flex items-center justify-center px-4 lg:px-6 py-8">
            <div class="max-w-6xl mx-auto w-full">
                
                <!-- Updated hero section with dark text on light background -->
                <div class="text-center mb-12">
                    <div class="flex flex-col lg:flex-row items-center justify-center gap-6 lg:gap-12 mb-8">
                        <!-- Professional Logo Container -->
                        <div class="relative group">
                            <div class="absolute -inset-2 rounded-2xl blur-lg opacity-20 group-hover:opacity-30 transition-opacity duration-500" style="background: var(--hover-bg);"></div>
                            <!-- Changed logo container background from white to corporate color for white logo visibility -->
                            <div class="relative w-24 h-24 md:w-32 md:h-32 lg:w-36 lg:h-36 rounded-2xl shadow-xl p-4 md:p-6 flex items-center justify-center transform group-hover:scale-105 transition-all duration-500 border-2" style="background: var(--hover-bg); border-color: var(--primary-border);">
                                <img 
                                    src="{{ url('images/logo.png') }}" 
                                    alt="{{ $company->name }} Logo" 
                                    class="max-w-full max-h-full object-contain drop-shadow-lg filter brightness-0 invert"
                                    onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}'"
                                >
                            </div>
                        </div>
                        
                        <!-- Corporate Title Section -->
                        <div class="text-center lg:text-left">
                            <h1 class="text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-bold leading-tight mb-2 text-gray-800">
                                Welcome to
                            </h1>
                            <h2 class="text-xl md:text-2xl lg:text-3xl xl:text-4xl font-bold" style="color: var(--hover-bg);">
                                {{ $company->name }}
                            </h2>
                        </div>
                    </div>

                    <!-- Company Description -->
                    <div class="max-w-4xl mx-auto mb-8">
                        <p class="text-sm md:text-base lg:text-lg leading-relaxed font-light text-gray-600">
                            {{ $company->description }}
                        </p>
                    </div>

                    <!-- Professional Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
                        @auth
                            <a href="{{ route($routeName) }}"
                                class="group relative inline-flex items-center justify-center gap-3 px-6 py-3 text-white text-sm font-bold rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 transform w-full sm:w-auto min-w-[180px] overflow-hidden"
                                style="background: var(--hover-bg);"
                                onmouseover="this.style.background='var(--secondary-bg)'"
                                onmouseout="this.style.background='var(--hover-bg)'">
                                <i class="fas fa-tachometer-alt w-4 h-4 relative z-10"></i>
                                <span class="relative z-10">Go to Dashboard</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="group relative inline-flex items-center justify-center gap-3 px-6 py-3 text-white text-sm font-bold rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 transform w-full sm:w-auto min-w-[180px] overflow-hidden"
                                style="background: var(--hover-bg);"
                                onmouseover="this.style.background='var(--secondary-bg)'"
                                onmouseout="this.style.background='var(--hover-bg)'">
                                <i class="fas fa-sign-in-alt w-4 h-4 relative z-10"></i>
                                <span class="relative z-10">Sign In</span>
                            </a>
                        @endauth
                        
                        <a href="#features" 
                            class="group inline-flex items-center justify-center gap-3 px-6 py-3 text-sm font-bold rounded-xl hover:scale-105 transition-all duration-300 transform w-full sm:w-auto min-w-[180px] shadow-md bg-white text-gray-700 border border-gray-300 hover:bg-gray-50">
                            <i class="fas fa-info-circle w-4 h-4 group-hover:rotate-12 transition-transform duration-300"></i>
                            <span>Learn More</span>
                        </a>
                    </div>
                </div>

                <!-- Updated features section with white cards and dark text -->
                <div id="features" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                    <div class="group bg-white/80 backdrop-blur-md rounded-2xl p-6 shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 transform h-full flex flex-col border border-gray-200">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300" style="background: var(--hover-bg);">
                            <i class="fas fa-shield-alt text-white text-lg"></i>
                        </div>
                        <h3 class="text-lg font-bold mb-3 text-gray-800">Secure & Reliable</h3>
                        <p class="text-sm leading-relaxed flex-1 text-gray-600">Enterprise-grade security with reliable performance for your business operations.</p>
                    </div>
                    
                    <div class="group bg-white/80 backdrop-blur-md rounded-2xl p-6 shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 transform h-full flex flex-col border border-gray-200">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300" style="background: var(--hover-bg);">
                            <i class="fas fa-users text-white text-lg"></i>
                        </div>
                        <h3 class="text-lg font-bold mb-3 text-gray-800">User-Friendly</h3>
                        <p class="text-sm leading-relaxed flex-1 text-gray-600">Intuitive interface designed for seamless user experience across all devices.</p>
                    </div>
                    
                    <div class="group bg-white/80 backdrop-blur-md rounded-2xl p-6 shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 transform h-full flex flex-col sm:col-span-2 lg:col-span-1 border border-gray-200">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300" style="background: var(--hover-bg);">
                            <i class="fas fa-chart-line text-white text-lg"></i>
                        </div>
                        <h3 class="text-lg font-bold mb-3 text-gray-800">Analytics & Insights</h3>
                        <p class="text-sm leading-relaxed flex-1 text-gray-600">Comprehensive reporting and analytics to drive informed business decisions.</p>
                    </div>
                </div>
            </div>
        </main>

        <!-- Updated footer with white background -->
        <footer class="relative z-10 w-full py-4 px-4 lg:px-6 bg-white/80 backdrop-blur-md border-t border-gray-200">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                    <div class="flex items-center">
                        <span class="text-sm text-center sm:text-left text-gray-600">&copy; {{ date('Y') }} {{ $company->name }}. All rights reserved.</span>
                    </div>
                    
                    <div class="flex items-center space-x-6">
                        <a href="#" class="text-gray-500 hover:scale-110 transition-all duration-300" style="color: #6b7280;" onmouseover="this.style.color='var(--hover-bg)'" onmouseout="this.style.color='#6b7280'">
                            <i class="fab fa-twitter text-lg"></i>
                        </a>
                        <a href="#" class="text-gray-500 hover:scale-110 transition-all duration-300" style="color: #6b7280;" onmouseover="this.style.color='var(--hover-bg)'" onmouseout="this.style.color='#6b7280'">
                            <i class="fab fa-linkedin text-lg"></i>
                        </a>
                        <a href="#" class="text-gray-500 hover:scale-110 transition-all duration-300" style="color: #6b7280;" onmouseover="this.style.color='var(--hover-bg)'" onmouseout="this.style.color='#6b7280'">
                            <i class="fab fa-facebook text-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Updated styles with your exact corporate theme -->
    <style>
        .theme-app {
            --primary-bg: #0b1f3a;
            --primary-bg-light: #102c4e;
            --primary-text: #f8fafc;
            --primary-border: #1e3a5f;
            --hover-bg: #2563eb;
            --secondary-bg: #2c4e9c;
            --secondary-text: #cbd5e1;
        }

        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        .animation-delay-6000 {
            animation-delay: 6s;
        }

        html {
            scroll-behavior: smooth;
        }

        .backdrop-blur-md {
            backdrop-filter: blur(12px);
        }

        .group:hover .group-hover\:scale-110 {
            transform: scale(1.1);
        }

        .group:hover .group-hover\:rotate-12 {
            transform: rotate(12deg);
        }

        .hover\:scale-105:hover {
            transform: scale(1.05);
        }

        .transform:hover {
            transform: translateY(-2px) scale(1.02);
        }

        @media (max-width: 639px) {
            .min-w-[180px] {
                min-width: 100%;
            }
        }
    </style>
</body>

</html>
