<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-black leading-tight">
                Create Employee
            </h2>
            <a href="{{ route('employees.index') }}" class="back-button">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Section: Personal Information --}}
                        <h3 class="text-lg text-white bg-gradient-to-r from-[#ff2626] to-[#ff6969] shadow-md p-4 rounded-md font-semibold mb-4">Personal Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div>
                                <label class="lable">First Name:</label>
                                <input type="text" name="first_name" value="{{ old('first_name') }}" class="input-field">
                                @error('first_name') <span>{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="lable">Last Name:</label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}" class="input-field">
                                @error('last_name') <span>{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="lable">Gender:</label>
                                <select name="gender" class="input-field">
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('gender') <span>{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="lable">Date of Birth:</label>
                                <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="input-field">
                                @error('date_of_birth') <span>{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="lable">Email:</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="input-field">
                                @error('email') <span>{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="lable">Phone:</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" class="input-field">
                                @error('phone') <span>{{ $message }}</span> @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="lable">Address:</label>
                                <textarea name="address" class="input-field">{{ old('address') }}</textarea>
                                @error('address') <span>{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="lable">City:</label>
                                <input type="text" name="city" value="{{ old('city') }}" class="input-field">
                                @error('city') <span>{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="lable">State:</label>
                                <input type="text" name="state" value="{{ old('state') }}" class="input-field">
                                @error('state') <span>{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="lable">Postal Code:</label>
                                <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="input-field">
                                @error('postal_code') <span>{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="lable">Country:</label>
                                <input type="text" name="country" value="{{ old('country') }}" class="input-field">
                                @error('country') <span>{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- Section: Employment Details --}}
                        <h3 class="text-lg text-white bg-gradient-to-r from-[#ff2626] to-[#ff6969] shadow-md p-4 rounded-md font-semibold mb-4">Employment Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div>
                                <label class="lable">Joining Date:</label>
                                <input type="date" name="joining_date" value="{{ old('joining_date') }}" class="input-field">
                                @error('joining_date') <span>{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="lable">Employment Type:</label>
                                <select name="employment_type" class="input-field">
                                    <option value="full_time" {{ old('employment_type') == 'full_time' ? 'selected' : '' }}>Full Time</option>
                                    <option value="part_time" {{ old('employment_type') == 'part_time' ? 'selected' : '' }}>Part Time</option>
                                    <option value="intern" {{ old('employment_type') == 'intern' ? 'selected' : '' }}>Intern</option>
                                </select>
                                @error('employment_type') <span>{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="lable">Status:</label>
                                <select name="status" class="input-field">
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    <option value="terminated" {{ old('status') == 'terminated' ? 'selected' : '' }}>Terminated</option>
                                </select>
                                @error('status') <span>{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="lable">User ID:</label>
                                <input type="number" name="user_id" value="{{ old('user_id') }}" class="input-field">
                                @error('user_id') <span>{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- Section: Documents --}}
                        <h3 class="text-lg text-white bg-gradient-to-r from-[#ff2626] to-[#ff6969] shadow-md p-4 rounded-md font-semibold mb-4">Documents</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div>
                                <label class="lable">Resume (PDF):</label>
                                <input type="file" name="resume" accept=".pdf" class="input-field">
                                @error('resume') <span>{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="lable">ID Proof (Image or PDF):</label>
                                <input type="file" name="id_proof" accept=".pdf,.jpg,.jpeg,.png" class="input-field">
                                @error('id_proof') <span>{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- Submit Buttons --}}
                        <div class="flex items-center space-x-4">
                            <button class="success-button">Submit</button>
                            <a href="{{ route('employees.index') }}" class="danger-button">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
