<div id="sidebar"
    class="sidebar-toggle fixed inset-y-0 left-0 z-50 w-64 sidebar-gradient shadow-xl transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
    <!-- Sidebar Header -->
    <div class="flex items-center justify-center h-16 px-4 bg-black bg-opacity-20">
        <div class="flex items-center">
            <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                <img src="{{ asset('img/logo.png') }}" alt="Logo">
            </div>
            <span class="ml-3 text-white font-bold text-lg">{{ config('app.name', 'Peohai') }}</span>
        </div>
    </div>

    <!-- Sidebar Navigation -->
    <nav class="mt-8 px-4">
        <div class="space-y-2">
            <a href="/dashboard"
                class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('dashboard') ? 'bg-white bg-opacity-20 text-white' : 'text-blue-100 hover:bg-white hover:bg-opacity-10 hover:text-white' }} transition-colors duration-200">
                <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2z">
                    </path>
                </svg>
                Dashboard
            </a>
            <a href="/analytics_dashboard"
                class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('analytics_dashboard') ? 'bg-white bg-opacity-20 text-white' : 'text-blue-100 hover:bg-white hover:bg-opacity-10 hover:text-white' }} transition-colors duration-200">
                <svg class="mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M7 17h2v-5H7zm8 0h2V7h-2zm-4 0h2v-3h-2zm0-5h2v-2h-2zm-6 9q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.587 1.413T19 21z" />
                </svg>
                Analitik
            </a>

            <!-- Data -->
            <div class="pt-4 mt-4 border-t border-blue-400 border-opacity-30">
                <p class="px-4 text-xs font-semibold text-blue-200 uppercase tracking-wider">Rekrutmen</p>
                <div class="mt-2 space-y-2">
                    <a href="/admin/recruitment_periods"
                        class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('recruitment_periods*') ||
                        request()->routeIs('admin.entries.*') ||
                        request()->routeIs('finance.entries.*') ||
                        request()->routeIs('marketing.entries.*')
                            ? 'bg-white bg-opacity-20 text-white'
                            : 'text-blue-100 hover:bg-white hover:bg-opacity-10 hover:text-white' }} transition-colors duration-200">
                        <svg class="mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M4 21q-.425 0-.712-.288T3 20t.288-.712T4 19h16q.425 0 .713.288T21 20t-.288.713T20 21zm0-4q-.425 0-.712-.288T3 16t.288-.712T4 15h16q.425 0 .713.288T21 16t-.288.713T20 17zm0-4q-.425 0-.712-.288T3 12t.288-.712T4 11h16q.425 0 .713.288T21 12t-.288.713T20 13zm0-4q-.425 0-.712-.288T3 8t.288-.712T4 7h16q.425 0 .713.288T21 8t-.288.713T20 9zm0-4q-.425 0-.712-.288T3 4t.288-.712T4 3h16q.425 0 .713.288T21 4t-.288.713T20 5z" />
                        </svg>
                        Data Rekrutmen
                    </a>
                </div>
            </div>

            <div class="pt-4 mt-4 border-t border-blue-400 border-opacity-30">
                <p class="px-4 text-xs font-semibold text-blue-200 uppercase tracking-wider">Simulasi</p>
                <div class="mt-2 space-y-2">
                    <a href="/cities"
                        class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('cities.*') ? 'bg-white bg-opacity-20 text-white' : 'text-blue-100 hover:bg-white hover:bg-opacity-10 hover:text-white' }} transition-colors duration-200">
                        <svg class="mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M3 19V9q0-.825.588-1.412T5 7h4V5.825q0-.4.15-.763t.425-.637l1-1Q11.15 2.85 12 2.85t1.425.575l1 1q.275.275.425.638t.15.762V11h4q.825 0 1.413.588T21 13v6q0 .825-.587 1.413T19 21H5q-.825 0-1.412-.587T3 19m2 0h2v-2H5zm0-4h2v-2H5zm0-4h2V9H5zm6 8h2v-2h-2zm0-4h2v-2h-2zm0-4h2V9h-2zm0-4h2V5h-2zm6 12h2v-2h-2zm0-4h2v-2h-2z" />
                        </svg>
                        Kota/Kabupaten
                    </a>
                </div>
            </div>

            <!-- Account Settings -->
            <div class="pt-4 mt-4 border-t border-blue-400 border-opacity-30">
                <p class="px-4 text-xs font-semibold text-blue-200 uppercase tracking-wider">Account</p>
                <div class="mt-2 space-y-2">
                    <a href="/profile"
                        class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('profile.*') ? 'bg-white bg-opacity-20 text-white' : 'text-blue-100 hover:bg-white hover:bg-opacity-10 hover:text-white' }} transition-colors duration-200">
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Profile
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- User Profile Section -->
    <div class="absolute bottom-0 w-full p-4">
        <div class="bg-white bg-opacity-10 rounded-lg p-3">
            <div class="flex items-center">
                <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                    <span
                        class="text-xs font-bold text-blue-600">{{ collect(explode(' ', Auth::user()->name))->map(fn($word) => strtoupper(substr($word, 0, 1)))->join('') }}</span>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-medium text-white truncate">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-blue-200 truncate"></p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="mt-3" id="logout-form">
                @csrf
                <button type="button" onclick=""
                    class="w-full flex items-center justify-center px-3 py-2 text-sm font-medium text-blue-100 bg-white bg-opacity-10 rounded-md hover:bg-opacity-20 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    <a href="route('logout')"
                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </button>
            </form>
        </div>
    </div>
</div>
