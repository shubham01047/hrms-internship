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

                  {{-- employee code --}}


  <main class="p-6 space-y-8 bg-gray-100 min-h-screen">

  <!-- Header with Real-time Clock -->
  <div class="bg-gradient-to-r from-[#ff2626] to-[#ff6969] text-white p-6 rounded-lg shadow flex flex-col sm:flex-row justify-between items-center"> {{-- Added flex-col sm:flex-row for responsiveness --}}
      <h2 class="text-2xl font-bold mb-2 sm:mb-0">Employee Dashboard</h2>
      <div id="clock" class="text-3xl font-extrabold text-white tracking-wide"></div>
  </div>

  <!-- Profile Card -->
  <div class="bg-white shadow-lg rounded-xl p-6 flex items-center gap-4 animate-fade-in animate-delay-50">
      <img src="/placeholder.svg?height=64&width=64" alt="Employee Profile" class="w-16 h-16 rounded-full object-cover border-2 border-red-400 shadow-md">
      <div>
          <p class="text-gray-600 text-sm">Hi,</p>
          <h3 class="text-xl font-bold text-gray-800">{{Auth::user()->name}}</h3>
          <p class="text-gray-600 text-sm">Software Engineer</p>
      </div>
  </div>

  <!-- Quick Info Cards -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 animate-fade-in animate-delay-150"> {{-- Responsive grid --}}
      <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01] flex flex-col items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M15 2H9a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1Z"/></svg>
          <h3 class="text-gray-600 text-lg font-semibold">Total Tasks</h3>
          <p class="text-4xl font-extrabold text-red-600">12</p>
      </div>
      <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01] flex flex-col items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
          <h3 class="text-gray-600 text-lg font-semibold">Pending Tasks</h3>
          <p class="text-4xl font-extrabold text-yellow-600">3</p>
      </div>
      <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01] flex flex-col items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          <h3 class="text-gray-600 text-lg font-semibold">Completed Tasks</h3>
          <p class="text-4xl font-extrabold text-green-600">9</p>
      </div>
      <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01] flex flex-col items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-pink-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 4.32 2H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z"/></svg>
          <h3 class="text-gray-600 text-lg font-semibold">Projects</h3>
          <p class="text-4xl font-extrabold text-pink-600">4</p>
      </div>
  </div>

  <!-- Punch In / Punch Out Section -->
  <div class="bg-white shadow-lg rounded-xl p-8 border border-gray-200 animate-fade-in animate-delay-200">
      <div class="flex flex-col md:flex-row justify-between items-center gap-8">
          <div>
              <h2 class="text-2xl font-bold text-gray-800 mb-2">Work Status</h2>
              <p class="text-gray-600 text-lg">Track your work hours easily</p>
              <div class="mt-6 text-gray-700 font-medium text-xl">
                  Total Working Time:
                  <span id="workTime" class="font-extrabold text-red-600 text-3xl ml-2">00:00:00</span>
              </div>
              <div id="geolocationStatus" class="mt-2 text-sm text-gray-500"></div> {{-- Added for geolocation status --}}
          </div>
          <div>
             <button id="punchButton"
                  class="w-80 px-10 py-8 text-3xl font-extrabold text-white bg-green-600 rounded-full shadow-2xl hover:bg-green-700 hover:shadow-red-500/50 active:scale-95 transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-green-400">
                  Punch In
              </button>
          </div>
      </div>
  </div>

  <!-- Manage Breaks -->
  <div class="bg-white shadow-lg rounded-xl p-8 border border-gray-200 animate-fade-in animate-delay-300">
      <h2 class="text-2xl font-bold mb-6 text-gray-800">Manage Breaks</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6"> {{-- Responsive grid --}}
          <!-- Morning Tea Break -->
          <button data-break="Morning Tea" class="text-white px-6 py-4 rounded-xl shadow-md font-semibold break-btn bg-yellow-500 hover:bg-yellow-600 active:scale-95 transition-all duration-300 ease-in-out hover:scale-105">
              Start Morning Tea Break
          </button>

          <!-- Lunch Break -->
          <button data-break="Lunch" class="text-white px-6 py-4 rounded-xl shadow-md font-semibold break-btn bg-pink-500 hover:bg-pink-600 active:scale-95 transition-all duration-300 ease-in-out hover:scale-105">
              Start Lunch Break
          </button>

          <!-- Evening Tea Break -->
          <button data-break="Evening Tea" class="text-white px-6 py-4 rounded-xl shadow-md font-semibold break-btn bg-purple-500 hover:bg-purple-600 active:scale-95 transition-all duration-300 ease-in-out hover:scale-105">
              Start Evening Tea Break
          </button>

          <!-- Custom Break -->
          <button data-break="Custom" class="text-white px-6 py-4 rounded-xl shadow-md font-semibold break-btn bg-gray-500 hover:bg-gray-600 active:scale-95 transition-all duration-300 ease-in-out hover:scale-105">
              Start Custom Break
          </button>
      </div>

      <!-- Break Status & Timer -->
      <div id="breakStatus" class="mt-8 text-gray-800 font-semibold text-xl">
          No break active
      </div>
      <div id="breakTimer" class="text-3xl text-red-600 font-extrabold mt-2">00:00:00</div>
  </div>

  <!-- Leave Balance Section -->
  <div class="bg-white shadow-lg rounded-xl p-6 border border-gray-200 animate-fade-in animate-delay-400">
      <h2 class="text-2xl font-bold mb-4 text-gray-800">Leave Balance</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6"> {{-- Responsive grid --}}
          <!-- Sick Leaves -->
          <div class="bg-blue-500 text-white p-4 rounded-xl shadow-md text-center hover:shadow-lg transition-all duration-300 ease-in-out hover:scale-[1.02] flex flex-col items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
              <h3 class="text-lg font-semibold">Sick Leaves</h3>
              <p class="text-3xl font-extrabold">05</p>
          </div>
          <!-- Casual Leaves -->
          <div class="bg-orange-500 text-white p-4 rounded-xl shadow-md text-center hover:shadow-lg transition-all duration-300 ease-in-out hover:scale-[1.02] flex flex-col items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
              <h3 class="text-lg font-semibold">Casual Leaves</h3>
              <p class="text-3xl font-extrabold">08</p>
          </div>
          <!-- Annual Leaves -->
          <div class="bg-teal-500 text-white p-4 rounded-xl shadow-md text-center hover:shadow-lg transition-all duration-300 ease-in-out hover:scale-[1.02] flex flex-col items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
              <h3 class="text-lg font-semibold">Annual Leaves</h3>
              <p class="text-3xl font-extrabold">15</p>
          </div>
      </div>
      <div class="text-center">
          @can('apply leave')
    <a href="{{ route('leaves.create') }}"
       class="px-6 py-3 text-lg font-bold text-white bg-gradient-to-r from-[#ff2626] to-[#ff6969] rounded-full shadow-lg hover:from-[#ff6969] hover:to-[#ff2626] active:scale-95 transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-red-400">
        Apply Leave
    </a>
