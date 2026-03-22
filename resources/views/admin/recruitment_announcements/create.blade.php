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
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Tambah Tahap</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        {{-- Header --}}
        <div class="bg-green-600 overflow-hidden shadow-md rounded-lg text-lg font-semibold text-white">
            <div class="p-6 text-gray-100">
                Tambah Pengumuman — Periode {{ $recruitmentPeriod->tahun }}
            </div>
        </div>

        {{-- Form --}}
        <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6">
            <form action="{{ route('admin.recruitment_periods.announcements.store', $recruitmentPeriod) }}" method="POST">
                @csrf

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
                            <input type="text" id="nama_tahap" name="nama_tahap" value="{{ old('nama_tahap') }}"
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
                                value="{{ old('link_google_sheets') }}"
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
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-sm">{{ old('deskripsi') }}</textarea>
                        </div>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Toggle Publish --}}
                    <div class="sm:col-span-full">
                        <div class="flex items-center gap-3">
                            <input type="checkbox" id="is_published" name="is_published" value="1"
                                {{ old('is_published') ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" />
                            <label for="is_published" class="text-sm font-medium text-gray-900">
                                Langsung Publish
                            </label>
                        </div>
                        <p class="mt-1 text-xs text-gray-500 ml-7">Jika dicentang, pengumuman langsung tampil ke publik.
                        </p>
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
                        class="inline-flex items-center rounded-md bg-green-600 px-6 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M21 7v12q0 .825-.587 1.413T19 21H5q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h12zm-6.875 10.125Q15 16.25 15 15t-.875-2.125T12 12t-2.125.875T9 15t.875 2.125T12 18t2.125-.875M6 10h9V6H6z" />
                        </svg>
                        Simpan
                    </button>
                </div>

            </form>
        </div>

    </div>
</x-admin.layout>
