<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-black leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
            <div class="p-6 text-black">

  {{-- Custom styles for this page --}}
  <style>
      /* Poppins font is assumed to be loaded by x-app-layout or globally */
      body {
          font-family: 'Poppins', sans-serif;
      }
      /* Custom gradient for the main dashboard header */
      .header-gradient {
          background: linear-gradient(135deg, #ff2626, #ff6969); /* Red gradient for main header */
      }
      /* Custom gradient for section headers */
      .section-header-gradient {
          background: linear-gradient(135deg, #ff2626, #ff6969); /* Updated red gradient for sections */
      }

      /* Fade-in animation */
      @keyframes fadeIn {
          from { opacity: 0; transform: translateY(20px); }
          to { opacity: 1; transform: translateY(0); }
      }
      .animate-fade-in {
          animation: fadeIn 0.8s ease-out forwards;
          opacity: 0; /* Start invisible */
      }
      /* Staggered delays for sections */
      .animate-delay-100 { animation-delay: 0.1s; }
      .animate-delay-200 { animation-delay: 0.2s; }
      .animate-delay-300 { animation-delay: 0.3s; }
      .animate-delay-400 { animation-delay: 0.4s; }
      .animate-delay-500 { animation-delay: 0.5s; }
      .animate-delay-600 { animation-delay: 0.6s; }
      .animate-delay-700 { animation-delay: 0.7s; }
      .animate-delay-800 { animation-delay: 0.8s; }
      .animate-delay-900 { animation-delay: 0.9s; }
      .animate-delay-1000 { animation-delay: 1.0s; }
      .animate-delay-1100 { animation-delay: 1.1s; }

      /* Hide scrollbar for specific elements */
      .hide-scrollbar::-webkit-scrollbar {
          display: none;
      }
      .hide-scrollbar {
          -ms-overflow-style: none;  /* IE and Edge */
          scrollbar-width: none;  /* Firefox */
      }
  </style>

  <div class="py-12 bg-gray-100 min-h-screen"> {{-- Set overall background to gray-100 and ensure min-height --}}
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 gap-6"> {{-- Consistent vertical spacing between sections --}}

          <!-- Header -->
          <div class="header-gradient text-white p-6 rounded-xl shadow-lg flex flex-col sm:flex-row justify-between items-center animate-fade-in">
              <h1 class="text-3xl font-bold mb-4 sm:mb-0">Admin Dashboard</h1>
              <div class="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto">
                  <!-- Search Bar (Optional, can be removed if not needed here) -->
                  <div class="relative flex-1 w-full sm:w-auto">
                      <input type="text" placeholder="Search employees..." class="w-full pl-10 pr-4 py-2 rounded-full bg-white bg-opacity-20 text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50">
                      <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-white h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                  </div>
                  <!-- Live Clock -->
                  <div id="clock" class="text-lg font-medium whitespace-nowrap mt-2 sm:mt-0"></div>
              </div>
          </div>

          <!-- Quick Stats -->
          <div class="overflow-x-auto hide-scrollbar pb-4 animate-fade-in animate-delay-100">
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 min-w-[700px]"> {{-- Updated for responsiveness --}}
                  <div class="p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01]
                      bg-white text-red-600 border border-gray-200
                      flex flex-col items-start gap-3">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                      <h3 class="text-sm text-gray-500">Total Employees</h3>
                      <p class="text-3xl font-bold">120</p>
                  </div>
                  <div class="p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01]
                      bg-white text-green-600 border border-gray-200
                      flex flex-col items-start gap-3">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                      <h3 class="text-sm text-gray-500">Present Today</h3>
                      <p class="text-3xl font-bold">98</p>
                  </div>
                  <div class="p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01]
                      bg-white text-purple-600 border border-gray-200
                      flex flex-col items-start gap-3">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-purple-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/><path d="M12 22c4.4 0 8-3.6 8-8V7h-4V3H8v4H4v7c0 4.4 3.6 8 8 8z"/></svg>
                      <h3 class="text-sm text-gray-500">Punch-In Users</h3>
                      <p class="text-3xl font-bold">65</p>
                  </div>
                  <div class="p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01]
                      bg-white text-yellow-500 border border-gray-200
                      flex flex-col items-start gap-3">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-yellow-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
                      <h3 class="text-sm text-gray-500">Pending Leaves</h3>
                      <p class="text-3xl font-bold">12</p>
                  </div>
                  <div class="p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01]
                      bg-white text-pink-600 border border-gray-200
                      flex flex-col items-start gap-3">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-pink-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 4.32 2H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z"/></svg>
                      <h3 class="text-sm text-gray-500">Active Projects</h3>
                      <p class="text-3xl font-bold">08</p>
                  </div>
                  <div class="p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01]
                      bg-white text-blue-600 border border-gray-200
                      flex flex-col items-start gap-3">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 17.5v-11M18 13.5v-7M6 21.5v-11"/></svg>
                      <h3 class="text-sm text-gray-500">Pending Tasks</h3>
                      <p class="text-3xl font-bold">24</p>
                  </div>
              </div>
          </div>

          <!-- Notifications and Quick Actions Wrapper -->
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-6"> {{-- New wrapper for 2-column layout on desktop --}}
              <!-- Notifications Section -->
              <div class="bg-white p-6 rounded-xl shadow-lg animate-fade-in animate-delay-200">
                  <h2 class="text-2xl font-bold text-gray-800 mb-4">Notifications</h2>
                  <ul class="space-y-3">
                      <li class="flex items-center gap-3 text-gray-700">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                          <span>Leave approved for John Doe.</span>
                      </li>
                      <li class="flex items-center gap-3 text-gray-700">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
                          <span>Task "Website Redesign" deadline is tomorrow.</span>
                      </li>
                      <li class="flex items-center gap-3 text-gray-700">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                          <span>New employee, Jane Smith, has joined the team.</span>
                      </li>
                  </ul>
              </div>

              <!-- Quick Actions Section -->
              <div class="bg-white p-6 rounded-xl shadow-lg animate-fade-in animate-delay-300">
                  <h2 class="text-2xl font-bold text-gray-800 mb-4">Quick Actions</h2>
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4"> {{-- Adjusted for responsiveness within its column --}}
                      <a href="#" class="flex flex-col items-center justify-center p-4 rounded-xl text-white text-center
                                        bg-gradient-to-br from-[#ff2626] to-[#ff6969] shadow-md
                                        hover:scale-105 hover:shadow-xl transition-all duration-300 ease-in-out">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
                          <span class="font-semibold">Add Employee</span>
                      </a>
                      <a href="#" class="flex flex-col items-center justify-center p-4 rounded-xl text-white text-center
                                        bg-gradient-to-br from-green-500 to-green-700 shadow-md
                                        hover:scale-105 hover:shadow-xl transition-all duration-300 ease-in-out">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2v4"/><path d="M16 2v4"/><path d="M21 13V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8"/><path d="M3 10h18"/><path d="M19 16v6"/><path d="M22 19h-6"/></svg>
                          <span class="font-semibold">Add Holiday</span>
                      </a>
                      <a href="#" class="flex flex-col items-center justify-center p-4 rounded-xl text-white text-center
                                        bg-gradient-to-br from-purple-500 to-purple-700 shadow-md
                                        hover:scale-105 hover:shadow-xl transition-all duration-300 ease-in-out">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 4.32 2H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z"/><line x1="12" x2="12" y1="10" y2="16"/><line x1="9" x2="15" y1="13" y2="13"/></svg>
                          <span class="font-semibold">Create Project</span>
                      </a>
                      <a href="#" class="flex flex-col items-center justify-center p-4 rounded-xl text-white text-center
                                        bg-gradient-to-br from-yellow-500 to-yellow-700 shadow-md
                                        hover:scale-105 hover:shadow-xl transition-all duration-300 ease-in-out">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
                          <span class="font-semibold">Generate Report</span>
                      </a>
                  </div>
              </div>
          </div>

          {{-- Other dashboard content will go here --}}

      </div>
  </div>

  <!-- Real-Time Clock Script -->
  <script>
      document.addEventListener("DOMContentLoaded", () => {
          function updateClock() {
              const clockElement = document.getElementById("clock");
              if (clockElement) {
                  clockElement.textContent = new Date().toLocaleTimeString();
              }
          }
          setInterval(updateClock, 1000);
          updateClock();
      });
  </script>

            </div>
        </div>
    </div>
</div>
</x-app-layout>
