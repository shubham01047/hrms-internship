<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard | HRMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

<!-- Sidebar -->
<div class="fixed top-0 left-0 h-screen w-64 bg-red-700 text-white flex flex-col p-6">
    <h4 class="text-center font-bold text-xl mb-8">HRMS Portal</h4>
    <a href="#" class="flex items-center px-4 py-3 hover:bg-red-800 rounded transition">
        <i class="bi bi-speedometer2 mr-3"></i> Dashboard
    </a>
    <a href="#" class="flex items-center px-4 py-3 hover:bg-red-800 rounded transition">
        <i class="bi bi-person-circle mr-3"></i> My Profile
    </a>
    <a href="#" class="flex items-center px-4 py-3 hover:bg-red-800 rounded transition">
        <i class="bi bi-calendar-check mr-3"></i> Leave Requests
    </a>
    <a href="#" class="flex items-center px-4 py-3 hover:bg-red-800 rounded transition">
        <i class="bi bi-receipt mr-3"></i> Payslips
    </a>
    <a href="#" class="flex items-center px-4 py-3 hover:bg-red-800 rounded transition">
        <i class="bi bi-bell mr-3"></i> Notifications
    </a>
    <a href="{{ url('/login') }}" class="mt-6 text-center border border-white rounded py-3 hover:bg-white hover:text-red-700 font-semibold transition">
        <i class="bi bi-box-arrow-right mr-2"></i> Logout
    </a>
</div>

<!-- Main Content -->
<div class="ml-64 p-6">
    <!-- Top Navbar -->
    <nav class="bg-white shadow flex justify-between items-center p-4 rounded">
        <h5 class="text-lg font-semibold">Welcome, John Doe</h5>
        <div class="flex items-center gap-3">
            <span class="font-bold">Employee</span>
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Profile" class="w-10 h-10 rounded-full">
        </div>
    </nav>

    <!-- Dashboard Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-6">
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg text-center transition">
            <h5 class="text-lg font-semibold mb-2">Total Leaves Left</h5>
            <p class="text-3xl text-green-500 font-bold">12</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg text-center transition">
            <h5 class="text-lg font-semibold mb-2">Last Salary</h5>
            <p class="text-3xl text-blue-500 font-bold">₹55,000</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg text-center transition">
            <h5 class="text-lg font-semibold mb-2">Attendance</h5>
            <p class="text-3xl text-yellow-500 font-bold">96%</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg text-center transition">
            <h5 class="text-lg font-semibold mb-2">Next Holiday</h5>
            <p class="text-3xl text-red-500 font-bold">15 Aug</p>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mt-10">
        <h4 class="text-xl font-bold mb-4">Quick Actions</h4>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <button class="w-full py-4 border border-blue-500 text-blue-500 rounded-lg font-semibold hover:bg-blue-500 hover:text-white transition">
                <i class="bi bi-calendar-plus mr-2"></i> Apply Leave
            </button>
            <button class="w-full py-4 border border-green-500 text-green-500 rounded-lg font-semibold hover:bg-green-500 hover:text-white transition">
                <i class="bi bi-file-earmark-text mr-2"></i> View Payslips
            </button>
            <button class="w-full py-4 border border-yellow-500 text-yellow-500 rounded-lg font-semibold hover:bg-yellow-500 hover:text-white transition">
                <i class="bi bi-clock mr-2"></i> Mark Attendance
            </button>
        </div>
    </div>
</div>

</body>
</html>
