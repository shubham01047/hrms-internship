<footer class="bg-red-600  text-white py-6 shadow-inner">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-3 gap-6">

        <!-- About -->
        <div>
            <h3 class="text-lg font-semibold mb-2">{{$company->name}}</h3>
            <p class="text-sm text-gray-100">{{$company->description}}</p>
        </div>

        <!-- Quick Links -->
        <div>
            <h3 class="text-lg font-semibold mb-2">Quick Links</h3>
            <ul class="space-y-1 text-sm text-gray-100">
                <li><span class="cursor-pointer hover:underline">Employee Directory</span></li>
                <li><span class="cursor-pointer hover:underline">Attendance Reports</span></li>
                <li><span class="cursor-pointer hover:underline">Payroll Management</span></li>
                <li><span class="cursor-pointer hover:underline">Project Tasks</span></li>
            </ul>
        </div>

        <!-- Legal & Contact -->
        <div>
            <h3 class="text-lg font-semibold mb-2">Legal & Contact</h3>
            <ul class="space-y-1 text-sm text-gray-100">
                <li><span class="cursor-pointer hover:underline">Privacy Policy</span></li>
                <li><span class="cursor-pointer hover:underline">Terms of Use</span></li>
                <li><span class="cursor-pointer hover:underline">Contact Support</span></li>
                <li><span class="cursor-pointer hover:underline">Feedback</span></li>
            </ul>
        </div>
    </div>

    <div class="border-t border-red-400 mt-6 pt-4 text-center text-sm text-white">
        © {{ date('Y') }} HRMS. All rights reserved.
    </div>
</footer>
