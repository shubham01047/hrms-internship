<x-app-layout>
    <div class="flex bg-gray-100">
        <!-- Sidebar -->
        <aside class="fixed top-16 left-0 w-64 h-[calc(100vh-4rem)] bg-white shadow-lg">
            <x-sidebar /> <!-- Sidebar Component -->
        </aside>

        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- ✅ Navbar at top -->
            <nav class="fixed top-0 left-0 right-0 bg-white shadow px-6 py-4 flex justify-between items-center z-50">
                <h2 class="font-semibold text-xl text-black">
                    {{ __('Dashboard') }}
                </h2>
                <div>
                    <span class="text-gray-600">Welcome, John Doe</span>
                </div>
            </nav>

            <!-- Page Content -->
            <div class="p-6 mt-16">
                <div class="bg-white rounded-lg shadow p-6">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
