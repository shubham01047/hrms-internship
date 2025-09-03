<footer class="bg-secondary-gradient text-primary py-8 shadow-inner">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-3 gap-8">

        <!-- About -->
        <div>
            <h3 class="text-xl font-bold mb-3 text-primary">About {{ $company->company_name }}</h3>
            <p class="text-sm text-secondary-text leading-relaxed">{{ $company->company_description }}</p>
        </div>

        <!-- Quick Links -->
        <div>
            <h3 class="text-xl font-bold mb-3 text-primary">Quick Links</h3>
            <ul class="space-y-2 text-sm text-secondary-text">
                <li><a href="{{route('users.index')}}" class="hover:underline hover:text-primary transition-colors duration-200">User Directory</a></li>
                <li><a href="{{ route('admin.attendance.report') }}" class="hover:underline hover:text-primary transition-colors duration-200">Attendance Reports</a></li>
                <li><a href="{{route('payrolls.index')}}" class="hover:underline hover:text-primary transition-colors duration-200">Payroll Management</a></li>
                <li><a href="{{route('projects.index')}}" class="hover:underline hover:text-primary transition-colors duration-200">Project Tasks</a></li>
            </ul>
        </div>

        <!-- Legal & Contact -->
        <div>
            <h3 class="text-xl font-bold mb-3 text-primary">Legal & Contact</h3>
            <ul class="space-y-2 text-sm text-secondary-text">
                <li><a href="#" class="hover:underline hover:text-primary transition-colors duration-200">Privacy Policy</a></li>
                <li><a href="#" class="hover:underline hover:text-primary transition-colors duration-200">Terms of Use</a></li>
                <li><a href="#" class="hover:underline hover:text-primary transition-colors duration-200">Contact Support</a></li>
                <li><a href="#" class="hover:underline hover:text-primary transition-colors duration-200">Feedback</a></li>
            </ul>
        </div>
    </div>

    <div class="border-t border-primary mt-8 pt-4 text-center text-sm text-secondary-text">
        © {{ date('Y') }} HRMS. All rights reserved.
    </div>
</footer>
