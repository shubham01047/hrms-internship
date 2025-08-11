@php
    $role = strtolower(Auth::user()->roles->pluck('name')->first());
    $routeName = $role === 'human resource' ? 'hr.dashboard' : strtolower($role) . '.dashboard';
@endphp

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<nav x-data="{ open: false }" class="theme-app bg-secondary-gradient border-b border-primary text-primary shadow-xl backdrop-blur-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route($routeName) }}" class="group">
                        <x-application-logo class="block h-8 w-auto fill-current text-primary group-hover:scale-105 transition-transform duration-200" />
                    </a>
                </div>

                <div class="hidden space-x-4 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route($routeName) }}" :active="request()->routeIs($routeName)"
                        class="relative flex items-center px-6 py-2 text-primary hover:text-primary font-medium transition-all duration-300 rounded-lg hover:bg-primary/10 group">
                        <i class="fas fa-home w-4 h-4 mr-2"></i>
                        <span class="relative z-10">{{ __('Dashboard') }}</span>
                        <div class="absolute inset-0 bg-primary/5 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-300"></div>
                    </x-nav-link>

                    @can('view permissions')
                        <x-nav-link :href="route('permissions.index')" :active="request()->routeIs('permissions.index')"
                            class="relative flex items-center px-6 py-2 text-primary hover:text-primary font-medium transition-all duration-300 rounded-lg hover:bg-primary/10 group">
                            <i class="fas fa-key w-4 h-4 mr-2"></i>
                            <span class="relative z-10">{{ __('Permissions') }}</span>
                            <div class="absolute inset-0 bg-primary/5 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-300"></div>
                        </x-nav-link>
                    @endcan

                    @can('view roles')
                        <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')"
                            class="relative flex items-center px-6 py-2 text-primary hover:text-primary font-medium transition-all duration-300 rounded-lg hover:bg-primary/10 group">
                            <i class="fas fa-user-tag w-4 h-4 mr-2"></i>
                            <span class="relative z-10">{{ __('Roles') }}</span>
                            <div class="absolute inset-0 bg-primary/5 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-300"></div>
                        </x-nav-link>
                    @endcan

                    @can('view employee')
                        <x-nav-link :href="route('employees.index')" :active="request()->routeIs('employees.index')"
                            class="relative flex items-center px-6 py-2 text-primary hover:text-primary font-medium transition-all duration-300 rounded-lg hover:bg-primary/10 group">
                            <i class="fas fa-users w-4 h-4 mr-2"></i>
                            <span class="relative z-10">{{ __('Employees') }}</span>
                            <div class="absolute inset-0 bg-primary/5 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-300"></div>
                        </x-nav-link>
                    @endcan

                    @can('view users')
                        <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')"
                            class="relative flex items-center px-6 py-2 text-primary hover:text-primary font-medium transition-all duration-300 rounded-lg hover:bg-primary/10 group">
                            <i class="fas fa-user-friends w-4 h-4 mr-2"></i>
                            <span class="relative z-10">{{ __('Users') }}</span>
                            <div class="absolute inset-0 bg-primary/5 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-300"></div>
                        </x-nav-link>
                    @endcan
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="56" contentClasses="theme-app bg-primary-light shadow-xl rounded-lg overflow-hidden">
                    <x-slot name="trigger">
                        <button class="group inline-flex items-center px-4 py-2 border border-primary/30 text-sm leading-4 font-medium rounded-lg text-primary bg-primary/10 hover:text-primary hover:bg-primary/20 hover:border-primary/50 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:ring-offset-2 focus:ring-offset-transparent transition-all duration-200 backdrop-blur-sm">
                            <div class="flex items-center space-x-3">
                                <div class="w-9 h-9 bg-gradient-to-br from-primary/40 to-primary/60 border-2 border-primary/50 rounded-full flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:scale-110 transition-all duration-300 group-hover:border-primary/70">
                                    <span class="text-sm font-bold text-primary group-hover:text-white transition-colors duration-300">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                                <div class="text-left">
                                    <div class="text-sm font-semibold group-hover:text-white transition-colors duration-200">{{ Auth::user()->name }}</div>
                                    <div class="text-xs text-primary/70 group-hover:text-primary/90 transition-colors duration-200">({{ Auth::user()->roles->pluck('name')->implode(', ') }})</div>
                                </div>
                            </div>
                            <div class="ms-3">
                                <i class="fas fa-chevron-down h-4 w-4 text-primary group-hover:text-white group-hover:rotate-180 transition-all duration-300"></i>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')"
                            class="theme-app flex items-center px-4 py-3 text-primary hover:bg-hover hover:text-primary transition-all duration-200 bg-primary-light border-0 group">
                            <i class="fas fa-user w-4 h-4 mr-3 text-primary group-hover:scale-110 transition-transform duration-200"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-200">{{ __('Profile') }}</span>
                        </x-dropdown-link>

                        <div class="theme-app border-t border-primary/20"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="theme-app flex items-center px-4 py-3 text-primary hover:bg-hover hover:text-primary transition-all duration-200 bg-primary-light border-0 group">
                                <i class="fas fa-sign-out-alt w-4 h-4 mr-3 text-primary group-hover:scale-110 transition-transform duration-200"></i>
                                <span class="group-hover:translate-x-1 transition-transform duration-200">{{ __('Log Out') }}</span>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open"
                    class="inline-flex items-center justify-center p-2 rounded-lg text-primary hover:text-primary hover:bg-primary/10 focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all duration-200">
                    <i class="fas fa-bars h-6 w-6" x-show="!open"></i>
                    <i class="fas fa-times h-6 w-6" x-show="open"></i>
                </button>
            </div>
        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-primary-light" x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="transform opacity-0 -translate-y-full"
        x-transition:enter-end="transform opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="transform opacity-100 translate-y-0"
        x-transition:leave-end="transform opacity-0 -translate-y-full">

        <div class="pt-2 pb-3 space-y-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                class="flex items-center text-primary hover:text-primary font-semibold px-4 py-3 rounded-lg mx-2 transition-all duration-200 hover:bg-primary/10">
                <i class="fas fa-home w-4 h-4 mr-3"></i>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            @can('view permissions')
                <x-responsive-nav-link :href="route('permissions.index')" :active="request()->routeIs('permissions.index')"
                    class="flex items-center text-primary hover:text-primary font-semibold px-4 py-3 rounded-lg mx-2 transition-all duration-200 hover:bg-primary/10">
                    <i class="fas fa-key w-4 h-4 mr-3"></i>
                    {{ __('Permissions') }}
                </x-responsive-nav-link>
            @endcan

            @can('view roles')
                <x-responsive-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')"
                    class="flex items-center text-primary hover:text-primary font-semibold px-4 py-3 rounded-lg mx-2 transition-all duration-200 hover:bg-primary/10">
                    <i class="fas fa-user-tag w-4 h-4 mr-3"></i>
                    {{ __('Roles') }}
                </x-responsive-nav-link>
            @endcan

            @can('view employee')
                <x-responsive-nav-link :href="route('employees.index')" :active="request()->routeIs('employees.index')"
                    class="flex items-center text-primary hover:text-primary font-semibold px-4 py-3 rounded-lg mx-2 transition-all duration-200 hover:bg-primary/10">
                    <i class="fas fa-users w-4 h-4 mr-3"></i>
                    {{ __('Employees') }}
                </x-responsive-nav-link>
            @endcan

            @can('view users')
                <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')"
                    class="flex items-center text-primary hover:text-primary font-semibold px-4 py-3 rounded-lg mx-2 transition-all duration-200 hover:bg-primary/10">
                    <i class="fas fa-user-friends w-4 h-4 mr-3"></i>
                    {{ __('Users') }}
                </x-responsive-nav-link>
            @endcan
        </div>

        <div class="pt-4 pb-1 border-t border-primary">
            <div class="px-4">
                <div class="font-medium text-base text-primary">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-primary/80">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-2">
                <x-responsive-nav-link :href="route('profile.edit')"
                    class="flex items-center text-primary hover:text-primary px-4 py-3 rounded-lg mx-2 transition-all duration-200 hover:bg-primary/10">
                    <i class="fas fa-user w-4 h-4 mr-3"></i>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="flex items-center text-primary hover:text-primary px-4 py-3 rounded-lg mx-2 transition-all duration-200 hover:bg-primary/10">
                        <i class="fas fa-sign-out-alt w-4 h-4 mr-3"></i>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>