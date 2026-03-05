<div id="sidebar"
    class="sidebar-toggle fixed inset-y-0 left-0 z-50 w-64 sidebar-gradient shadow-xl transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
    <!-- Sidebar Header -->
    <div class="flex items-center justify-center h-16 px-4 bg-black bg-opacity-20">
        <div class="flex items-center">
            <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center p-1">
                <img src="/images/logo.png" alt="Logo">
            </div>
            <span class="ml-3 text-white font-bold text-md">V-Lab MaMen</span>
        </div>
    </div>

    <!-- Sidebar Navigation -->
    <nav class="mt-8 px-4">
        <div class="space-y-2">
            <a href="/admin/dashboard"
                class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('dashboard') ? 'bg-white bg-opacity-20 text-white' : 'text-blue-100 hover:bg-white hover:bg-opacity-10 hover:text-white' }} transition-colors duration-200">
                <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2z">
                    </path>
                </svg>
                Dasbor
            </a>

            @if (Auth::user()->role === 'Super Admin' || Auth::user()->role === 'Oprec Admin')
                <!-- Rekrutmen -->
                <div class="pt-4 mt-4 border-t border-blue-400 border-opacity-30">
                    <p class="px-4 text-xs font-semibold text-blue-200 uppercase tracking-wider">Rekrutmen</p>
                    <div class="mt-2 space-y-2">
                        <a href="/admin/recruitment_periods"
                            class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('recruitment_periods*') ||
                            request()->routeIs('admin.entries.*')
                                ? 'bg-white bg-opacity-20 text-white'
                                : 'text-blue-100 hover:bg-white hover:bg-opacity-10 hover:text-white' }} transition-colors duration-200">
                            <svg class="mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M11 12q-1.65 0-2.825-1.175T7 8t1.175-2.825T11 4t2.825 1.175T15 8t-1.175 2.825T11 12m0-2q.825 0 1.413-.587T13 8t-.587-1.412T11 6t-1.412.588T9 8t.588 1.413T11 10m11.1 13.5l-3.2-3.2q-.525.3-1.125.5T16.5 21q-1.875 0-3.187-1.312T12 16.5t1.313-3.187T16.5 12t3.188 1.313T21 16.5q0 .675-.2 1.275t-.5 1.125l3.2 3.2zm-3.825-5.225Q19 17.55 19 16.5t-.725-1.775T16.5 14t-1.775.725T14 16.5t.725 1.775T16.5 19t1.775-.725M3 20v-2.775q0-.85.425-1.575t1.175-1.1q1.275-.65 2.875-1.1t3.55-.45q-.3.45-.513.963t-.337 1.062q-1.5.125-2.675.513t-1.975.812q-.25.125-.387.363T5 17.225V18h5.175q.125.55.338 1.05t.512.95zm7.175-2" />
                            </svg>
                            Data Rekrutmen
                        </a>
                    </div>
                </div>
            @endif

            <!-- Layanan -->
            @if (Auth::user()->role === 'Super Admin' || Auth::user()->role === 'Admin')
                <div class="pt-4 mt-4 border-t border-blue-400 border-opacity-30">
                    <p class="px-4 text-xs font-semibold text-blue-200 uppercase tracking-wider">Layanan</p>
                    <div class="mt-2 space-y-2">
                        <a href="/admin/softwares"
                            class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('cities.*') ? 'bg-white bg-opacity-20 text-white' : 'text-blue-100 hover:bg-white hover:bg-opacity-10 hover:text-white' }} transition-colors duration-200">
                            <svg class="mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M11 17h2l.3-1.5q.3-.125.563-.262t.537-.338l1.45.45l1-1.7l-1.15-1q.05-.35.05-.65t-.05-.65l1.15-1l-1-1.7l-1.45.45q-.275-.2-.537-.338T13.3 8.5L13 7h-2l-.3 1.5q-.3.125-.562.263T9.6 9.1l-1.45-.45l-1 1.7l1.15 1q-.05.35-.05.65t.05.65l-1.15 1l1 1.7l1.45-.45q.275.2.538.338t.562.262zm-.413-3.588Q10 12.826 10 12t.588-1.412T12 10t1.413.588T14 12t-.587 1.413T12 14t-1.412-.587M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.587 1.413T19 21zm0-2h14V5H5zM5 5v14z" />
                            </svg>
                            Aplikasi
                        </a>
                        <a href="/admin/news"
                            class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('cities.*') ? 'bg-white bg-opacity-20 text-white' : 'text-blue-100 hover:bg-white hover:bg-opacity-10 hover:text-white' }} transition-colors duration-200">
                            <svg class="mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M4 21q-.825 0-1.412-.587T2 19V5q0-.825.588-1.412T4 3h16q.825 0 1.413.588T22 5v14q0 .825-.587 1.413T20 21zm0-2h16V5H4zm2-2h12v-2H6zm0-4h4V7H6zm6 0h6v-2h-6zm0-4h6V7h-6zM4 19V5z" />
                            </svg>
                            Berita
                        </a>
                        <a href="/admin/galleries"
                            class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('cities.*') ? 'bg-white bg-opacity-20 text-white' : 'text-blue-100 hover:bg-white hover:bg-opacity-10 hover:text-white' }} transition-colors duration-200">
                            <svg class="mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.587 1.413T19 21zm0-2h14V5H5zm0 0V5zm2-2h10q.3 0 .45-.275t-.05-.525l-2.75-3.675q-.15-.2-.4-.2t-.4.2L11.25 16L9.4 13.525q-.15-.2-.4-.2t-.4.2l-2 2.675q-.2.25-.05.525T7 17" />
                            </svg>
                            Galeri
                        </a>
                        <a href="/admin/schedules"
                            class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('cities.*') ? 'bg-white bg-opacity-20 text-white' : 'text-blue-100 hover:bg-white hover:bg-opacity-10 hover:text-white' }} transition-colors duration-200">
                            <svg class="mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m15.3 16.7l1.4-1.4l-3.7-3.7V7h-2v5.4zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.325 0 5.663-2.337T20 12t-2.337-5.663T12 4T6.337 6.338T4 12t2.338 5.663T12 20" />
                            </svg>
                            Jadwal
                        </a>
                    </div>
                </div>
            @endif

            <!-- Account Settings -->
            <div class="pt-4 mt-4 border-t border-blue-400 border-opacity-30">
                <p class="px-4 text-xs font-semibold text-blue-200 uppercase tracking-wider">Akun</p>
                <div class="mt-2 space-y-2">
                    <a href="/profile"
                        class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('profile.*') ? 'bg-white bg-opacity-20 text-white' : 'text-blue-100 hover:bg-white hover:bg-opacity-10 hover:text-white' }} transition-colors duration-200">
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Profil
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
