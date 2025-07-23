<nav x-data="{ open: false }" class="bg-gradient-to-r from-[#ff2626] to-[#ff6969] border-b border-[#ff6969] text-white shadow-lg">

  <!-- Primary Navigation Menu -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
          <div class="flex items-center">
              <!-- Logo -->
              <div class="shrink-0 flex items-center">
                  <a href="{{ route('dashboard') }}">
                      <x-application-logo class="block h-7 w-auto fill-current text-white" />
                  </a>
              </div>

              <!-- Navigation Links -->
              <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                  @php
                      $role = strtolower(Auth::user()->roles->pluck('name')->first()) ;
                      $routeName = ($role === 'human resource') ? 'hr.dashboard' : strtolower($role) . '.dashboard';
                  @endphp
                  <x-nav-link href="{{route($routeName)}}" :active="request()->routeIs('dashboard')"
                      class="text-white hover:text-red-100 font-semibold transition-colors duration-200">
                      {{ __('Dashboard') }}
                  </x-nav-link>
                  @can('view permissions')
                      <x-nav-link :href="route('permissions.index')" :active="request()->routeIs('permissions.index')"
                          class="text-white hover:text-red-100 font-semibold transition-colors duration-200">
                          {{ __('Permissions') }}
                      </x-nav-link>
                  @endcan
                  @can('view roles')
                      <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')"
                          class="text-white hover:text-red-100 font-semibold transition-colors duration-200">
                          {{ __('Roles') }}
                      </x-nav-link>
                  @endcan
                  @can('view employee')
                      <x-nav-link :href="route('employees.index')" :active="request()->routeIs('employees.index')"
                          class="text-white hover:text-red-100 font-semibold transition-colors duration-200">
                          {{ __('Employees') }}
                      </x-nav-link>
                  @endcan
                  @can('view users')
                      <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')"
                          class="text-white hover:text-red-100 font-semibold transition-colors duration-200">
                          {{ __('Users') }}
                      </x-nav-link>
                  @endcan
              </div>
          </div>

          <!-- Settings Dropdown -->
          <div class="hidden sm:flex sm:items-center sm:ms-6">
              <x-dropdown align="right" width="48">
                  <x-slot name="trigger">
                      <button
                          class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-700 hover:text-red-100 hover:bg-red-800 focus:outline-none transition ease-in-out duration-150">
                          <div>{{ Auth::user()->name }} ({{ Auth::user()->roles->pluck('name')->implode(', ') }})
                          </div>

                          <div class="ms-1">
                              <svg class="fill-current h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg"
                                  viewBox="0 0 20 20">
                                  <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd" />
                              </svg>
                          </div>
                      </button>
                  </x-slot>

                  <x-slot name="content">
                      <x-dropdown-link :href="route('profile.edit')" class="text-gray-700 hover:bg-red-50 hover:text-red-800">
                          {{ __('Profile') }}
                      </x-dropdown-link>

                      <!-- Authentication -->
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf

                          <x-dropdown-link :href="route('logout')"
                              onclick="event.preventDefault(); this.closest('form').submit();"
                              class="text-gray-700 hover:bg-red-50 hover:text-red-800">
                              {{ __('Log Out') }}
                          </x-dropdown-link>
                      </form>
                  </x-slot>
              </x-dropdown>
          </div>

          <!-- Hamburger -->
          <div class="-me-2 flex items-center sm:hidden">
              <button @click="open = ! open"
                  class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-red-100 hover:bg-red-700 focus:outline-none focus:bg-red-700 focus:text-red-100 transition duration-150 ease-in-out">
                  <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                      <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                          stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16" />
                      <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                          stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
              </button>

          </div>
      </div>
  </div>

  <!-- Responsive Navigation Menu -->
  <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-red-700"
      x-show="open"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="transform opacity-0 -translate-y-full"
      x-transition:enter-end="transform opacity-100 translate-y-0"
      x-transition:leave="transition ease-in duration-200"
      x-transition:leave-start="transform opacity-100 translate-y-0"
      x-transition:leave-end="transform opacity-0 -translate-y-full">
      <div class="pt-2 pb-3 space-y-1">
          <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-red-100 font-semibold">
              {{ __('Dashboard') }}
          </x-responsive-nav-link>

          @can('view permissions')
              <x-responsive-nav-link :href="route('permissions.index')" :active="request()->routeIs('permissions.index')"
                  class="text-white hover:text-red-100 font-semibold">
                  {{ __('Permissions') }}
              </x-responsive-nav-link>
          @endcan

          @can('view roles')
              <x-responsive-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')"
                  class="text-white hover:text-red-100 font-semibold">
                  {{ __('Roles') }}
              </x-responsive-nav-link>
          @endcan

          @can('view employee')
              <x-responsive-nav-link :href="route('employees.index')" :active="request()->routeIs('employees.index')"
                  class="text-white hover:text-red-100 font-semibold">
                  {{ __('Employees') }}
              </x-responsive-nav-link>
          @endcan

          @can('view users')
              <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')"
                  class="text-white hover:text-red-100 font-semibold">
                  {{ __('Users') }}
              </x-responsive-nav-link>
          @endcan


      </div>

      <!-- Responsive Settings Options -->
      <div class="pt-4 pb-1 border-t border-[#ff6969]">
          <div class="px-4">
              <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
              <div class="font-medium text-sm text-red-100">{{ Auth::user()->email }}</div>
          </div>

          <div class="mt-3 space-y-1">
              <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:text-red-100">
                  {{ __('Profile') }}
              </x-responsive-nav-link>


              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
                  @csrf

                  <x-responsive-nav-link :href="route('logout')"
                      onclick="event.preventDefault(); this.closest('form').submit();"
                      class="text-white hover:text-red-100">
                      {{ __('Log Out') }}
                  </x-responsive-nav-link>

              </form>
          </div>
      </div>
  </div>

</nav>
