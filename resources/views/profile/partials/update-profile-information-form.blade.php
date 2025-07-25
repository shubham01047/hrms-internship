<section class="bg-white rounded-xl shadow-xl border border-gray-200 overflow-hidden">
    <div class="bg-gradient-to-r from-green-50 to-green-100 px-6 py-4 border-b border-gray-200">
        <div class="flex items-center space-x-3">
            <div class="p-2 bg-white rounded-lg shadow-sm">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-900">
                    {{ __('Profile Information') }}
                </h2>
                <p class="text-sm text-gray-600">
                    {{ __("Update your account's profile information and email address.") }}
                </p>
            </div>
        </div>
    </div>

    <div class="p-6">
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
            @csrf
            @method('patch')

            <div class="space-y-2">
                <label for="name" class="block text-sm font-semibold text-gray-700">
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span>{{ __('Full Name') }}</span>
                        <span class="text-red-500">*</span>
                    </div>
                </label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="{{ old('name', $user->name) }}"
                       placeholder="Enter your full name"
                       required 
                       autofocus 
                       autocomplete="name"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-green-200 focus:border-green-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
                @if($errors->get('name'))
                    <div class="flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm text-red-600 font-medium">{{ implode(', ', $errors->get('name')) }}</span>
                    </div>
                @endif
            </div>

            <div class="space-y-2">
                <label for="email" class="block text-sm font-semibold text-gray-700">
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>{{ __('Email Address') }}</span>
                        <span class="text-red-500">*</span>
                    </div>
                </label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="{{ old('email', $user->email) }}"
                       placeholder="Enter your email address"
                       required 
                       autocomplete="username"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-green-200 focus:border-green-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
                @if($errors->get('email'))
                    <div class="flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm text-red-600 font-medium">{{ implode(', ', $errors->get('email')) }}</span>
                    </div>
                @endif

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-3 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-yellow-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                            <div>
                                <h4 class="text-sm font-semibold text-gray-900">Email Verification Required</h4>
                                <p class="text-sm text-gray-600 mt-1">
                                    {{ __('Your email address is unverified.') }}
                                </p>
                                <button form="send-verification" 
                                        class="mt-2 inline-flex items-center px-3 py-1 bg-yellow-100 hover:bg-yellow-200 text-yellow-800 text-xs font-medium rounded-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ __('Resend Verification Email') }}
                                </button>
                            </div>
                        </div>

                        @if (session('status') === 'verification-link-sent')
                            <div class="mt-3 p-3 bg-green-50 border border-green-200 rounded-lg">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm text-green-600 font-medium">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </span>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <button type="submit"
                        class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-lg shadow-lg hover:from-green-600 hover:to-green-700 hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-green-300">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ __('Save Changes') }}
                </button>

                @if (session('status') === 'profile-updated')
                    <div x-data="{ show: true }" 
                         x-show="show" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-90"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-90"
                         x-init="setTimeout(() => show = false, 3000)"
                         class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 text-sm font-medium rounded-lg">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ __('Profile Updated Successfully!') }}
                    </div>
                @endif
            </div>
        </form>
    </div>
</section>
