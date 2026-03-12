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
                                <a href="{{ route('admin.recruitments.index', $recruitment->recruitment_period_id) }}"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">
                                    Rekrutmen {{ $recruitment->recruitmentPeriod->tahun }}
                                </a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Detail -
                                    {{ $recruitment->nama }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="bg-blue-500 text-white shadow-md rounded-lg">
            <div class="p-6 text-lg font-semibold">
                {{ __('Detail Data Calas') }}
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6">

            <div class="mb-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-blue-900">
                        Periode: <span class="font-bold">{{ $recruitmentPeriod->tahun }}</span>
                    </p>
                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">
                        ID Calas: {{ $recruitment->id_calas }}
                    </span>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-300 border-0">

            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2">Data Pribadi</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Nama Lengkap</label>
                        <p class="text-base text-gray-900 font-medium">{{ $recruitment->nama }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">NPM</label>
                        <p class="text-base text-gray-900">{{ $recruitment->npm }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Email</label>
                        <p class="text-base text-gray-900">{{ $recruitment->email }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Nomor HP</label>
                        <p class="text-base text-gray-900">{{ $recruitment->no_hp }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Program Studi</label>
                        <p class="text-base text-gray-900">{{ $recruitment->jurusan }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Kelas</label>
                        <p class="text-base text-gray-900">{{ $recruitment->kelas ?? '-' }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Region</label>
                        <p class="text-base text-gray-900">{{ $recruitment->region }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Posisi yang Dilamar</label>
                        <span
                            class="px-3 py-1 rounded-full text-sm font-semibold
                            {{ $recruitment->posisi_dilamar == 'programmer' ? 'bg-green-100 text-green-800' : 'bg-purple-100 text-purple-800' }}">
                            {{ ucfirst($recruitment->posisi_dilamar) }}
                        </span>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-500 mb-1">Alamat</label>
                        <p class="text-base text-gray-900">{{ $recruitment->alamat }}</p>
                    </div>

                    {{-- @if ($recruitment->tempat_lahir || $recruitment->tanggal_lahir)
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Tempat/Tanggal Lahir</label>
                            <p class="text-base text-gray-900">
                                {{ $recruitment->tempat_lahir ?? '-' }}
                                @if ($recruitment->tanggal_lahir)
                                    , {{ $recruitment->tanggal_lahir->format('d F Y') }}
                                @endif
                            </p>
                        </div>
                    @endif --}}

                    @if ($recruitment->agama)
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Agama</label>
                            <p class="text-base text-gray-900">{{ $recruitment->agama }}</p>
                        </div>
                    @endif

                    @if ($recruitment->sosial_media)
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-500 mb-1">Sosial Media</label>
                            <a href="{{ $recruitment->sosial_media }}" target="_blank"
                                class="text-base text-blue-600 hover:underline">
                                {{ $recruitment->sosial_media }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-300 border-0">

            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2">Berkas Pendaftaran</h3>

                @if ($recruitment->berkas)
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">{{ basename($recruitment->berkas) }}</p>
                            <p class="text-xs text-gray-500 mt-1">
                                Diupload: {{ $recruitment->created_at->format('d F Y, H:i') }}
                            </p>
                        </div>
                        <div>
                            <a href="{{ asset('storage/' . $recruitment->berkas) }}" download
                                class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm font-medium shadow-sm transition">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Download
                            </a>
                        </div>
                    </div>
                @else
                    <div class="p-4 bg-yellow-50 rounded-lg border border-yellow-200">
                        <p class="text-sm text-yellow-800">Belum ada berkas yang diupload</p>
                    </div>
                @endif
            </div>

            <hr class="h-px my-8 bg-gray-300 border-0">

            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2">Informasi Sistem</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Tanggal Pendaftaran</label>
                        <p class="text-base text-gray-900">{{ $recruitment->created_at->format('d F Y H:i') }} WIB</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Terakhir Diupdate</label>
                        <p class="text-base text-gray-900">{{ $recruitment->updated_at->format('d M Y H:i') }}</p>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-300 border-0">

            <div class="mt-8 flex items-center justify-between">
                <a href="{{ route('admin.recruitments.index', $recruitmentPeriod->id) }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 hover:text-gray-900 rounded-md border border-gray-300 hover:bg-gray-50 transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>

        </div>

    </div>
</x-admin.layout>
