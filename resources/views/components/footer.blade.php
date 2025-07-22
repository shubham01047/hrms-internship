<footer class="bg-gradient-to-br from-[#ff2626] to-[#ff6969] text-white py-8 shadow-inner"> {{-- Applied gradient background and increased padding --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-3 gap-8"> {{-- Increased gap --}}

        <!-- About -->
        <div>
            <h3 class="text-xl font-bold mb-3 text-white">About {{$company->name}}</h3> {{-- Larger, bolder title --}}
            <p class="text-sm text-red-100 leading-relaxed">{{$company->description}}</p> {{-- Slightly lighter text for description --}}
        </div>

        <!-- Quick Links -->
        <div>
            <h3 class="text-xl font-bold mb-3 text-white">Quick Links</h3> {{-- Larger, bolder title --}}
            <ul class="space-y-2 text-sm text-red-100"> {{-- Increased space between links --}}
                <li><a href="#" class="hover:underline hover:text-white transition-colors duration-200">Employee Directory</a></li> {{-- Added hover effect --}}
                <li><a href="#" class="hover:underline hover:text-white transition-colors duration-200">Attendance Reports</a></li>
                <li><a href="#" class="hover:underline hover:text-white transition-colors duration-200">Payroll Management</a></li>
                <li><a href="#" class="hover:underline hover:text-white transition-colors duration-200">Project Tasks</a></li>
            </ul>
        </div>

        <!-- Legal & Contact -->
        <div>
            <h3 class="text-xl font-bold mb-3 text-white">Legal & Contact</h3> {{-- Larger, bolder title --}}
            <ul class="space-y-2 text-sm text-red-100"> {{-- Increased space between links --}}
                <li><a href="#" class="hover:underline hover:text-white transition-colors duration-200">Privacy Policy</a></li> {{-- Added hover effect --}}
                <li><a href="#" class="hover:underline hover:text-white transition-colors duration-200">Terms of Use</a></li>
                <li><a href="#" class="hover:underline hover:text-white transition-colors duration-200">Contact Support</a></li>
                <li><a href="#" class="hover:underline hover:text-white transition-colors duration-200">Feedback</a></li>
            </ul>
        </div>
    </div>

    <div class="border-t border-[#ff6969] mt-8 pt-4 text-center text-sm text-red-100"> {{-- Adjusted border color and increased margin/padding --}}
        © {{ date('Y') }} HRMS. All rights reserved.
    </div>
</footer>
