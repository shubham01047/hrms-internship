<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-purple-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Header Section -->
            <div class="text-center">
                <div class="mx-auto h-16 w-16 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center mb-6">
                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.74 5.74L9 17H6a2 2 0 01-2-2v-3L2.26 9.26C1.46 8.05 1.46 6.45 2.26 5.24L5.24 2.26C6.45 1.46 8.05 1.46 9.26 2.26L12 5l2.74-2.74C15.95 1.46 17.55 1.46 18.76 2.26l2.98 2.98C22.54 6.45 22.54 8.05 21.74 9.26L19 12l3 3a2 2 0 010 2.83l-4.24 4.24a2 2 0 01-2.83 0L12 19l-3 3H6a2 2 0 01-2-2v-3l-2.74-2.74a6 6 0 010-8.49l2.98-2.98A6 6 0 019.26 2.26L12 5z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Forgot Password?</h2>
                <p class="text-sm text-gray-600 max-w-sm mx-auto leading-relaxed">
                    No worries! Enter your email address and we'll send you a secure link to reset your password.
                </p>
            </div>

            <!-- Main Card -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
                <!-- Session Status -->
                <x-auth-session-status class="mb-6" :status="session('status')" />

                <!-- Success Message Styling -->
                @if (session('status'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="text-sm font-medium text-green-800">{{ session('status') }}</p>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-semibold text-gray-700">
                            Email Address
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                            <input 
                                id="email" 
                                name="email" 
                                type="email" 
                                value="{{ old('email') }}" 
                                required 
                                autofocus
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm"
                                placeholder="Enter your email address"
                            />
                        </div>
                        @error('email')
                            <div class="flex items-center mt-2">
                                <svg class="h-4 w-4 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button 
                            type="submit"
                            class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        >
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Send Reset Link
                        </button>
                    </div>
                </form>

                <!-- Back to Login Link -->
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <div class="text-center">
                        <p class="text-sm text-gray-600">
                            Remember your password? 
                            <a href="{{ route('login') }}" class="font-semibold text-blue-600 hover:text-blue-500">
                                Back to Login
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Help Section -->
            <div class="text-center">
                <div class="bg-blue-50 rounded-lg p-4 border border-blue-100">
                    <div class="flex items-center justify-center mb-2">
                        <svg class="h-5 w-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-sm font-semibold text-blue-900">Need Help?</h3>
                    </div>
                    <p class="text-xs text-blue-700 leading-relaxed">
                        If you don't receive the email within a few minutes, check your spam folder or 
                        <a href="mailto:support@company.com" class="font-semibold underline hover:no-underline">contact support</a>.
                    </p>
                </div>
            </div>

            <!-- Security Notice -->
            <div class="text-center">
                <div class="flex items-center justify-center space-x-2 text-xs text-gray-500">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    <span>Your data is protected with enterprise-grade security</span>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>