@endcan
      </div>
  </div>

  <!-- Holidays or Events Section -->
  <div class="bg-white shadow-lg rounded-xl p-8 border border-gray-200 animate-fade-in animate-delay-500">
      <h2 class="text-2xl font-bold mb-6 text-gray-800">Upcoming Holidays & Events</h2>
      <ul class="space-y-4">
          <li class="flex items-center gap-4 p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
              <div>
                  <p class="font-semibold text-gray-800">Independence Day</p>
                  <p class="text-sm text-gray-600">August 15, 2025</p>
              </div>
          </li>
          <li class="flex items-center gap-4 p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
              <div>
                  <p class="font-semibold text-gray-800">Company Annual Picnic</p>
                  <p class="text-sm text-gray-600">September 10, 2025</p>
              </div>
          </li>
          <li class="flex items-center gap-4 p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
              <div>
                  <p class="font-semibold text-gray-800">Diwali Holiday</p>
                  <p class="text-sm text-gray-600">October 31, 2025</p>
              </div>
          </li>
      </ul>
  </div>

  <!-- Notifications Section -->
  <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 animate-fade-in animate-delay-600">
      <h2 class="text-2xl font-bold text-gray-800 mb-4">Notifications</h2>
      <ul class="space-y-3">
          <li class="flex items-center gap-4 p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
              <span class="text-gray-700">Your leave request for July 25th was approved.</span>
          </li>
          <li class="flex items-center gap-4 p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
              <span class="text-gray-700">New task "Employee Onboarding Flow" assigned to you.</span>
          </li>
          <li class="flex items-center gap-4 p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.36 14H13.64a2 2 0 0 1-.97 3.5c-.93.47-2.09.47-3.02 0a2 2 0 0 1-.97-3.5Z"/></svg>
              <span class="text-gray-700">Reminder: Your performance review is scheduled for next week.</span>
          </li>
      </ul>
  </div>

  <!-- Current Tasks Table -->
  <div class="bg-white p-8 shadow-lg rounded-xl border border-gray-200 animate-fade-in animate-delay-700">
      <div class="flex justify-between items-center mb-6">
          <h2 class="text-2xl font-bold text-gray-800">Current Tasks</h2>
          <button class="text-red-600 hover:text-red-800 font-semibold transition-colors duration-200">View All</button>
      </div>
      <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse">
              <thead class="bg-gray-100 rounded-lg">
                  <tr>
                      <th class="p-4 text-sm font-semibold text-gray-700 uppercase tracking-wider rounded-tl-lg">Task</th>
                      <th class="p-4 text-sm font-semibold text-gray-700 uppercase tracking-wider">Deadline</th>
                      <th class="p-4 text-sm font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                      <th class="p-4 text-sm font-semibold text-gray-700 uppercase tracking-wider rounded-tr-lg">Action</th>
                  </tr>
              </thead>
              <tbody>
                  <tr class="border-t border-gray-200 hover:bg-gray-50 transition-colors duration-200">
                      <td class="p-4 text-gray-800">Update HRMS UI</td>
                      <td class="p-4 text-gray-600">20 July 2025</td>
                      <td class="p-4 text-green-600 font-medium">In Progress</td>
                      <td class="p-4">
                          <button class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition-colors duration-200 shadow-sm">Complete</button>
                      </td>
                  </tr>
                  <tr class="border-t border-gray-200 hover:bg-gray-50 transition-colors duration-200">
                      <td class="p-4 text-gray-800">Fix Punch In Bug</td>
                      <td class="p-4 text-gray-600">18 July 2025</td>
                      <td class="p-4 text-yellow-600 font-medium">Pending</td>
                      <td class="p-4">
                          <button class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition-colors duration-200 shadow-sm">Complete</button>
                      </td>
                  </tr>
                  <tr class="border-t border-gray-200 hover:bg-gray-50 transition-colors duration-200">
                      <td class="p-4 text-gray-800">Prepare Q3 Report</td>
                      <td class="p-4 text-gray-600">25 July 2025</td>
                      <td class="p-4 text-blue-600 font-medium">Assigned</td>
                      <td class="p-4">
                          <button class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition-colors duration-200 shadow-sm">Complete</button>
                      </td>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>

