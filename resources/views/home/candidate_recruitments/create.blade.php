@extends('components.home.layout')

@section('content')
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6 ">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-extrabold text-gray-900">
                    Pendaftaran Calon Asisten & Programmer {{ $recruitmentPeriod->tahun }}
                </h1>
                <p class="text-gray-600 mt-3">
                    Lengkapi data berikut untuk mengikuti proses seleksi Laboratorium Manajemen Menengah.
                </p>
            </div>

            {{-- Alert Errors --}}
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-md mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Terdapat kesalahan:</h3>
                            <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('candidate.recruitments.store') }}" method="POST" enctype="multipart/form-data"
                class="bg-white shadow-xl rounded-2xl p-8 md:p-10 border border-gray-100 space-y-10">
                @csrf
                <div class="space-y-12">
                    <div class="bg-gray-50 rounded-xl p-6 border">
                        <h1 class="text-2xl/7 font-semibold text-purple-800">Data Diri</h1>
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            {{-- Nama --}}
                            <div class="sm:col-span-3">
                                <label for="nama" class="block text-sm/6 font-medium text-gray-900">
                                    Nama Lengkap <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input id="nama" type="text" name="nama" value="{{ old('nama') }}" required
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                                </div>
                                @error('nama')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- NPM --}}
                            <div class="sm:col-span-3">
                                <label for="npm" class="block text-sm/6 font-medium text-gray-900">
                                    NPM <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input id="npm" type="text" name="npm" value="{{ old('npm') }}" required
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                                </div>
                                @error('npm')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="sm:col-span-3">
                                <label for="email" class="block text-sm/6 font-medium text-gray-900">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                                </div>
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- No HP --}}
                            <div class="sm:col-span-3">
                                <label for="no_hp" class="block text-sm/6 font-medium text-gray-900">
                                    Nomor HP <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input id="no_hp" type="text" name="no_hp" value="{{ old('no_hp') }}" required
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                                </div>
                                @error('no_hp')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Jurusan --}}
                            <div class="sm:col-span-3">
                                <label for="jurusan" class="block text-sm/6 font-medium text-gray-900">
                                    Program Studi <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2 grid grid-cols-1">
                                    <select id="jurusan" name="jurusan" required
                                        class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                        <option value="">-- Pilih Program Studi --</option>
                                        <option value="Manajemen" {{ old('jurusan') == 'Manajemen' ? 'selected' : '' }}>
                                            Manajemen</option>
                                        <option value="Akuntansi" {{ old('jurusan') == 'Akuntansi' ? 'selected' : '' }}>
                                            Akuntansi</option>
                                        <option value="Informatika"
                                            {{ old('jurusan') == 'Informatika' ? 'selected' : '' }}>Informatika</option>
                                        <option value="Sistem Informasi"
                                            {{ old('jurusan') == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi
                                        </option>
                                    </select>
                                </div>
                                @error('jurusan')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Kelas --}}
                            <div class="sm:col-span-3">
                                <label for="kelas" class="block text-sm/6 font-medium text-gray-900">Kelas <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <input id="kelas" type="text" name="kelas" required value="{{ old('kelas') }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                                </div>
                                @error('kelas')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Region --}}
                            <div class="sm:col-span-3">
                                <label for="region" class="block text-sm/6 font-medium text-gray-900">
                                    Region <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2 grid grid-cols-1">
                                    <select id="region" name="region" required
                                        class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                        <option value="">-- Pilih Region --</option>
                                        <option value="Depok" {{ old('region') == 'Depok' ? 'selected' : '' }}>Depok
                                        </option>
                                        <option value="Kalimalang" {{ old('region') == 'Kalimalang' ? 'selected' : '' }}>
                                            Kalimalang</option>
                                        <option value="Salemba" {{ old('region') == 'Salemba' ? 'selected' : '' }}>Salemba
                                        </option>
                                        <option value="Karawaci" {{ old('region') == 'Karawaci' ? 'selected' : '' }}>
                                            Karawaci</option>
                                        <option value="Cengkareng" {{ old('region') == 'Cengkareng' ? 'selected' : '' }}>
                                            Cengkareng</option>
                                    </select>
                                </div>
                                @error('region')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Posisi Dilamar (Hidden - Auto Set) --}}
                            <input type="hidden" id="posisi_dilamar" name="posisi_dilamar"
                                value="{{ old('posisi_dilamar') }}">

                            {{-- Display Posisi (Read Only) --}}
                            <div class="sm:col-span-3">
                                <label for="posisi_display" class="block text-sm/6 font-medium text-gray-900">
                                    Posisi yang Dilamar <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input id="posisi_display" type="text" readonly
                                        class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 sm:text-sm/6 cursor-not-allowed"
                                        placeholder="Pilih Program Studi terlebih dahulu" />
                                </div>
                                <p class="mt-1 text-xs text-gray-500">Posisi otomatis berdasarkan Program Studi</p>
                                @error('posisi_dilamar')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Alamat --}}
                            <div class="col-span-full">
                                <label for="alamat" class="block text-sm/6 font-medium text-gray-900">
                                    Alamat <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <textarea id="alamat" name="alamat" rows="3" required
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('alamat') }}</textarea>
                                </div>
                                @error('alamat')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Agama --}}
                            <div class="sm:col-span-3">
                                <label for="agama" class="block text-sm/6 font-medium text-gray-900">Agama <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-2 grid grid-cols-1">
                                    <select id="agama" name="agama" required
                                        class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                        <option value="">-- Pilih Agama --</option>
                                        <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam
                                        </option>
                                        <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen
                                        </option>
                                        <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik
                                        </option>
                                        <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu
                                        </option>
                                        <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>
                                            Konghucu</option>
                                        <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha
                                        </option>
                                    </select>
                                </div>
                            </div>

                            {{-- Sosial Media --}}
                            <div class="sm:col-span-3">
                                <label for="sosial_media" class="block text-sm/6 font-medium text-gray-900">Sosial
                                    Media <span class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <input id="sosial_media" type="text" name="sosial_media" required
                                        value="{{ old('sosial_media') }}" placeholder="@username atau link profil"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                                </div>
                            </div>
                        </div>
                        <div class="text-xs text-gray-500 mt-4 space-y-1">
                            <p>* Cantumkan salah satu URL sosial media (Instagram/LinkedIn/TikTok)</p>
                            <p>* Pastikan akun sosial media tidak di private</p>
                        </div>
                    </div>

                    {{-- Upload Berkas --}}
                    <div class="bg-gray-50 rounded-xl p-6 border">
                        <h1 class="text-2xl/7 font-semibold text-purple-800">Upload Berkas</h1>
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="col-span-full">
                                <label for="berkas" class="block text-sm/6 font-medium text-gray-900">
                                    .RAR/.ZIP <span class="text-red-500">*</span>
                                </label>
                                <div
                                    class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                    <div class="text-center w-full">
                                        <svg viewBox="0 0 24 24" fill="currentColor" data-slot="icon" aria-hidden="true"
                                            class="mx-auto size-12 text-gray-300" id="upload-icon">
                                            <path fill="currentColor"
                                                d="M4 20q-.825 0-1.412-.587T2 18V6q0-.825.588-1.412T4 4h6l2 2h8q.825 0 1.413.588T22 8v10q0 .825-.587 1.413T20 20z" />
                                        </svg>
                                        <div class="mt-4 flex justify-center text-sm/6 text-gray-600">
                                            <label for="berkas"
                                                class="relative cursor-pointer rounded-md bg-transparent font-semibold text-indigo-600 focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-indigo-600 hover:text-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="berkas" type="file" name="berkas" accept=".rar,.zip"
                                                    required class="sr-only" onchange="displayFileName(this)" />
                                            </label>
                                        </div>
                                        <p class="text-xs/5 text-gray-600" id="file-size-info">.RAR/.ZIP Max 5MB</p>

                                        {{-- File Info Display --}}
                                        <div id="file-info" class="mt-4 hidden">
                                            <div
                                                class="inline-flex items-center gap-2 px-4 py-2 bg-green-50 border border-green-200 rounded-lg">
                                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <div class="text-left">
                                                    <p class="text-sm font-medium text-green-800" id="file-name"></p>
                                                    <p class="text-xs text-green-600" id="file-size"></p>
                                                </div>
                                                <button type="button" onclick="removeFile()"
                                                    class="ml-2 text-green-600 hover:text-green-800">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('berkas')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="text-xs text-gray-500 mt-4 space-y-1">
                            <p>.RAR/.ZIP (berisi CV, Surat Lamaran, Motivation Letter, PAS Foto 4x6, KRS, Transkrip Nilai)
                            </p>
                            <p>* Upload hanya file .RAR/.ZIP</p>
                            <p>* Transkrip nilai = semester terakhir</p>
                            <p>* Ukuran maksimal 5120KB (5MB)</p>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Kirim Pendaftaran
                    </button>
                </div>
            </form>

        </div>
    </section>

    {{-- JavaScript untuk Auto Set Posisi --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jurusanSelect = document.getElementById('jurusan');
            const posisiHidden = document.getElementById('posisi_dilamar');
            const posisiDisplay = document.getElementById('posisi_display');

            // Mapping jurusan ke posisi
            const posisiMapping = {
                'Manajemen': 'Asisten',
                'Akuntansi': 'Asisten',
                'Informatika': 'Programmer',
                'Sistem Informasi': 'Programmer'
            };

            // Display mapping
            const posisiDisplayMapping = {
                'Asisten': 'Asisten',
                'Programmer': 'Programmer'
            };

            function updatePosisi() {
                const selectedJurusan = jurusanSelect.value;

                if (selectedJurusan && posisiMapping[selectedJurusan]) {
                    const posisi = posisiMapping[selectedJurusan];
                    posisiHidden.value = posisi;
                    posisiDisplay.value = posisiDisplayMapping[posisi];
                } else {
                    posisiHidden.value = '';
                    posisiDisplay.value = '';
                    posisiDisplay.placeholder = 'Pilih Program Studi terlebih dahulu';
                }
            }

            // Event listener saat jurusan berubah
            jurusanSelect.addEventListener('change', updatePosisi);

            // Set posisi saat halaman load (untuk old value)
            updatePosisi();
        });
    </script>

    {{-- JavaScript untuk Display File Info --}}
    <script>
        function displayFileName(input) {
            const fileInfo = document.getElementById('file-info');
            const fileName = document.getElementById('file-name');
            const fileSize = document.getElementById('file-size');
            const uploadIcon = document.getElementById('upload-icon');
            const fileSizeInfo = document.getElementById('file-size-info');

            if (input.files && input.files[0]) {
                const file = input.files[0];
                const fileSizeKB = (file.size / 1024).toFixed(2);
                const fileSizeMB = (file.size / (1024 * 1024)).toFixed(2);

                // Validasi ukuran file
                if (file.size > 5120 * 1024) { // 5MB
                    alert('Ukuran file melebihi 5MB! Silakan pilih file yang lebih kecil.');
                    input.value = '';
                    return;
                }

                // Validasi ekstensi file
                const extension = file.name.split('.').pop().toLowerCase();
                if (extension !== 'rar' && extension !== 'zip') {
                    alert('File harus berformat .RAR atau .ZIP');
                    input.value = '';
                    return;
                }

                // Tampilkan info file
                fileName.textContent = file.name;
                fileSize.textContent = fileSizeMB < 1 ?
                    `${fileSizeKB} KB` :
                    `${fileSizeMB} MB`;

                fileInfo.classList.remove('hidden');
                uploadIcon.classList.add('hidden');
                fileSizeInfo.classList.add('hidden');
            }
        }

        function removeFile() {
            const input = document.getElementById('berkas');
            const fileInfo = document.getElementById('file-info');
            const uploadIcon = document.getElementById('upload-icon');
            const fileSizeInfo = document.getElementById('file-size-info');

            input.value = '';
            fileInfo.classList.add('hidden');
            uploadIcon.classList.remove('hidden');
            fileSizeInfo.classList.remove('hidden');
        }
    </script>
@endsection
