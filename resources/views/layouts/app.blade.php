<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#0d6efd">
    <link rel="apple-touch-icon" href="{{ asset('icons/logo.png') }}">

    <title>
        {{ $company->name ?? 'Company' }} |
        {{ ucwords(str_replace(['-', '.'], ' ', Route::currentRouteName() ?? 'Dashboard')) }}
    </title>
    {{-- company logo --}}
    @if (isset($company) && $company->logo)
        <link rel="icon" type="image/png" href="{{ asset($company->logo) }}">
    @else
        <link rel="icon" type="image/png" href="{{ asset('default-favicon.png') }}">
    @endif

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <!-- Toast messages -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="theme-app font-sans antialiased bg-secondary-bg text-primary" x-data="{ sidebarOpen: window.innerWidth >= 768 }"
    x-init="$watch('sidebarOpen', value => {
        if (window.innerWidth >= 768) sidebarOpen = true;
    })">

    <div class="flex-1 flex flex-col min-h-screen ml-0 md:ml-64 transition-all duration-300 ease-in-out">
        <!-- Sidebar Component -->
        <div x-show="sidebarOpen" x-transition class="z-40">
            <x-sidebar />
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-h-screen ">
            <!-- Toggle Button for mobile -->
            <button @click="sidebarOpen = !sidebarOpen" x-show="!sidebarOpen"
                class="inline-flex  md:hidden p-2 focus:outline-none sticky top-0 z-50 w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 primary-text" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>


            <!-- Top Navigation -->
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto pt-6 pb-2 px-4 sm:px-6 lg:px-8 text-primary">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="p-4">
                {{ $slot }}
            </main>

            <!-- Footer -->
            @include('components.footer')
        </div>
    </div>
<script>
if ("serviceWorker" in navigator) {
    window.addEventListener("load", function() {
        navigator.serviceWorker.register("/service-worker.js")
        .then(reg => console.log("Service Worker registered:", reg))
        .catch(err => console.log("SW registration failed:", err));
    });
}
</script>

    <!-- External Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @isset($script)
        {{ $script }}
    @endisset
</body>

</html>
