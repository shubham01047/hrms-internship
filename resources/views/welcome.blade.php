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

<body class="antialiased bg-primary text-primary h-screen overflow-hidden font-['Poppins'] theme-app">

    <!-- Professional Corporate Welcome Layout -->
    <div class="h-screen flex flex-col bg-primary">
        
        <!-- Compact Header Section -->
        <header class="w-full py-2 sm:py-3 px-3 sm:px-4 lg:px-6 bg-primary-light border-b border-primary">
            <div class="max-w-7xl mx-auto">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-secondary-gradient rounded-xl shadow-lg p-1.5 sm:p-2 flex items-center justify-center">
                            <img 
                                src="{{ url('images/logo.png') }}" 
                                alt="{{ $company->name }} Logo" 
                                class="max-w-full max-h-full object-contain"
                                onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}'"
                            >
                        </div>
                        <span class="text-sm sm:text-base font-semibold text-primary">{{ $company->system_title }}</span>
                    </div>
                    
                    @auth
                        @php
                            $role = Auth::user()->roles->pluck('name')->first();
                            $routeName = $role === 'Human Resource' ? 'hr.dashboard' : strtolower($role) . '.dashboard';
                        @endphp
                        <a href="{{ route($routeName) }}"
                            class="hidden sm:flex items-center gap-2 px-3 py-1.5 bg-primary-light text-primary rounded-lg hover:bg-hover hover:scale-105 transition-all duration-300 font-medium border border-primary text-sm">
                            <i class="fas fa-tachometer-alt w-3 h-3"></i>
                            <span>Dashboard</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="hidden sm:flex items-center gap-2 px-3 py-1.5 bg-primary-light text-primary rounded-lg hover:bg-hover hover:scale-105 transition-all duration-300 font-medium border border-primary text-sm">
                            <i class="fas fa-sign-in-alt w-3 h-3"></i>
                            <span>Sign In</span>
                        </a>
                    @endauth
                </div>
            </div>
        </header>

        <!-- Optimized Main Content Section -->
        <main class="flex-1 flex items-center justify-center px-3 sm:px-4 lg:px-6 py-2 sm:py-4 bg-primary overflow-y-auto">
            <div class="max-w-6xl mx-auto w-full">
                
                <!-- Compact Hero Section -->
                <div class="text-center mb-4 sm:mb-6 lg:mb-8">
                    <!-- Logo and Title Section -->
                    <div class="flex flex-col lg:flex-row items-center justify-center gap-3 sm:gap-4 lg:gap-8 mb-4 sm:mb-6">
                        <!-- Professional Logo Container -->
                        <div class="relative group">
                            <div class="absolute -inset-1 sm:-inset-2 bg-secondary-gradient rounded-2xl blur-lg opacity-20 group-hover:opacity-30 transition-opacity duration-500"></div>
                            <div class="relative w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 lg:w-32 lg:h-32 bg-secondary-gradient rounded-2xl shadow-xl p-3 sm:p-4 md:p-5 flex items-center justify-center transform group-hover:scale-105 transition-all duration-500 border border-primary">
                                <img 
                                    src="{{ url('images/logo.png') }}" 
                                    alt="{{ $company->name }} Logo" 
                                    class="max-w-full max-h-full object-contain drop-shadow-2xl filter brightness-110"
                                    onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}'"
                                >
                            </div>
                        </div>
                        
                        <!-- Corporate Title Section -->
                        <div class="text-center lg:text-left">
                            <h1 class="text-lg sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl font-bold text-primary leading-tight mb-1 sm:mb-2">
                                Welcome to
                            </h1>
                            <h2 class="text-base sm:text-lg md:text-xl lg:text-2xl xl:text-3xl font-bold">
                                <span class="bg-secondary-gradient bg-clip-text text-primary animate-gradient">
                                    {{ $company->name }}
                                </span>
                            </h2>
                        </div>
                    </div>

                    <!-- Compact Company Description -->
                    <div class="max-w-4xl mx-auto mb-3 sm:mb-4 lg:mb-6">
                        <p class="text-xs sm:text-sm md:text-base lg:text-lg text-secondary leading-relaxed font-light px-2 sm:px-0">
                            {{ $company->description }}
                        </p>
                    </div>

                    <!-- Professional Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 justify-center items-center mb-4 sm:mb-6 px-2 sm:px-0">
                        @auth
                            <a href="{{ route($routeName) }}"
                                class="group relative inline-flex items-center justify-center gap-2 px-4 sm:px-5 py-2 sm:py-2.5 bg-secondary-gradient text-primary text-xs sm:text-sm font-bold rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 transform w-full sm:w-auto sm:min-w-[140px] lg:min-w-[160px] overflow-hidden hover:bg-hover border border-primary">
                                <div class="absolute inset-0 bg-hover opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <i class="fas fa-tachometer-alt w-3 h-3 sm:w-4 sm:h-4 relative z-10"></i>
                                <span class="relative z-10">Go to Dashboard</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="group relative inline-flex items-center justify-center gap-2 px-4 sm:px-5 py-2 sm:py-2.5 bg-secondary-gradient text-primary text-xs sm:text-sm font-bold rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 transform w-full sm:w-auto sm:min-w-[140px] lg:min-w-[160px] overflow-hidden hover:bg-hover border border-primary">
                                <div class="absolute inset-0 bg-hover opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <i class="fas fa-sign-in-alt w-3 h-3 sm:w-4 sm:h-4 relative z-10"></i>
                                <span class="relative z-10">Sign In</span>
                            </a>
                        @endauth
                        
                        <!-- Secondary Action -->
                        <a href="#features" 
                            class="group inline-flex items-center justify-center gap-2 px-4 sm:px-5 py-2 sm:py-2.5 bg-primary-light text-primary text-xs sm:text-sm font-bold rounded-xl border border-primary hover:bg-hover hover:scale-105 transition-all duration-300 transform w-full sm:w-auto sm:min-w-[140px] lg:min-w-[160px]">
                            <i class="fas fa-info-circle w-3 h-3 sm:w-4 sm:h-4 group-hover:rotate-12 transition-transform duration-300"></i>
                            <span>Learn More</span>
                        </a>
                    </div>
                </div>

                <!-- Equal Height Features Section -->
                <div id="features" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 mb-4 sm:mb-6 lg:mb-8 px-2 sm:px-0">
                    <div class="group bg-primary-light rounded-2xl p-3 sm:p-4 shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 transform border border-primary h-full flex flex-col">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-secondary-gradient rounded-xl flex items-center justify-center mb-2 sm:mb-3 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-shield-alt text-primary text-sm sm:text-base"></i>
                        </div>
                        <h3 class="text-sm sm:text-base font-bold text-primary mb-1 sm:mb-2">Secure & Reliable</h3>
                        <p class="text-xs sm:text-sm text-secondary leading-relaxed flex-1">Enterprise-grade security with reliable performance for your business operations.</p>
                    </div>
                    
                    <div class="group bg-primary-light rounded-2xl p-3 sm:p-4 shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 transform border border-primary h-full flex flex-col">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-secondary-gradient rounded-xl flex items-center justify-center mb-2 sm:mb-3 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-users text-primary text-sm sm:text-base"></i>
                        </div>
                        <h3 class="text-sm sm:text-base font-bold text-primary mb-1 sm:mb-2">User-Friendly</h3>
                        <p class="text-xs sm:text-sm text-secondary leading-relaxed flex-1">Intuitive interface designed for seamless user experience across all devices.</p>
                    </div>
                    
                    <div class="group bg-primary-light rounded-2xl p-3 sm:p-4 shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 transform border border-primary h-full flex flex-col sm:col-span-2 lg:col-span-1">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-secondary-gradient rounded-xl flex items-center justify-center mb-2 sm:mb-3 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-chart-line text-primary text-sm sm:text-base"></i>
                        </div>
                        <h3 class="text-sm sm:text-base font-bold text-primary mb-1 sm:mb-2">Analytics & Insights</h3>
                        <p class="text-xs sm:text-sm text-secondary leading-relaxed flex-1">Comprehensive reporting and analytics to drive informed business decisions.</p>
                    </div>
                </div>
            </div>
        </main>

        <!-- Compact Footer Section -->
        <footer class="w-full py-2 sm:py-3 px-3 sm:px-4 lg:px-6 bg-primary-light border-t border-primary">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-2">
                    <div class="flex items-center">
                        <span class="text-xs text-secondary text-center sm:text-left">&copy; {{ date('Y') }} {{ $company->name }}. All rights reserved.</span>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <a href="#" class="text-secondary hover:text-primary hover:scale-110 transition-all duration-300">
                            <i class="fab fa-twitter text-sm"></i>
                        </a>
                        <a href="#" class="text-secondary hover:text-primary hover:scale-110 transition-all duration-300">
                            <i class="fab fa-linkedin text-sm"></i>
                        </a>
                        <a href="#" class="text-secondary hover:text-primary hover:scale-110 transition-all duration-300">
                            <i class="fab fa-facebook text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Minimal Professional Styles -->
    <style>
        /* Gradient animation */
        @keyframes gradient {
            0%, 100% {
                background-size: 200% 200%;
                background-position: left center;
            }
            50% {
                background-size: 200% 200%;
                background-position: right center;
            }
        }

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 3s ease infinite;
        }

        /* Enhanced gradient text support */
        .bg-clip-text {
            -webkit-background-clip: text;
            background-clip: text;
        }

        /* Prevent scrolling on desktop, allow on mobile */
        html, body {
            height: 100%;
        }

        @media (min-width: 640px) {
            html, body {
                overflow: hidden;
            }
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Enhanced shadows */
        .shadow-2xl {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        /* Enhanced drop shadow */
        .drop-shadow-2xl {
            filter: drop-shadow(0 25px 25px rgba(0, 0, 0, 0.15));
        }

        /* Corporate smooth transitions */
        * {
            transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Professional hover effects */
        .group:hover .group-hover\:scale-110 {
            transform: scale(1.1);
        }

        .group:hover .group-hover\:rotate-12 {
            transform: rotate(12deg);
        }

        /* Equal height flex cards */
        .h-full.flex.flex-col {
            min-height: 100%;
        }

        .flex-1 {
            flex: 1;
        }

        /* Corporate button hover effects */
        .hover\:scale-105:hover {
            transform: scale(1.05);
        }

        /* Professional shadow enhancements */
        .hover\:shadow-xl:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Enhanced button animations */
        .transform:hover {
            transform: translateY(-1px) scale(1.02);
        }

        /* Mobile specific optimizations */
        @media (max-width: 639px) {
            /* Allow vertical scrolling on mobile if needed */
            .overflow-y-auto {
                -webkit-overflow-scrolling: touch;
            }
            
            /* Ensure buttons are touch-friendly */
            .group {
                min-height: 44px;
            }
            
            /* Better mobile spacing */
            .px-2 {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }
        }

        /* Tablet optimizations */
        @media (min-width: 640px) and (max-width: 1023px) {
            /* 2-column grid on tablets */
            .sm\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
            
            /* Last card spans full width on tablet when 3 cards */
            .sm\:col-span-2 {
                grid-column: span 2 / span 2;
            }
        }

        /* Desktop optimizations */
        @media (min-width: 1024px) {
            /* 3-column grid on desktop */
            .lg\:grid-cols-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
            
            /* Reset column span on desktop */
            .lg\:col-span-1 {
                grid-column: span 1 / span 1;
            }
        }
    </style>
</body>

</html>