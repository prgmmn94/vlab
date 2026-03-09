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
    <nav class="mt-8 px-4 pb-32 overflow-y-auto h-[calc(100vh-8rem)]">
        <div class="space-y-2">
            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}"
                class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('dashboard') ? 'bg-white bg-opacity-20 text-white' : 'text-blue-100 hover:bg-white hover:bg-opacity-10 hover:text-white' }} transition-colors duration-200">
                <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                Dasbor
            </a>

            <!-- Rekrutmen Section -->
            @if (Auth::user()->role === 'Super Admin' || Auth::user()->role === 'Oprec Admin')
                <div class="pt-4 mt-4 border-t border-blue-400 border-opacity-30">
                    <p class="px-4 text-xs font-semibold text-blue-200 uppercase tracking-wider">Rekrutmen</p>
                    <div class="mt-2 space-y-2">
                        <a href="{{ route('recruitment_periods.index') }}"
                            class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('recruitment_periods.*') || request()->routeIs('admin.recruitments.*') ? 'bg-white bg-opacity-20 text-white' : 'text-blue-100 hover:bg-white hover:bg-opacity-10 hover:text-white' }} transition-colors duration-200">
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

            <!-- Layanan Section -->
            @if (Auth::user()->role === 'Super Admin' || Auth::user()->role === 'Admin')
                <div class="pt-4 mt-4 border-t border-blue-400 border-opacity-30">
                    <p class="px-4 text-xs font-semibold text-blue-200 uppercase tracking-wider">Layanan</p>
                    <div class="mt-2 space-y-2">
                        <!-- Aplikasi -->
                        {{-- <a href="{{ route('admin.softwares.index') }}"
                            class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('admin.softwares.*') ? 'bg-white bg-opacity-20 text-white' : 'text-blue-100 hover:bg-white hover:bg-opacity-10 hover:text-white' }} transition-colors duration-200">
                            <svg class="mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M11 17h2l.3-1.5q.3-.125.563-.262t.537-.338l1.45.45l1-1.7l-1.15-1q.05-.35.05-.65t-.05-.65l1.15-1l-1-1.7l-1.45.45q-.275-.2-.537-.338T13.3 8.5L13 7h-2l-.3 1.5q-.3.125-.562.263T9.6 9.1l-1.45-.45l-1 1.7l1.15 1q-.05.35-.05.65t.05.65l-1.15 1l1 1.7l1.45-.45q.275.2.538.338t.562.262zm-.413-3.588Q10 12.826 10 12t.588-1.412T12 10t1.413.588T14 12t-.587 1.413T12 14t-1.412-.587M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.587 1.413T19 21zm0-2h14V5H5zM5 5v14z" />
                            </svg>
                            Aplikasi
                        </a> --}}

                        <!-- Berita -->
                        <a href="{{ route('admin.news.index') }}"
                            class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('admin.news.*') ? 'bg-white bg-opacity-20 text-white' : 'text-blue-100 hover:bg-white hover:bg-opacity-10 hover:text-white' }} transition-colors duration-200">
                            <svg class="mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M4 21q-.825 0-1.412-.587T2 19V5q0-.825.588-1.412T4 3h16q.825 0 1.413.588T22 5v14q0 .825-.587 1.413T20 21zm0-2h16V5H4zm2-2h12v-2H6zm0-4h4V7H6zm6 0h6v-2h-6zm0-4h6V7h-6zM4 19V5z" />
                            </svg>
                            Berita
                        </a>

                        <!-- Galeri -->
                        {{-- <a href="{{ route('admin.photos.index') }}"
                            class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('admin.photos.*') ? 'bg-white bg-opacity-20 text-white' : 'text-blue-100 hover:bg-white hover:bg-opacity-10 hover:text-white' }} transition-colors duration-200">
                            <svg class="mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.587 1.413T19 21zm0-2h14V5H5zm0 0V5zm2-2h10q.3 0 .45-.275t-.05-.525l-2.75-3.675q-.15-.2-.4-.2t-.4.2L11.25 16L9.4 13.525q-.15-.2-.4-.2t-.4.2l-2 2.675q-.2.25-.05.525T7 17" />
                            </svg>
                            Galeri
                        </a> --}}

                        <!-- Jadwal -->
                        <a href="{{ route('admin.schedules.index') }}"
                            class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('admin.schedules.*') ? 'bg-white bg-opacity-20 text-white' : 'text-blue-100 hover:bg-white hover:bg-opacity-10 hover:text-white' }} transition-colors duration-200">
                            <svg class="mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2m0 16H5V10h14zM9 14H7v-2h2zm4 0h-2v-2h2zm4 0h-2v-2h2zm-8 4H7v-2h2zm4 0h-2v-2h2zm4 0h-2v-2h2z" />
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
                    <a href="{{ route('profile.edit') }}"
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

    <!-- User Profile Section (Fixed Bottom) -->
    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-blue-900 to-transparent">
        <div class="bg-white bg-opacity-10 rounded-lg p-3 backdrop-blur-sm">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="text-sm font-bold text-blue-600">
                        {{ collect(explode(' ', Auth::user()->name))->map(fn($word) => strtoupper(substr($word, 0, 1)))->take(2)->join('') }}
                    </span>
                </div>
                <div class="ml-3 flex-1 min-w-0">
                    <p class="text-sm font-medium text-white truncate">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-blue-200 truncate">{{ Auth::user()->role }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="mt-3">
                @csrf
                <button type="submit"
                    class="w-full flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-red-500 bg-opacity-80 hover:bg-opacity-100 rounded-md transition-all duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    Log Out
                </button>
            </form>
        </div>
    </div>
</div>
