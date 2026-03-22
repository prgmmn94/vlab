<x-admin.layout>
    <div class="space-y-6">

        {{-- Breadcrumb --}}
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
                                        clip-rule="evenodd" />
                                </svg>
                                <a href="{{ route('admin.recruitment_periods.announcements.index', $recruitmentPeriod) }}"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">
                                    Pengumuman {{ $recruitmentPeriod->tahun }}
                                </a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">
                                    Edit — {{ $announcement->nama_tahap }}
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        {{-- Header --}}
        <div class="bg-yellow-600 overflow-hidden shadow-md rounded-lg text-lg font-semibold text-white">
            <div class="p-6 text-gray-100">
                Edit Pengumuman — Periode {{ $recruitmentPeriod->tahun }}
            </div>
        </div>

        {{-- Form --}}
        <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6">
            <form action="{{ route('admin.announcements.update', $announcement) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Info Periode --}}
                <div class="mb-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                    <p class="text-sm font-medium text-blue-900">
                        Periode Rekrutmen: <span class="font-bold">{{ $recruitmentPeriod->tahun }}</span>
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">

                    {{-- Nama Tahap --}}
                    <div class="sm:col-span-full">
                        <label for="nama_tahap" class="block text-sm font-medium text-gray-900">
                            Nama Tahap <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-2">
                            <input type="text" id="nama_tahap" name="nama_tahap"
                                value="{{ old('nama_tahap', $announcement->nama_tahap) }}"
                                placeholder="cth. Seleksi Administrasi, Tes Tertulis, Wawancara…"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm" />
                        </div>
                        @error('nama_tahap')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Link Google Sheets --}}
                    <div class="sm:col-span-full">
                        <label for="link_google_sheets" class="block text-sm font-medium text-gray-900">
                            Link Google Sheets
                        </label>
                        <div class="mt-2">
                            <input type="url" id="link_google_sheets" name="link_google_sheets"
                                value="{{ old('link_google_sheets', $announcement->link_google_sheets) }}"
                                placeholder="https://docs.google.com/spreadsheets/…"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm" />
                        </div>
                        @error('link_google_sheets')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Kosongkan jika belum tersedia.</p>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="sm:col-span-full">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-900">
                            Deskripsi
                        </label>
                        <div class="mt-2">
                            <textarea id="deskripsi" name="deskripsi" rows="4" placeholder="Informasi tambahan tentang tahap ini…"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-sm">{{ old('deskripsi', $announcement->deskripsi) }}</textarea>
                        </div>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Toggle Publish --}}
                    <div class="sm:col-span-full">
                        <div class="flex items-center gap-3">
                            <input type="checkbox" id="is_published" name="is_published" value="1"
                                {{ old('is_published', $announcement->is_published) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" />
                            <label for="is_published" class="text-sm font-medium text-gray-900">
                                Published
                            </label>
                        </div>
                        <p class="mt-1 text-xs text-gray-500 ml-7">Centang agar pengumuman tampil ke publik.</p>
                    </div>

                </div>

                <hr class="h-px my-8 bg-gray-300 border-0">

                {{-- Buttons --}}
                <div class="flex items-center justify-between">
                    <a href="{{ route('admin.recruitment_periods.announcements.index', $recruitmentPeriod) }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 hover:text-gray-900 rounded-md border border-gray-300 hover:bg-gray-50 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                    <button type="submit"
                        class="inline-flex items-center rounded-md bg-yellow-600 px-6 py-2 text-sm font-medium text-white shadow-sm hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M5 19h1.425L16.2 9.225L14.775 7.8L5 17.575zm-1 2q-.425 0-.712-.288T3 20v-2.425q0-.4.15-.763t.425-.637L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.437.65T21 6.4q0 .4-.138.763t-.437.662l-12.6 12.6q-.275.275-.638.425t-.762.15zM19 6.4L17.6 5zm-3.525 2.125l-.7-.725L16.2 9.225z" />
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>

    </div>
</x-admin.layout>
