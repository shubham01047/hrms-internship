<x-app-layout>
    <x-slot name="header">
        <div class="theme-app flex items-center justify-between p-6 rounded-lg shadow-sm"
             style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
            <div class="flex items-center gap-3">
                <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                    <svg class="w-6 h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-2xl leading-tight" style="color: var(--primary-text);">
                        Create Leave Type
                    </h2>
                    <p class="text-sm" style="color: var(--secondary-text);">
                        Add a new leave category for your organization
                    </p>
                </div>
            </div>

            <a href="{{ route('leave-types.index') }}"
               class="inline-flex items-center px-4 py-2 rounded-md font-semibold shadow-sm transition-all hover:scale-[1.02]"
               style="background-color: var(--primary-bg-light); color: var(--primary-text);">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back
            </a>
        </div>
    </x-slot>

    <div class="theme-app bg-gray-50">
        <div class="mx-auto px-3 sm:px-4 md:px-6 py-4 md:py-6">
            @if ($errors->any())
                <div class="mb-4 sm:mb-6 rounded-lg border px-3 sm:px-4 py-3 bg-white" style="border-color: var(--primary-border);">
                    <div class="flex items-start gap-3">
                        <div class="p-1 rounded-md" style="background-color: var(--hover-bg);">
                            <svg class="w-4 h-4" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 9v2m0 4h.01M4.93 4.93l14.14 14.14M12 22C6.48 22 2 17.52 2 12S6.48 2 12 2s10 4.48 10 10-4.48 10-10 10z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-sm text-gray-900">Please fix the following:</p>
                            <ul class="mt-2 list-disc list-inside text-sm text-gray-700">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white shadow-xl border rounded-md sm:rounded-lg overflow-hidden" style="border-color: var(--primary-border);">
                <div class="px-3 sm:px-4 md:px-6 py-4 border-b"
                     style="border-color: var(--primary-border); background-image: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                    <h3 class="text-base sm:text-lg font-semibold" style="color: var(--primary-text);">Leave Type Details</h3>
                    <p class="text-xs sm:text-sm" style="color: var(--secondary-text);">Fields marked with an asterisk are required</p>
                </div>

                <!-- Added form validation with novalidate and onsubmit handler -->
                <form action="{{ route('leave-types.store') }}" method="POST" class="p-3 sm:p-4 md:p-6 space-y-5 sm:space-y-6" id="leaveTypeForm" novalidate onsubmit="return validateForm()">
                    @csrf

                    <div class="grid grid-cols-1 gap-5 sm:gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium mb-1 text-gray-800">
                                Name <span class="text-red-500">*</span>
                            </label>
                            <!-- Added validation attributes and error styling -->
                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                minlength="2"
                                maxlength="100"
                                pattern="^[a-zA-Z0-9\s\-_.,()]+$"
                                class="w-full rounded-md border px-3 py-2 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 @error('name') border-red-500 @enderror"
                                style="border-color: var(--primary-border); --tw-ring-color: var(--hover-bg);"
                                placeholder="e.g., Sick Leave, Casual Leave"
                                oninput="validateName()"
                            >
                            <!-- Added client-side error message -->
                            <div id="nameError" class="text-red-500 text-sm mt-1 hidden"></div>
                            @error('name')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium mb-1 text-gray-800">
                                Description
                                <!-- Added character counter -->
                                <span class="text-gray-500 text-xs ml-1">(<span id="charCount">0</span>/500 characters)</span>
                            </label>
                            <!-- Added validation attributes and character counter -->
                            <textarea
                                id="description"
                                name="description"
                                rows="4"
                                maxlength="500"
                                class="w-full rounded-md border px-3 py-2 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 @error('description') border-red-500 @enderror"
                                style="border-color: var(--primary-border); --tw-ring-color: var(--hover-bg);"
                                placeholder="Add a short description (optional)"
                                oninput="updateCharCount()"
                            >{{ old('description') }}</textarea>
                            <!-- Added client-side error message -->
                            <div id="descriptionError" class="text-red-500 text-sm mt-1 hidden"></div>
                            @error('description')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 pt-1">
                        <a href="{{ route('leave-types.index') }}"
                           class="inline-flex items-center justify-center px-4 py-2 rounded-md font-semibold transition-all border hover:scale-[1.01] w-full sm:w-auto"
                           style="border-color: var(--primary-border); color: var(--secondary-bg); background-color: #fff;">
                            Cancel
                        </a>

                        <button type="submit"
                                class="inline-flex items-center justify-center px-5 py-2 rounded-md font-semibold shadow-sm transition-all hover:shadow-md hover:scale-[1.01] w-full sm:w-auto"
                                style="background-color: var(--hover-bg); color: var(--primary-text);">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Added client-side validation JavaScript -->
    <script>
        function validateName() {
            const nameInput = document.getElementById('name');
            const nameError = document.getElementById('nameError');
            const name = nameInput.value.trim();
            
            nameError.classList.add('hidden');
            nameInput.classList.remove('border-red-500');
            
            if (name.length === 0) {
                showError(nameInput, nameError, 'Leave type name is required.');
                return false;
            }
            
            if (name.length < 2) {
                showError(nameInput, nameError, 'Name must be at least 2 characters long.');
                return false;
            }
            
            if (name.length > 100) {
                showError(nameInput, nameError, 'Name cannot exceed 100 characters.');
                return false;
            }
            
            const pattern = /^[a-zA-Z0-9\s\-_.,()]+$/;
            if (!pattern.test(name)) {
                showError(nameInput, nameError, 'Name can only contain letters, numbers, spaces, and basic punctuation.');
                return false;
            }
            
            return true;
        }
        
        function validateDescription() {
            const descInput = document.getElementById('description');
            const descError = document.getElementById('descriptionError');
            const description = descInput.value.trim();
            
            descError.classList.add('hidden');
            descInput.classList.remove('border-red-500');
            
            if (description.length > 500) {
                showError(descInput, descError, 'Description cannot exceed 500 characters.');
                return false;
            }
            
            return true;
        }
        
        function updateCharCount() {
            const description = document.getElementById('description').value;
            const charCount = document.getElementById('charCount');
            charCount.textContent = description.length;
            
            if (description.length > 450) {
                charCount.style.color = '#ef4444';
            } else {
                charCount.style.color = '#6b7280';
            }
            
            validateDescription();
        }
        
        function showError(input, errorDiv, message) {
            input.classList.add('border-red-500');
            errorDiv.textContent = message;
            errorDiv.classList.remove('hidden');
        }
        
        function validateForm() {
            const isNameValid = validateName();
            const isDescValid = validateDescription();
            
            if (!isNameValid || !isDescValid) {
                const firstError = document.querySelector('.border-red-500');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    firstError.focus();
                }
                return false;
            }
            
            return true;
        }
        
        // Initialize character count on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateCharCount();
        });
    </script>
</x-app-layout>
