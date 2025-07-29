<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-gradient-to-r from-gray-50 to-gray-100 p-6 rounded-lg shadow-sm">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg shadow-md">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    Edit Employee
                </h2>
            </div>
            <a href="{{ route('employees.index') }}" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-500 to-gray-600 text-white font-semibold rounded-lg shadow-lg hover:from-gray-600 hover:to-gray-700 hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-gray-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to List
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-200">
                <div class="bg-gradient-to-r from-blue-50 to-blue-100 px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-white rounded-lg shadow-sm">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Update Employee Information</h3>
                            <p class="text-sm text-gray-600">Modify the employee details below</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-8">
                    <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="hidden" name="user_id" value="{{ $employee->user_id }}">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label>First Name</label>
            <input type="text" name="first_name" value="{{ old('first_name', $employee->first_name) }}" required class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label>Last Name</label>
            <input type="text" name="last_name" value="{{ old('last_name', $employee->last_name) }}" required class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label>Gender</label>
            <select name="gender" required class="w-full border rounded px-3 py-2">
                <option value="">Select</option>
                <option value="male" {{ $employee->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $employee->gender == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ $employee->gender == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div>
            <label>Date of Birth</label>
            <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $employee->date_of_birth) }}" required class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $employee->email) }}" required class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label>Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $employee->phone) }}" required class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label>Address</label>
            <input type="text" name="address" value="{{ old('address', $employee->address) }}" required class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label>City</label>
            <input type="text" name="city" value="{{ old('city', $employee->city) }}" required class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label>State</label>
            <input type="text" name="state" value="{{ old('state', $employee->state) }}" required class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label>Postal Code</label>
            <input type="text" name="postal_code" value="{{ old('postal_code', $employee->postal_code) }}" required class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label>Country</label>
            <input type="text" name="country" value="{{ old('country', $employee->country) }}" required class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label>Joining Date</label>
            <input type="date" name="joining_date" value="{{ old('joining_date', $employee->joining_date) }}" required class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label>Employment Type</label>
            <select name="employment_type" required class="w-full border rounded px-3 py-2">
                <option value="">Select</option>
                <option value="full-time" {{ $employee->employment_type == 'full-time' ? 'selected' : '' }}>Full-Time</option>
                <option value="part-time" {{ $employee->employment_type == 'part-time' ? 'selected' : '' }}>Part-Time</option>
                <option value="contract" {{ $employee->employment_type == 'contract' ? 'selected' : '' }}>Contract</option>
            </select>
        </div>

        <div>
            <label>Status</label>
            <select name="status" required class="w-full border rounded px-3 py-2">
                <option value="">Select</option>
                <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $employee->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                <option value="terminated" {{ $employee->status == 'terminated' ? 'selected' : '' }}>Terminated</option>
            </select>
        </div>

        <div>
            <label>Resume (PDF only)</label>
            <input type="file" name="resume" accept="application/pdf" class="w-full border rounded px-3 py-2">
            @if ($employee->resume)
                <a href="{{ asset('storage/' . $employee->resume) }}" target="_blank" class="text-sm text-blue-600 underline block mt-1">View current resume</a>
            @endif
        </div>

        <div>
            <label>ID Proof (Image/PDF)</label>
            <input type="file" name="id_proof" accept="image/*,application/pdf" class="w-full border rounded px-3 py-2">
            @if ($employee->id_proof)
                <a href="{{ asset('storage/' . $employee->id_proof) }}" target="_blank" class="text-sm text-blue-600 underline block mt-1">View current ID proof</a>
            @endif
        </div>
    </div>

    <div class="mt-6">
        <button type="submit" class="bg-primary text-white px-4 py-2 rounded">Update Employee</button>
    </div>
</form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
