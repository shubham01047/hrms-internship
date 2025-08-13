<x-guest-layout>
<div class="theme-app min-h-screen flex items-center justify-center p-2 sm:p-4 relative overflow-hidden">
    <!-- Updated background elements to match login page -->
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-32 h-32 rounded-full opacity-10 animate-float-slow" 
             style="background: var(--hover-bg);"></div>
        <div class="absolute top-40 right-20 w-24 h-24 rounded-full opacity-15 animate-float-medium" 
             style="background: var(--secondary-bg);"></div>
        <div class="absolute bottom-32 left-1/4 w-40 h-40 rounded-full opacity-8 animate-float-fast" 
             style="background: var(--primary-border);"></div>
        <div class="absolute bottom-20 right-10 w-28 h-28 rounded-full opacity-12 animate-float-slow" 
             style="background: var(--hover-bg);"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 rounded-full opacity-5 animate-pulse-slow" 
             style="background: radial-gradient(circle, var(--secondary-bg), transparent);"></div>
    </div>

    <!-- Updated gradient background to match login page -->
    <!-- Gradient Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100"></div>
    
    <!-- Backdrop Blur Overlay -->
    <div class="absolute inset-0 backdrop-blur-sm bg-white/30"></div>

    <!-- Updated form card styling to match login page -->
    <!-- Updated form card with professional styling and corporate theme -->
    <div class="relative bg-white/90 backdrop-blur-md rounded-3xl shadow-2xl w-full max-w-lg mx-auto overflow-hidden border border-white/20 hover:shadow-3xl transition-all duration-500">
        
        <!-- Header Section -->
        <div class="text-center p-6 relative" style="background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg));">
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
            <img src="{{ asset($company->company_logo ?? 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png') }}"
                 alt="Company Logo"
                 class="w-16 h-16 mx-auto mb-4 rounded-full bg-white/20 p-2 relative z-10">
            <h3 class="text-2xl font-bold mb-2 relative z-10" style="color: var(--primary-text);">
                {{ $company->system_title ?? 'HRMS Portal' }}
            </h3>
            <p class="text-sm font-medium relative z-10" style="color: var(--secondary-text);">
                Create your account
            </p>
        </div>

        <!-- Updated form section styling to match login page -->
        <!-- Form Section -->
        <div class="p-6">
            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block font-semibold mb-1 text-sm" style="color: var(--primary-bg);">
                        Full Name
                    </label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                           class="w-full px-3 py-2.5 border rounded-xl outline-none transition-all duration-300 bg-white/80 backdrop-blur-sm hover:bg-white focus:bg-white text-sm"
                           style="border-color: var(--primary-border); color: var(--primary-bg);"
                           onfocus="this.style.borderColor='var(--hover-bg)'; this.style.boxShadow='0 0 0 3px rgba(37, 99, 235, 0.1)'"
                           onblur="this.style.borderColor='var(--primary-border)'; this.style.boxShadow='none'">
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-red-500 text-xs" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block font-semibold mb-1 text-sm" style="color: var(--primary-bg);">
                        Email Address
                    </label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                           class="w-full px-3 py-2.5 border rounded-xl outline-none transition-all duration-300 bg-white/80 backdrop-blur-sm hover:bg-white focus:bg-white text-sm"
                           style="border-color: var(--primary-border); color: var(--primary-bg);"
                           onfocus="this.style.borderColor='var(--hover-bg)'; this.style.boxShadow='0 0 0 3px rgba(37, 99, 235, 0.1)'"
                           onblur="this.style.borderColor='var(--primary-border)'; this.style.boxShadow='none'">
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-xs" />
                </div>

                <!-- Password -->
                <div class="relative">
                    <label for="password" class="block font-semibold mb-1 text-sm" style="color: var(--primary-bg);">
                        Password
                    </label>
                    <input id="password" type="password" name="password" required
                           class="w-full px-3 py-2.5 pr-10 border rounded-xl outline-none transition-all duration-300 bg-white/80 backdrop-blur-sm hover:bg-white focus:bg-white text-sm"
                           style="border-color: var(--primary-border); color: var(--primary-bg);"
                           onfocus="this.style.borderColor='var(--hover-bg)'; this.style.boxShadow='0 0 0 3px rgba(37, 99, 235, 0.1)'"
                           onblur="this.style.borderColor='var(--primary-border)'; this.style.boxShadow='none'">
                    <span id="togglePassword" class="absolute right-3 top-8 cursor-pointer transition-colors duration-200 text-sm"
                          style="color: var(--secondary-text);"
                          onmouseover="this.style.color='var(--hover-bg)'"
                          onmouseout="this.style.color='var(--secondary-text)'">
                        <i class="bi bi-eye-slash" id="toggleIcon"></i>
                    </span>
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500 text-xs" />
                </div>

                <!-- Confirm Password -->
                <div class="relative">
                    <label for="password_confirmation" class="block font-semibold mb-1 text-sm" style="color: var(--primary-bg);">
                        Confirm Password
                    </label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                           class="w-full px-3 py-2.5 pr-10 border rounded-xl outline-none transition-all duration-300 bg-white/80 backdrop-blur-sm hover:bg-white focus:bg-white text-sm"
                           style="border-color: var(--primary-border); color: var(--primary-bg);"
                           onfocus="this.style.borderColor='var(--hover-bg)'; this.style.boxShadow='0 0 0 3px rgba(37, 99, 235, 0.1)'"
                           onblur="this.style.borderColor='var(--primary-border)'; this.style.boxShadow='none'">
                    <span id="togglePasswordConfirm" class="absolute right-3 top-8 cursor-pointer transition-colors duration-200 text-sm"
                          style="color: var(--secondary-text);"
                          onmouseover="this.style.color='var(--hover-bg)'"
                          onmouseout="this.style.color='var(--secondary-text)'">
                        <i class="bi bi-eye-slash" id="toggleIconConfirm"></i>
                    </span>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-500 text-xs" />
                </div>

                <!-- Register Button -->
                <button type="submit"
                        class="w-full py-2.5 rounded-xl font-semibold shadow-lg transition-all duration-300 transform hover:scale-105 hover:shadow-xl text-sm"
                        style="background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg)); color: var(--primary-text);"
                        onmouseover="this.style.background='var(--hover-bg)'"
                        onmouseout="this.style.background='linear-gradient(135deg, var(--primary-bg), var(--secondary-bg))'">
                    Register
                </button>

                <!-- Google Register -->
                @if (Route::has('google.auth'))
                    <button type="button"
                            onclick="window.location.href='{{ route('google.auth') }}'"
                            class="w-full py-2.5 border rounded-xl flex items-center justify-center gap-2 transition-all duration-300 bg-white/80 backdrop-blur-sm hover:bg-white hover:shadow-md text-sm"
                            style="border-color: var(--primary-border); color: var(--primary-bg);">
                        <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" class="w-4 h-4">
                        Sign up with Google
                    </button>
                @endif

                <!-- Already Registered -->
                @if (Route::has('login'))
                    <p class="text-center text-xs" style="color: var(--secondary-text);">
                        Already have an account?
                        <a href="{{ route('login') }}" 
                           class="hover:underline transition-colors duration-200"
                           style="color: var(--hover-bg);"
                           onmouseover="this.style.color='var(--primary-bg)'"
                           onmouseout="this.style.color='var(--hover-bg)'">
                            Login
                        </a>
                    </p>
                @endif
            </form>
        </div>
    </div>
</div>

<style>
    .theme-app {
        --primary-bg: #0b1f3a;
        --primary-bg-light: #102c4e;
        --primary-text: #f8fafc;
        --primary-border: #1e3a5f;
        --hover-bg: #2563eb;
        --secondary-bg: #2c4e9c;
        --secondary-text: #cbd5e1;
    }

    /* Updated animations to match login page */
    /* Added floating animations and enhanced visual effects */
    @keyframes float-slow {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }
    
    @keyframes float-medium {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-15px) rotate(-180deg); }
    }
    
    @keyframes float-fast {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-10px) rotate(360deg); }
    }
    
    @keyframes pulse-slow {
        0%, 100% { opacity: 0.05; transform: scale(1); }
        50% { opacity: 0.1; transform: scale(1.05); }
    }
    
    .animate-float-slow { animation: float-slow 6s ease-in-out infinite; }
    .animate-float-medium { animation: float-medium 4s ease-in-out infinite; }
    .animate-float-fast { animation: float-fast 3s ease-in-out infinite; }
    .animate-pulse-slow { animation: pulse-slow 4s ease-in-out infinite; }
    
    .shadow-3xl {
        box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.25);
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
