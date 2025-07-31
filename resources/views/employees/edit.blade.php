<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Edit Employee</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <<form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                    <div>
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $employee->name }}"
                            class="w-full border p-2 rounded">
                    </div>

                    <div>
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $employee->email }}"
                            class="w-full border p-2 rounded">
                    </div>

                    <div>
                        <label>Gender</label>
                        <select name="gender" class="w-full border p-2 rounded">
                            <option value="">Select</option>
                            <option value="male" {{ $employee->gender === 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $employee->gender === 'female' ? 'selected' : '' }}>Female
                            </option>
                            <option value="other" {{ $employee->gender === 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div>
                        <label>Date of Birth</label>
                        <input type="date" name="date_of_birth" value="{{ $employee->date_of_birth }}"
                            class="w-full border p-2 rounded">
                    </div>

                    <div>
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{ $employee->phone }}"
                            class="w-full border p-2 rounded">
                    </div>

                    <div>
                        <label>Address</label>
                        <textarea name="address" class="w-full border p-2 rounded">{{ $employee->address }}</textarea>
                    </div>

                    <div>
                        <label>City</label>
                        <input type="text" name="city" value="{{ $employee->city }}"
                            class="w-full border p-2 rounded">
                    </div>

                    <div>
                        <label>State</label>
                        <input type="text" name="state" value="{{ $employee->state }}"
                            class="w-full border p-2 rounded">
                    </div>

                    <div>
                        <label>Postal Code</label>
                        <input type="text" name="postal_code" value="{{ $employee->postal_code }}"
                            class="w-full border p-2 rounded">
                    </div>

                    <div>
                        <label>Country</label>
                        <input type="text" name="country" value="{{ $employee->country }}"
                            class="w-full border p-2 rounded">
                    </div>

                    <div>
                        <label>Joining Date</label>
                        <input type="date" name="joining_date" value="{{ $employee->joining_date }}"
                            class="w-full border p-2 rounded">
                    </div>

                    <div>
                        <label>Employment Type</label>
                        <select name="employment_type" class="w-full border p-2 rounded">
                            <option value="full_time"
                                {{ $employee->employment_type === 'full_time' ? 'selected' : '' }}>Full Time</option>
                            <option value="part_time"
                                {{ $employee->employment_type === 'part_time' ? 'selected' : '' }}>Part Time</option>
                            <option value="intern" {{ $employee->employment_type === 'intern' ? 'selected' : '' }}>
                                Intern</option>
                        </select>
                    </div>

                    <div>
                        <label>Status</label>
                        <select name="status" class="w-full border p-2 rounded">
                            <option value="active" {{ $employee->status === 'active' ? 'selected' : '' }}>Active
                            </option>
                            <option value="inactive" {{ $employee->status === 'inactive' ? 'selected' : '' }}>Inactive
                            </option>
                            <option value="terminated" {{ $employee->status === 'terminated' ? 'selected' : '' }}>
                                Terminated</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Update Employee
                    </button>
                </div>
                </form>
        </div>
    </div>
</x-app-layout>