<x-admin.layout>
    <div class="space-y-6 animate-fadeInUp">
        <!-- Modern Welcome Section with Glassmorphism -->
        <div
            class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 rounded-2xl shadow-2xl overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 bg-white/10 backdrop-blur-sm">
                <div class="absolute inset-0 bg-gradient-to-br from-white/20 to-transparent"></div>
                <div class="absolute top-0 left-0 w-full h-full">
                    <div class="absolute top-1/4 left-1/4 w-32 h-32 bg-white/10 rounded-full blur-xl"></div>
                    <div class="absolute bottom-1/4 right-1/4 w-24 h-24 bg-white/20 rounded-full blur-lg"></div>
                </div>
            </div>

            <div class="relative p-8 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h1
                            class="text-4xl font-bold mb-3 bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent">
                            Selamat datang, {{ Auth::user()->name }}!
                        </h1>
                        <p class="text-xl text-blue-100 mb-4">Here's what's happening with your system today.</p>
                        <div class="flex items-center space-x-4 text-sm text-blue-200">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ now()->format('l, F j, Y') }}
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                System Online
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div
                            class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Total Users Card -->
            <div class="group relative bg-white overflow-hidden shadow-lg rounded-2xl border border-gray-200 hover:shadow-2xl hover:border-blue-300 transition-all duration-300 transform hover:-translate-y-1 animate-slideInRight"
                style="animation-delay: 0.1s">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-blue-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>
                <div class="relative p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M9.775 12q-.9 0-1.5-.675T7.8 9.75l.325-2.45q.2-1.425 1.3-2.363T12 4t2.575.938t1.3 2.362l.325 2.45q.125.9-.475 1.575t-1.5.675zm0-2h4.45L13.9 7.6q-.1-.7-.637-1.15T12 6t-1.263.45T10.1 7.6zM4 20v-2.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13t3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20zm2-2h12v-.8q0-.275-.137-.5t-.363-.35q-1.35-.675-2.725-1.012T12 15t-2.775.338T6.5 16.35q-.225.125-.363.35T6 17.2zm6 0" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-600 mb-1">Total Users</p>
                                    <p class="text-2xl font-bold text-gray-900">
                                        {{ \App\Models\User::whereIn('role', ['Super Admin', 'Operation Admin', 'Oprec Admin'])->count() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Roles Card -->
            <div class="group relative bg-white overflow-hidden shadow-lg rounded-2xl border border-gray-200 hover:shadow-2xl hover:border-green-300 transition-all duration-300 transform hover:-translate-y-1 animate-slideInRight"
                style="animation-delay: 0.2s">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-green-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>
                <div class="relative p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M11.675 21.875q-.15-.025-.3-.075Q8 20.675 6 17.637T4 11.1V6.375q0-.625.363-1.125t.937-.725l6-2.25q.35-.125.7-.125t.7.125l6 2.25q.575.225.938.725T20 6.375V11.1q0 3.5-2 6.538T12.625 21.8q-.15.05-.3.075T12 21.9t-.325-.025M12 19.9q2.6-.825 4.3-3.3t1.7-5.5V6.375l-6-2.25l-6 2.25V11.1q0 3.025 1.7 5.5t4.3 3.3m0-7.9" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-600 mb-1">Total Roles</p>
                                    <p class="text-2xl font-bold text-gray-900">
                                        {{ \App\Models\User::distinct('role')->count('role') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Your Roles Card -->
            <div class="group relative bg-white overflow-hidden shadow-lg rounded-2xl border border-gray-200 hover:shadow-2xl hover:border-yellow-300 transition-all duration-300 transform hover:-translate-y-1 animate-slideInRight"
                style="animation-delay: 0.4s">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-yellow-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>
                <div class="relative p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-600 mb-1">Your Role</p>
                                    <p class="text-2xl font-bold text-gray-900">{{ Auth::user()->role }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-admin.layout>
