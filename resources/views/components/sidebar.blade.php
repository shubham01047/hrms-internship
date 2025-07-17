<!-- Sidebar -->
<aside id="default-sidebar"
       class="fixed top-16 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-red-700 text-white"
       aria-label="Sidebar">
    <div class="px-4 py-6 overflow-y-auto">
        <!-- Logo -->
        <div class="flex items-center mb-6">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Logo" class="w-10 h-10 mr-3">
            <h1 class="text-2xl font-bold">HRMS</h1>
        </div>

        <!-- Navigation Menu -->
        <ul class="space-y-3">
            <li>
                <a href="#" class="flex items-center p-2 rounded-lg hover:bg-red-600 transition">
                    <i class="bi bi-speedometer2 text-xl"></i>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 rounded-lg hover:bg-red-600 transition">
                    <i class="bi bi-people text-xl"></i>
                    <span class="ml-3">Employees</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 rounded-lg hover:bg-red-600 transition">
                    <i class="bi bi-calendar-check text-xl"></i>
                    <span class="ml-3">Leave Requests</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 rounded-lg hover:bg-red-600 transition">
                    <i class="bi bi-cash-stack text-xl"></i>
                    <span class="ml-3">Payroll</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 rounded-lg hover:bg-red-600 transition">
                    <i class="bi bi-bar-chart text-xl"></i>
                    <span class="ml-3">Reports</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 rounded-lg hover:bg-red-600 transition">
                    <i class="bi bi-gear text-xl"></i>
                    <span class="ml-3">Settings</span>
                </a>
            </li>
        </ul>

        <!-- Logout -->
        <div class="absolute bottom-6 left-0 w-full px-4">
            <a href="#"
               class="block w-full text-center bg-white text-red-700 font-semibold py-2 rounded-lg hover:bg-red-100 transition">
                <i class="bi bi-box-arrow-right mr-2"></i> Logout
            </a>
        </div>
    </div>
</aside>
