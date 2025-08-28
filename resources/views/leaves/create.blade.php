<x-app-layout>
    @can('apply leave')
        <x-slot name="header">
            {{-- Applied create2's responsive header with gradient background --}}
            <div class="theme-app flex flex-col sm:flex-row justify-between items-center p-4 sm:p-6 rounded-lg shadow-sm"
                style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 sm:gap-0 w-full lg:mr-24">
                    <div class="flex items-center space-x-2 sm:space-x-3 mb-4 sm:mb-0">
                        <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" style="color: var(--primary-text);" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <h2 class="font-bold text-xl sm:text-xl lg:text-2xl leading-tight"
                            style="color: var(--primary-text);">
                            Apply for Leave
                        </h2>
                    </div>
                </div>
            </div>
        </x-slot>

        {{-- Applied create2's gradient background and enhanced layout --}}
        <div class="py-8 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
            <div class="w-full px-4 sm:px-6 lg:px-8 space-y-8">
                {{-- Applied create2's enhanced statistics cards with hover effects --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center">
                            <div class="p-3 bg-blue-100 rounded-lg mr-4">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-gray-900 font-semibold">Quick Process</h3>
                                <p class="text-gray-600 text-sm">Fast approval workflow</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center">
                            <div class="p-3 bg-green-100 rounded-lg mr-4">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-gray-900 font-semibold">Real-time Status</h3>
                                <p class="text-gray-600 text-sm">Track your application</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center">
                            <div class="p-3 bg-purple-100 rounded-lg mr-4">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-gray-900 font-semibold">24/7 Available</h3>
                                <p class="text-gray-600 text-sm">Apply anytime</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Applied create2's enhanced form card with rounded corners and shadow --}}
                <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
                    {{-- Applied create2's enhanced card header with gradient and icons --}}
                    <div class="theme-app px-6 py-4 border-b border-gray-200"
                        style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                                <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2v2M7 9h10">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold" style="color: var(--primary-text);">Leave Application Form</h3>
                                <p class="text-sm" style="color: var(--secondary-text);">Please fill in all required information</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        {{-- Applied create2's leave balance display styling --}}
                        Leave Balance:<br>
                        <strong>{{ auth()->user()->leave_balance ?? 12 }} Day(s)</strong>

                        <form action="{{ route('leaves.store') }}" method="POST" enctype="multipart/form-data" id="leaveForm" class="space-y-6">
                            @csrf
                            
                            {{-- Applied create2's enhanced form field styling with icons --}}
                            <div class="space-y-2">
                                <label for="leave_type_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                        </svg>
                                        <span>Leave Type</span>
                                        <span class="text-red-500">*</span>
                                    </div>
                                </label>
                                <select id="leave_type_id" name="leave_type_id" required 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
                                    <option value="">Select Leave Type</option>
                                    @foreach($leaveTypes as $type)
                                        <option value="{{ $type->id }}" {{ old('leave_type_id') == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('leave_type_id')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                <span class="text-red-500 text-sm error" id="error-leave-type"></span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- Applied create2's enhanced date input styling --}}
                                <div class="space-y-2">
                                    <label for="start_date" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span>Start Date</span>
                                            <span class="text-red-500">*</span>
                                        </div>
                                    </label>
                                    <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
                                    @error('start_date')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <span class="text-red-500 text-sm error" id="error-start-date"></span>
                                </div>

                                <div class="space-y-2">
                                    <label for="end_date" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span>End Date</span>
                                            <span class="text-red-500">*</span>
                                        </div>
                                    </label>
                                    <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
                                    @error('end_date')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <span class="text-red-500 text-sm error" id="error-end-date"></span>
                                </div>
                            </div>

                            {{-- Applied create2's enhanced file upload styling --}}
                            <div class="space-y-2">
                                <label for="proof_sick" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <span>Upload Medical Certificate</span>
                                        <span id="medical-cert-required" class="text-red-500 hidden">*</span>
                                    </div>
                                    <span id="medical-cert-help" class="text-xs text-gray-500 block mt-1">(Required for Sick Leave more than 3 days)</span>
                                </label>
                                <div class="relative">
                                    <input type="file" id="proof_sick" name="proof_sick" accept=".pdf,.jpg,.jpeg,.png"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                    <p class="text-xs text-gray-500 mt-2">Accepted formats: JPG, JPEG, PNG, PDF (Max 5MB)</p>
                                </div>
                                @error('proof_sick')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                <span class="text-red-500 text-sm error" id="error-proof"></span>
                            </div>

                            {{-- Applied create2's enhanced textarea styling --}}
                            <div class="space-y-2">
                                <label for="reason" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        <span>Reason for Leave</span>
                                        <span class="text-red-500">*</span>
                                    </div>
                                </label>
                                <textarea id="reason" name="reason" rows="4" required 
                                          placeholder="Please provide a detailed reason for your leave request..."
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white resize-none">{{ old('reason') }}</textarea>
                                @error('reason')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                <span class="text-red-500 text-sm error" id="error-reason"></span>
                            </div>

                            {{-- Applied create2's enhanced guidelines section --}}
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-blue-800">Application Guidelines</h3>
                                        <div class="mt-2 text-sm text-blue-700">
                                            <ul class="list-disc list-inside space-y-1">
                                                <li>Select the appropriate leave type for your request</li>
                                                <li>Provide sufficient notice period as per company policy</li>
                                                <li>Include detailed reason to expedite the approval process</li>
                                                <li>Contact HR for any questions regarding leave policies</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Applied create2's enhanced responsive submit buttons --}}
                            <div class="flex flex-col sm:flex-row items-center justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-6 border-t border-gray-200">
                                <a href="{{ route('leaves.index') }}"
                                   class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-gray-700 bg-white font-semibold rounded-lg shadow-sm hover:bg-gray-50 hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-gray-300">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Cancel
                                </a>
                                <button type="submit" form="leaveForm"
                                        class="w-full sm:w-auto theme-app inline-flex items-center justify-center px-8 py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4"
                                        style="background-color: var(--hover-bg); color: var(--primary-text);">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                    Submit Application
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Keep create1's original JavaScript validation (not create2's complex validation) --}}
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('leaveForm');
            const leaveTypeSelect = document.getElementById('leave_type_id');
            const startDateInput = document.getElementById('start_date');
            const endDateInput = document.getElementById('end_date');
            const medicalCertInput = document.getElementById('proof_sick');
            const reasonInput = document.getElementById('reason');

            const medicalCertRequired = document.getElementById('medical-cert-required');
            const medicalCertHelp = document.getElementById('medical-cert-help');

            // Set minimum date to today
            const today = new Date().toISOString().split('T')[0];
            startDateInput.setAttribute('min', today);
            endDateInput.setAttribute('min', today);

            function calculateDays(startDate, endDate) {
                if (!startDate || !endDate) return 0;
                const start = new Date(startDate);
                const end = new Date(endDate);
                const diff = (end - start) / (1000 * 3600 * 24) + 1;
                return diff > 0 ? diff : 0;
            }

            function isSickLeave() {
                const option = leaveTypeSelect.options[leaveTypeSelect.selectedIndex];
                return option && option.text.toLowerCase().includes('sick');
            }

            function updateMedicalCertUI() {
                const days = calculateDays(startDateInput.value, endDateInput.value);
                if (isSickLeave() && days > 3) {
                    medicalCertRequired.classList.remove('hidden');
                    if (medicalCertHelp) {
                        medicalCertHelp.textContent = `(Required for Sick Leave more than 3 days - Current: ${days} days)`;
                        medicalCertHelp.classList.add('text-red-500');
                        medicalCertHelp.classList.remove('text-gray-500');
                    }
                } else {
                    medicalCertRequired.classList.add('hidden');
                    if (medicalCertHelp) {
                        medicalCertHelp.textContent = '(Required for Sick Leave more than 3 days)';
                        medicalCertHelp.classList.remove('text-red-500');
                        medicalCertHelp.classList.add('text-gray-500');
                    }
                }
            }

            function addErrorBorder(element) {
                element.style.borderColor = '#ef4444';
                element.style.boxShadow = '0 0 0 3px rgba(239, 68, 68, 0.1)';
            }

            function removeErrorBorder(element) {
                element.style.borderColor = 'var(--border-color, #d1d5db)';
                element.style.boxShadow = '';
            }

            leaveTypeSelect.addEventListener('change', updateMedicalCertUI);
            startDateInput.addEventListener('change', function() {
                updateMedicalCertUI();
                if (endDateInput.value && startDateInput.value > endDateInput.value) {
                    endDateInput.value = startDateInput.value;
                }
                endDateInput.setAttribute('min', startDateInput.value);
            });
            endDateInput.addEventListener('change', updateMedicalCertUI);

            form.addEventListener('submit', function (e) {
                let valid = true;

                // Clear old errors and borders
                document.querySelectorAll(".error").forEach(el => el.textContent = "");
                [leaveTypeSelect, startDateInput, endDateInput, medicalCertInput, reasonInput].forEach(removeErrorBorder);

                if (!leaveTypeSelect.value) {
                    document.getElementById("error-leave-type").textContent = "Please select a leave type.";
                    addErrorBorder(leaveTypeSelect);
                    valid = false;
                }

                if (!startDateInput.value) {
                    document.getElementById("error-start-date").textContent = "Start date is required.";
                    addErrorBorder(startDateInput);
                    valid = false;
                }

                if (!endDateInput.value) {
                    document.getElementById("error-end-date").textContent = "End date is required.";
                    addErrorBorder(endDateInput);
                    valid = false;
                }

                if (!reasonInput.value.trim()) {
                    document.getElementById("error-reason").textContent = "Reason is required.";
                    addErrorBorder(reasonInput);
                    valid = false;
                }

                const days = calculateDays(startDateInput.value, endDateInput.value);
                if (isSickLeave() && days > 3 && medicalCertInput.files.length === 0) {
                    document.getElementById("error-proof").textContent = "Medical Certificate is required for Sick Leave more than 3 days.";
                    addErrorBorder(medicalCertInput);
                    valid = false;
                }

                if (!valid) {
                    e.preventDefault();
                    // Scroll to first error
                    const firstError = document.querySelector('.error:not(:empty)');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            });

            // Initial UI update
            updateMedicalCertUI();
        });
        </script>
    @endcan
</x-app-layout>