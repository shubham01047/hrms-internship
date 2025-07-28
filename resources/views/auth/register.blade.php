<x-guest-layout>
    <div class="theme-app min-h-screen flex items-center justify-center gradient-bg p-4">
        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md overflow-hidden fade-in">

            <!-- Header Section -->
            <div class="bg-primary text-center p-8">
                <img src="{{ asset($company->company_logo ?? 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png') }}"
                     alt="Company Logo"
                     class="w-16 h-16 mx-auto mb-4 rounded-full bg-white/20 p-2">
                <h3 class="text-primary text-2xl font-bold">{{ $company->system_title ?? 'HRMS Portal' }}</h3>
                <p class="text-primary text-sm font-medium">{{ $company->company_description ?? 'Create Your Account' }}</p>
            </div>

            <!-- Form Section -->
            <div class="p-8">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-gray-700 font-semibold mb-2">Full Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-4 focus:ring-primary-light outline-none transition-all">
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-gray-700 font-semibold mb-2">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-4 focus:ring-primary-light outline-none transition-all">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Password -->
                    <div class="relative">
                        <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                        <input id="password" type="password" name="password" required
                               class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl focus:ring-4 focus:ring-primary-light outline-none transition-all">
                        <span id="togglePassword" class="absolute right-4 top-11 text-gray-500 cursor-pointer">
                            <i class="bi bi-eye-slash" id="toggleIcon"></i>
                        </span>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="relative">
                        <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                               class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl focus:ring-4 focus:ring-primary-light outline-none transition-all">
                        <span id="togglePasswordConfirm" class="absolute right-4 top-11 text-gray-500 cursor-pointer">
                            <i class="bi bi-eye-slash" id="toggleIconConfirm"></i>
                        </span>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Register Button -->
                    <button type="submit"
                            class="w-full py-3 bg-primary hover:bg-hover text-primary rounded-xl font-semibold shadow-lg hover:scale-105 transition-all duration-200">
                        Register
                    </button>

                    <!-- Google Sign Up -->
                    @if (Route::has('google.auth'))
                        <button type="button"
                                onclick="window.location.href='{{ route('google.auth') }}'"
                                class="w-full py-3 border border-gray-300 rounded-xl flex items-center justify-center gap-3 hover:bg-gray-50 transition-all">
                            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" class="w-5 h-5">
                            Sign up with Google
                        </button>
                    @endif

                    <!-- Already Registered -->
                    @if (Route::has('login'))
                        <p class="text-center text-gray-600 text-sm">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-primary hover:underline">Login</a>
                        </p>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <style>
        .gradient-bg {
            background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg), var(--primary-bg));
            background-size: 300% 300%;
            animation: gradientMove 8s ease infinite;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes fade-in {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fade-in 0.8s ease-in-out;
        }
    </style>

    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        const toggleIcon = document.getElementById('toggleIcon');

        togglePassword.addEventListener('click', () => {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            toggleIcon.classList.toggle('bi-eye');
            toggleIcon.classList.toggle('bi-eye-slash');
        });

        const confirmPasswordInput = document.getElementById('password_confirmation');
        const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
        const toggleIconConfirm = document.getElementById('toggleIconConfirm');

        togglePasswordConfirm.addEventListener('click', () => {
            const type = confirmPasswordInput.type === 'password' ? 'text' : 'password';
            confirmPasswordInput.type = type;
            toggleIconConfirm.classList.toggle('bi-eye');
            toggleIconConfirm.classList.toggle('bi-eye-slash');
        });
    </script>
</x-guest-layout>
