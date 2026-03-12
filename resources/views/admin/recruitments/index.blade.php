<x-admin.layout>
    <div class="space-y-6">

        <div class="bg-white overflow-hidden shadow-md rounded-lg">
            <div class="p-4">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('recruitment_periods.index') }}"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                                Periode Rekrutmen
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Rekrutmen
                                    {{ $recruitmentPeriod->tahun }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="bg-blue-500 overflow-hidden shadow-md rounded-lg text-lg font-semibold mb-3 text-white">
            <div class="p-6 text-gray-100">
                Data Rekrutmen Periode {{ $recruitmentPeriod->tahun }}
            </div>
        </div>

        {{-- Statistik Card --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            {{-- Total Pendaftar --}}
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 font-medium">Total Pendaftar</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1">{{ $recruitments->total() }}</h3>
                    </div>
                    <div class="bg-blue-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Programmer --}}
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 font-medium">Programmer</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['programmer'] ?? 0 }}</h3>
                    </div>
                    <div class="bg-green-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Asisten --}}
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 font-medium">Asisten</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['asisten'] ?? 0 }}</h3>
                    </div>
                    <div class="bg-purple-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Berkas Uploaded --}}
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 font-medium">Berkas Uploaded</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['with_berkas'] ?? 0 }}</h3>
                    </div>
                    <div class="bg-yellow-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Detail per Region & Posisi --}}
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Detail per Region & Posisi</h3>
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                @foreach ($regionStats as $region => $data)
                    <div class="border rounded-lg p-4 hover:shadow-md transition">
                        <h4 class="font-semibold text-gray-900 mb-3 border-b pb-2">{{ ucfirst($region) }}</h4>
                        <div class="space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Programmer:</span>
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">
                                    {{ $data['programmer'] ?? 0 }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Asisten:</span>
                                <span
                                    class="px-2 py-1 bg-purple-100 text-purple-800 rounded-full text-xs font-semibold">
                                    {{ $data['asisten'] ?? 0 }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between pt-2 border-t">
                                <span class="text-sm font-semibold text-gray-900">Total:</span>
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-bold">
                                    {{ ($data['programmer'] ?? 0) + ($data['asisten'] ?? 0) }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Download Section --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            {{-- Download Berkas --}}
            <div class="bg-white p-4 rounded-lg shadow-md">
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Download Berkas:</label>

                    @if ($stats['with_berkas'] > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                            {{-- Download All --}}
                            <a href="{{ route('admin.recruitments.download.all', $recruitmentPeriod->id) }}"
                                class="w-full inline-flex items-center justify-center px-3 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-md shadow-md text-xs lg:text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <p>Semua</p>
                            </a>

                            {{-- Dropdown By Region --}}
                            <div class="relative" x-data="{ open: false }">
                                <button type="button" @click="open = !open" @click.away="open = false"
                                    class="w-full inline-flex items-center justify-center px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md shadow-md text-xs lg:text-sm whitespace-nowrap">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <p>Region</p>
                                    <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="open" x-transition
                                    class="absolute left-0 right-0 sm:left-auto sm:right-0 sm:w-48 mt-2 bg-white rounded-md shadow-lg z-20 border border-gray-200">
                                    <div class="py-1">
                                        @foreach (['Depok', 'Kalimalang', 'Salemba', 'Karawaci', 'Cengkareng'] as $region)
                                            <a href="{{ route('admin.recruitments.download.region', [$recruitmentPeriod->id, $region]) }}"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">
                                                {{ $region }}
                                                <span
                                                    class="text-xs text-gray-500">({{ ($regionStats[$region]['programmer'] ?? 0) + ($regionStats[$region]['asisten'] ?? 0) }})</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            {{-- Dropdown By Position --}}
                            <div class="relative" x-data="{ open: false }">
                                <button type="button" @click="open = !open" @click.away="open = false"
                                    class="w-full inline-flex items-center justify-center px-3 py-2 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-md shadow-md text-xs lg:text-sm whitespace-nowrap">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <p>Posisi</p>
                                    <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="open" x-transition
                                    class="absolute left-0 right-0 sm:left-auto sm:right-0 sm:w-48 mt-2 bg-white rounded-md shadow-lg z-20 border border-gray-200">
                                    <div class="py-1">
                                        <a href="{{ route('admin.recruitments.download.position', [$recruitmentPeriod->id, 'programmer']) }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-50">
                                            Programmer
                                            <span class="text-xs text-gray-500">({{ $stats['programmer'] }})</span>
                                        </a>
                                        <a href="{{ route('admin.recruitments.download.position', [$recruitmentPeriod->id, 'asisten']) }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-50">
                                            Asisten
                                            <span class="text-xs text-gray-500">({{ $stats['asisten'] }})</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="bg-red-50 border border-red-200 rounded-md p-4">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-red-500 mr-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2m1 15h-2v-2h2zm0-4h-2V7h2z" />
                                </svg>
                                <span class="text-sm text-red-700 font-medium">Tidak ada berkas yang tersedia!</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Export Excel --}}
            <div class="bg-white p-4 rounded-lg shadow-md">
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Export Data:</label>

                    @if ($recruitments->total() > 0)
                        <a href="{{ route('admin.recruitments.export', $recruitmentPeriod->id) }}"
                            class="w-full inline-flex items-center justify-center px-4 py-2 border border-yellow-500 bg-blue-50 text-yellow-600 hover:text-white hover:bg-yellow-500 font-medium rounded-md shadow-md text-sm transition-colors duration-200">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m16 8.4l-8.9 8.9q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7L14.6 7H7q-.425 0-.712-.288T6 6t.288-.712T7 5h10q.425 0 .713.288T18 6v10q0 .425-.288.713T17 17t-.712-.288T16 16z" />
                            </svg>
                            <span class="hidden sm:inline">Ekspor Excel ({{ $recruitments->total() }} data)</span>
                            <span class="sm:hidden">Export</span>
                        </a>
                    @else
                        <div class="bg-red-50 border border-red-200 rounded-md p-4">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-red-500 mr-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2m1 15h-2v-2h2zm0-4h-2V7h2z" />
                                </svg>
                                <span class="text-sm text-red-700 font-medium">Tidak ada data yang tersedia!</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Search Form --}}
        <div class="bg-white p-4 rounded-lg shadow-md">
            <form method="GET" action="{{ route('admin.recruitments.index', $recruitmentPeriod->id) }}">
                <div class="flex gap-2">
                    <input type="text" name="search" placeholder="Cari nama, NPM, atau jurusan..."
                        value="{{ request('search') }}"
                        class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                    <button type="submit"
                        class="px-4 py-2 border border-blue-500 bg-blue-50 text-blue-600 hover:text-white hover:bg-blue-500 rounded-md font-semibold shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M9.5 16q-2.725 0-4.612-1.888T3 9.5t1.888-4.612T9.5 3t4.613 1.888T16 9.5q0 1.1-.35 2.075T14.7 13.3l5.6 5.6q.275.275.275.7t-.275.7t-.7.275t-.7-.275l-5.6-5.6q-.75.6-1.725.95T9.5 16m0-2q1.875 0 3.188-1.312T14 9.5t-1.312-3.187T9.5 5T6.313 6.313T5 9.5t1.313 3.188T9.5 14" />
                        </svg>
                    </button>
                    @if (request('search'))
                        <a href="{{ route('admin.recruitments.index', $recruitmentPeriod->id) }}"
                            class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md font-semibold shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 20q-3.35 0-5.675-2.325T4 12t2.325-5.675T12 4q1.725 0 3.3.712T18 6.75V4h2v7h-7V9h4.2q-.8-1.4-2.187-2.2T12 6Q9.5 6 7.75 7.75T6 12t1.75 4.25T12 18q1.925 0 3.475-1.1T17.65 14h2.1q-.7 2.65-2.85 4.325T12 20" />
                            </svg>
                        </a>
                    @endif
                </div>
            </form>
        </div>

        {{-- Table --}}
        <div class="bg-white overflow-hidden shadow-md rounded-lg">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID Calas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                NPM</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kelas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Region</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Program Studi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Posisi Dilamar</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($recruitments as $index => $recruitment)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $recruitments->firstItem() + $index }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <span
                                        class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-xs font-mono font-semibold">
                                        {{ $recruitment->id_calas }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $recruitment->nama }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $recruitment->npm }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $recruitment->kelas }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $recruitment->region }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $recruitment->jurusan }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <span
                                        class="px-2 py-1 rounded-full text-xs font-semibold
                                        {{ $recruitment->posisi_dilamar == 'programmer' ? 'bg-green-100 text-green-800' : 'bg-purple-100 text-purple-800' }}">
                                        {{ ucfirst($recruitment->posisi_dilamar) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <a href="{{ route('admin.recruitments.show', [$recruitmentPeriod->id, $recruitment->id]) }}"
                                        class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1 rounded-md text-sm shadow-md inline-flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                        </svg>
                                    </a>

                                    @if (Auth::user()->role === 'Super Admin')
                                        <a href="{{ route('admin.recruitments.edit', [$recruitmentPeriod->id, $recruitment->id]) }}"
                                            class="bg-yellow-600 hover:bg-yellow-500 text-white px-3 py-1 rounded-md text-sm shadow-md inline-flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M5 19h1.425L16.2 9.225L14.775 7.8L5 17.575zm-1 2q-.425 0-.712-.288T3 20v-2.425q0-.4.15-.763t.425-.637L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.437.65T21 6.4q0 .4-.138.763t-.437.662l-12.6 12.6q-.275.275-.638.425t-.762.15zM19 6.4L17.6 5zm-3.525 2.125l-.7-.725L16.2 9.225z" />
                                            </svg>
                                        </a>

                                        <form
                                            action="{{ route('admin.recruitments.destroy', [$recruitmentPeriod->id, $recruitment->id]) }}"
                                            method="POST" class="inline"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded-md text-sm shadow-md inline-flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    <div
                                        class="bg-gradient-to-l from-white to-red-50 text-red-800 px-6 py-5 w-full text-lg font-semibold">
                                        Data belum tersedia!
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $recruitments->links() }}
            </div>
        </div>

    </div>
</x-admin.layout>