</main>

<!-- JavaScript -->
<script>
  const punchButton = document.getElementById('punchButton');
  const breakButtons = document.querySelectorAll('.break-btn');
  const breakStatus = document.getElementById('breakStatus');
  const workTimeEl = document.getElementById('workTime');
  const breakTimerEl = document.getElementById('breakTimer');
  const geolocationStatusEl = document.getElementById('geolocationStatus'); // New element for status
  let isPunchedIn = false;
  let workSeconds = 0;
  let workTimer;
  let breakTimer, breakSeconds = 0;

  // Geolocation function
  function getGeolocation() {
      if (navigator.geolocation) {
          geolocationStatusEl.textContent = 'Getting location...';
          navigator.geolocation.getCurrentPosition(
              (position) => {
                  const latitude = position.coords.latitude;
                  const longitude = position.coords.longitude;
                  geolocationStatusEl.textContent = `Location: Lat ${latitude.toFixed(4)}, Lon ${longitude.toFixed(4)}`;
                  console.log('Geolocation captured:', { latitude, longitude });
                  // Here you would typically send this data to your server
              },
              (error) => {
                  let errorMessage = 'Geolocation error: ';
                  switch(error.code) {
                      case error.PERMISSION_DENIED:
                          errorMessage += 'User denied the request for Geolocation.';
                          break;
                      case error.POSITION_UNAVAILABLE:
                          errorMessage += 'Location information is unavailable.';
                          break;
                      case error.TIMEOUT:
                          errorMessage += 'The request to get user location timed out.';
                          break;
                      case error.UNKNOWN_ERROR:
                          errorMessage += 'An unknown error occurred.';
                          break;
                  }
                  geolocationStatusEl.textContent = errorMessage;
                  console.error(errorMessage);
              },
              {
                  enableHighAccuracy: true,
                  timeout: 5000,
                  maximumAge: 0
              }
          );
      } else {
          geolocationStatusEl.textContent = 'Geolocation is not supported by this browser.';
          console.error('Geolocation is not supported by this browser.');
      }
  }

  // Punch In / Out Logic
  punchButton.addEventListener('click', () => {
      isPunchedIn = !isPunchedIn;
      punchButton.textContent = isPunchedIn ? 'Punch Out' : 'Punch In';
      // Update classes for Punch In/Out button
      if (isPunchedIn) { // User just punched IN, button should now be RED (Punch Out state)
          punchButton.classList.remove('bg-green-600', 'hover:bg-green-700', 'focus:ring-green-400');
          punchButton.classList.add('bg-red-600', 'hover:bg-red-700', 'focus:ring-red-400');
          getGeolocation(); // Capture geolocation on punch in
      } else { // User just punched OUT, button should now be GREEN (Punch In state)
          punchButton.classList.remove('bg-red-600', 'hover:bg-red-700', 'focus:ring-red-400');
          punchButton.classList.add('bg-green-600', 'hover:bg-green-700', 'focus:ring-green-400');
          geolocationStatusEl.textContent = ''; // Clear status on punch out
      }

      if (isPunchedIn) {
          startWorkTimer();
      } else {
          stopWorkTimer();
      }
  });

  function startWorkTimer() {
      workTimer = setInterval(() => {
          workSeconds++;
          workTimeEl.textContent = formatTime(workSeconds);
      }, 1000);
  }

  function stopWorkTimer() {
      clearInterval(workTimer);
  }

  function formatTime(sec) {
      let h = Math.floor(sec / 3600);
      let m = Math.floor((sec % 3600) / 60);
      let s = sec % 60;
      return [h, m, s].map(v => String(v).padStart(2, '0')).join(':');
  }

  // Break Timer Functions
  function startBreakTimer() {
      clearInterval(breakTimer);
      breakSeconds = 0;
      breakTimer = setInterval(() => {
          breakSeconds++;
          breakTimerEl.textContent = formatTime(breakSeconds);
      }, 1000);
  }

  function stopBreakTimer() {
      clearInterval(breakTimer);
  }

  // Break Buttons Logic
  breakButtons.forEach(btn => {
      btn.addEventListener('click', () => {
          const breakName = btn.dataset.break;
          if (btn.textContent.startsWith('Start')) {
              btn.textContent = `End ${breakName} Break`;
              breakStatus.textContent = `${breakName} started at ${new Date().toLocaleTimeString()}`;
              startBreakTimer();
              btn.classList.add('opacity-80');
          } else {
              btn.textContent = `Start ${breakName} Break`;
              breakStatus.textContent = `${breakName} ended at ${new Date().toLocaleTimeString()}`;
              stopBreakTimer();
              breakTimerEl.textContent = '00:00:00';
              btn.classList.remove('opacity-80');
          }
      });
  });

  // Real-Time Clock
  function updateClock() {
      document.getElementById('clock').textContent = new Date().toLocaleTimeString();
  }
  setInterval(updateClock, 1000);
  updateClock();
</script>

              </div>
          </div>
      </div>
  </div>
</x-app-layout>
