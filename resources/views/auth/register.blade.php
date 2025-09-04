<x-guest-layout>
<div class="theme-app min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    
    <!-- Background Gradient & Animated Shapes (exact from login page) -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100"></div>
    <div class="absolute inset-0 backdrop-blur-sm bg-white/30"></div>

    <!-- Floating Circles (exact positioning and sizing from login) -->
    <div class="absolute top-10 left-12 w-36 h-36 rounded-full opacity-10 animate-float-slow" style="background: var(--hover-bg);"></div>
    <div class="absolute top-48 right-16 w-28 h-28 rounded-full opacity-15 animate-float-medium" style="background: var(--secondary-bg);"></div>
    <div class="absolute bottom-32 left-1/3 w-44 h-44 rounded-full opacity-8 animate-float-fast" style="background: var(--primary-border);"></div>
    <div class="absolute bottom-16 right-12 w-32 h-32 rounded-full opacity-12 animate-float-slow" style="background: var(--hover-bg);"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[28rem] h-[28rem] rounded-full opacity-5 animate-pulse-slow" style="background: radial-gradient(circle, var(--secondary-bg), transparent);"></div>

    <!-- Register Card -->
    <div class="relative bg-white/90 backdrop-blur-md rounded-3xl shadow-2xl w-full max-w-lg border border-white/20 overflow-hidden hover:shadow-3xl transition-all duration-500">
        
        <!-- Header -->
        <div class="text-center p-6 sm:p-8 relative" style="background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg));">
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
            <!-- Replaced dynamic logo with application logo component for consistency -->
            <div class="flex justify-center items-center mb-4">
                <x-application-logo class="w-14 h-14 sm:w-16 sm:h-16" />
            </div>
            <h3 class="text-xl sm:text-2xl font-bold mb-2 relative z-10" style="color: var(--primary-text);">
                {{ $company->system_title ?? 'HRMS Portal' }}
            </h3>
            <p class="text-xs sm:text-sm font-medium relative z-10" style="color: var(--secondary-text);">
                Create your account
            </p>
        </div>

        <!-- Form -->
        <div class="p-6 sm:p-8">
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold mb-2" style="color: var(--primary-bg);">Full Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                           class="w-full px-4 py-3 border rounded-xl outline-none transition-all duration-300 bg-white/80 backdrop-blur-sm hover:bg-white focus:bg-white text-sm"
                           style="border-color: var(--primary-border); color: var(--primary-bg);"
                           onfocus="this.style.borderColor='var(--hover-bg)'; this.style.boxShadow='0 0 0 3px rgba(37, 99, 235, 0.1)'"
                           onblur="this.style.borderColor='var(--primary-border)'; this.style.boxShadow='none'">
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-xs" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold mb-2" style="color: var(--primary-bg);">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                           class="w-full px-4 py-3 border rounded-xl outline-none transition-all duration-300 bg-white/80 backdrop-blur-sm hover:bg-white focus:bg-white text-sm"
                           style="border-color: var(--primary-border); color: var(--primary-bg);"
                           onfocus="this.style.borderColor='var(--hover-bg)'; this.style.boxShadow='0 0 0 3px rgba(37, 99, 235, 0.1)'"
                           onblur="this.style.borderColor='var(--primary-border)'; this.style.boxShadow='none'">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-xs" />
                </div>

                <!-- Password -->
                <div class="relative">
                    <label for="password" class="block text-sm font-semibold mb-2" style="color: var(--primary-bg);">Password</label>
                    <input id="password" type="password" name="password" required
                           class="w-full px-4 py-3 pr-12 border rounded-xl outline-none transition-all duration-300 bg-white/80 backdrop-blur-sm hover:bg-white focus:bg-white text-sm"
                           style="border-color: var(--primary-border); color: var(--primary-bg);"
                           onfocus="this.style.borderColor='var(--hover-bg)'; this.style.boxShadow='0 0 0 3px rgba(37, 99, 235, 0.1)'"
                           onblur="this.style.borderColor='var(--primary-border)'; this.style.boxShadow='none'">
                    <span id="togglePassword" class="absolute right-4 top-11 cursor-pointer transition-colors duration-200"
                          style="color: var(--secondary-text);"
                          onmouseover="this.style.color='var(--hover-bg)'"
                          onmouseout="this.style.color='var(--secondary-text)'">
                        <i class="bi bi-eye-slash text-sm" id="toggleIcon"></i>
                    </span>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-xs" />
                </div>

                <!-- Confirm Password -->
                <div class="relative">
                    <label for="password_confirmation" class="block text-sm font-semibold mb-2" style="color: var(--primary-bg);">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                           class="w-full px-4 py-3 pr-12 border rounded-xl outline-none transition-all duration-300 bg-white/80 backdrop-blur-sm hover:bg-white focus:bg-white text-sm"
                           style="border-color: var(--primary-border); color: var(--primary-bg);"
                           onfocus="this.style.borderColor='var(--hover-bg)'; this.style.boxShadow='0 0 0 3px rgba(37, 99, 235, 0.1)'"
                           onblur="this.style.borderColor='var(--primary-border)'; this.style.boxShadow='none'">
                    <span id="togglePasswordConfirm" class="absolute right-4 top-11 cursor-pointer transition-colors duration-200"
                          style="color: var(--secondary-text);"
                          onmouseover="this.style.color='var(--hover-bg)'"
                          onmouseout="this.style.color='var(--secondary-text)'">
                        <i class="bi bi-eye-slash text-sm" id="toggleIconConfirm"></i>
                    </span>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-xs" />
                </div>


                <!-- Register Button -->
                <button type="submit"
                        class="w-full py-3 rounded-xl text-sm font-semibold shadow-lg transition-all duration-300 transform hover:scale-105 hover:shadow-xl"
                        style="background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg)); color: var(--primary-text);"
                        onmouseover="this.style.background='var(--hover-bg)'"
                        onmouseout="this.style.background='linear-gradient(135deg, var(--primary-bg), var(--secondary-bg))'">
                    Register
                </button>

                <!-- Register with Face Recognition Button -->
                <button type="button" id="faceRegisterBtn"
                        class="theme-app w-full py-3 mt-3 rounded-xl text-sm font-semibold shadow-lg flex items-center justify-center gap-2 transition-all duration-300 transform hover:scale-105 hover:shadow-xl"
                        style="background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg)); color: var(--primary-text);"
                        onmouseover="this.style.background='var(--hover-bg)'"
                        onmouseout="this.style.background='linear-gradient(135deg, var(--primary-bg), var(--secondary-bg))'"
                        onclick="startFaceRegister()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <rect x="3" y="3" width="18" height="18" rx="4" stroke="currentColor" stroke-width="2" fill="none"/>
                        <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="2" fill="none"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 15c1.333-1 2.667-1 4 0" />
                    </svg>
                    Register with Face Recognition
                </button>

                <!-- Google Register -->
                @if (Route::has('google.auth'))
                    <button type="button"
                            onclick="window.location.href='{{ route('google.auth') }}'"
                            class="w-full py-3 border rounded-xl flex items-center justify-center gap-3 transition-all duration-300 bg-white/80 backdrop-blur-sm hover:bg-white hover:shadow-md text-sm"
                            style="border-color: var(--primary-border); color: var(--primary-bg);">
                        <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" class="w-5 h-5">
                        Sign up with Google
                    </button>
                @endif

                <!-- Already Registered -->
                @if (Route::has('login'))
                    <p class="text-center text-xs sm:text-sm" style="color: var(--secondary-text);">
                        Already have an account?
                        <a href="{{ route('login') }}" class="hover:underline transition-colors duration-200"
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
    /* Animations (exact from login page) */
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
    .shadow-3xl { box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.25); }
</style>

<script>
    function startFaceRegister() {
        alert('Face registration is a demo. Integrate with your face recognition API here.');
        // Replace this with actual logic to open a webcam modal or redirect to a face registration route.
    }
</script>

<script>
    const toggleVisibility = (inputId, iconId) => {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        const type = input.type === 'password' ? 'text' : 'password';
        input.type = type;
        icon.classList.toggle('bi-eye');
        icon.classList.toggle('bi-eye-slash');
    };
    document.getElementById('togglePassword').addEventListener('click', () => toggleVisibility('password', 'toggleIcon'));
    document.getElementById('togglePasswordConfirm').addEventListener('click', () => toggleVisibility('password_confirmation', 'toggleIconConfirm'));
</script>
</x-guest-layout>