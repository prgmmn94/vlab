<x-admin.layout>
    <div class="space-y-6">

        <div class="bg-yellow-600 text-white shadow-md rounded-lg">
            <div class="p-6 text-lg font-semibold">
                {{ __('Edit Data Rekrutmen') }}
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6">
            <form action="{{ route('admin.recruitments.update', [$recruitmentPeriod->id, $recruitment->id]) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Info Periode --}}
                <div class="mb-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                    <p class="text-sm font-medium text-blue-900">Periode Rekrutmen: <span
                            class="font-bold">{{ $recruitmentPeriod->tahun }}</span></p>
                </div>

                {{-- Data Pribadi --}}
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Data Pribadi</h3>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        {{-- ID Calas (Read Only) --}}
                        <div class="sm:col-span-2">
                            <label for="id_calas" class="block text-sm font-medium text-gray-900">ID Calas</label>
                            <div class="mt-2">
                                <input type="text" value="{{ $recruitment->id_calas }}" disabled
                                    class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-500 outline-1 -outline-offset-1 outline-gray-300 cursor-not-allowed sm:text-sm" />
                            </div>
                        </div>

                        {{-- Nama --}}
                        <div class="sm:col-span-2">
                            <label for="nama" class="block text-sm font-medium text-gray-900">Nama Lengkap <span
                                    class="text-red-500">*</span></label>
                            <div class="mt-2">
                                <input type="text" name="nama" value="{{ old('nama', $recruitment->nama) }}"
                                    required
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm" />
                            </div>
                            @error('nama')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- NPM --}}
                        <div class="sm:col-span-2">
                            <label for="npm" class="block text-sm font-medium text-gray-900">NPM <span
                                    class="text-red-500">*</span></label>
                            <div class="mt-2">
                                <input type="text" name="npm" value="{{ old('npm', $recruitment->npm) }}"
                                    required
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm" />
                            </div>
                            @error('npm')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="sm:col-span-2">
                            <label for="email" class="block text-sm font-medium text-gray-900">Email <span
                                    class="text-red-500">*</span></label>
                            <div class="mt-2">
                                <input type="email" name="email" value="{{ old('email', $recruitment->email) }}"
                                    required
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm" />
                            </div>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- No HP --}}
                        <div class="sm:col-span-2">
                            <label for="no_hp" class="block text-sm font-medium text-gray-900">Nomor HP <span
                                    class="text-red-500">*</span></label>
                            <div class="mt-2">
                                <input type="text" name="no_hp" value="{{ old('no_hp', $recruitment->no_hp) }}"
                                    required
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm" />
                            </div>
                            @error('no_hp')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Jurusan --}}
                        <div class="sm:col-span-2">
                            <label for="jurusan" class="block text-sm font-medium text-gray-900">Program Studi <span
                                    class="text-red-500">*</span></label>
                            <div class="mt-2">
                                <select name="jurusan" disabled
                                    class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-500 outline-1 -outline-offset-1 outline-gray-300 cursor-not-allowed sm:text-sm">
                                    <option value="">-- Pilih Program Studi --</option>
                                    <option value="Manajemen"
                                        {{ old('jurusan', $recruitment->jurusan) == 'Manajemen' ? 'selected' : '' }}>
                                        Manajemen</option>
                                    <option value="Akuntansi"
                                        {{ old('jurusan', $recruitment->jurusan) == 'Akuntansi' ? 'selected' : '' }}>
                                        Akuntansi</option>
                                    <option value="Informatika"
                                        {{ old('jurusan', $recruitment->jurusan) == 'Informatika' ? 'selected' : '' }}>
                                        Informatika</option>
                                    <option value="Sistem Informasi"
                                        {{ old('jurusan', $recruitment->jurusan) == 'Sistem Informasi' ? 'selected' : '' }}>
                                        Sistem Informasi</option>
                                </select>
                            </div>
                            @error('jurusan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Kelas --}}
                        <div class="sm:col-span-2">
                            <label for="kelas" class="block text-sm font-medium text-gray-900">Kelas</label>
                            <div class="mt-2">
                                <input type="text" name="kelas" value="{{ old('kelas', $recruitment->kelas) }}"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm" />
                            </div>
                        </div>

                        {{-- Region --}}
                        <div class="sm:col-span-2">
                            <label for="region" class="block text-sm font-medium text-gray-900">Region <span
                                    class="text-red-500">*</span></label>
                            <div class="mt-2">
                                <select name="region" required
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                                    <option value="">-- Pilih Region --</option>
                                    <option value="Depok"
                                        {{ old('region', $recruitment->region) == 'Depok' ? 'selected' : '' }}>Depok
                                    </option>
                                    <option value="Kalimalang"
                                        {{ old('region', $recruitment->region) == 'Kalimalang' ? 'selected' : '' }}>
                                        Kalimalang</option>
                                    <option value="Salemba"
                                        {{ old('region', $recruitment->region) == 'Salemba' ? 'selected' : '' }}>
                                        Salemba</option>
                                    <option value="Karawaci"
                                        {{ old('region', $recruitment->region) == 'Karawaci' ? 'selected' : '' }}>
                                        Karawaci</option>
                                    <option value="Cengkareng"
                                        {{ old('region', $recruitment->region) == 'Cengkareng' ? 'selected' : '' }}>
                                        Cengkareng</option>
                                </select>
                            </div>
                            @error('region')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Posisi Dilamar --}}
                        <div class="sm:col-span-2">
                            <label for="posisi_dilamar" class="block text-sm font-medium text-gray-900">Posisi yang
                                Dilamar <span class="text-red-500">*</span></label>
                            <div class="mt-2">
                                <select name="posisi_dilamar" disabled
                                    class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-500 outline-1 -outline-offset-1 outline-gray-300 cursor-not-allowed sm:text-sm">
                                    <option value="">-- Pilih Posisi --</option>
                                    <option value="programmer"
                                        {{ old('posisi_dilamar', $recruitment->posisi_dilamar) == 'Programmer' ? 'selected' : '' }}>
                                        Programmer</option>
                                    <option value="asisten"
                                        {{ old('posisi_dilamar', $recruitment->posisi_dilamar) == 'Asisten' ? 'selected' : '' }}>
                                        Asisten</option>
                                </select>
                            </div>
                            @error('posisi_dilamar')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Alamat --}}
                        <div class="sm:col-span-full">
                            <label for="alamat" class="block text-sm font-medium text-gray-900">Alamat <span
                                    class="text-red-500">*</span></label>
                            <div class="mt-2">
                                <textarea name="alamat" rows="3" required
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:outline-indigo-600 sm:text-sm">{{ old('alamat', $recruitment->alamat) }}</textarea>
                            </div>
                            @error('alamat')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tempat Lahir --}}
                        {{-- <div class="sm:col-span-2">
                            <label for="tempat_lahir" class="block text-sm font-medium text-gray-900">Tempat
                                Lahir</label>
                            <div class="mt-2">
                                <input type="text" name="tempat_lahir"
                                    value="{{ old('tempat_lahir', $recruitment->tempat_lahir) }}"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm" />
                            </div>
                        </div> --}}

                        {{-- Tanggal Lahir --}}
                        {{-- <div class="sm:col-span-2">
                            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-900">Tanggal
                                Lahir</label>
                            <div class="mt-2">
                                <input type="date" name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir', $recruitment->tanggal_lahir?->format('Y-m-d')) }}"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm" />
                            </div>
                        </div> --}}

                        {{-- Agama --}}
                        <div class="sm:col-span-2">
                            <label for="agama" class="block text-sm font-medium text-gray-900">Agama</label>
                            <div class="mt-2">
                                <select name="agama"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                                    <option value="">-- Pilih Agama --</option>
                                    <option value="Islam"
                                        {{ old('agama', $recruitment->agama) == 'Islam' ? 'selected' : '' }}>Islam
                                    </option>
                                    <option value="Kristen"
                                        {{ old('agama', $recruitment->agama) == 'Kristen' ? 'selected' : '' }}>Kristen
                                    </option>
                                    <option value="Katolik"
                                        {{ old('agama', $recruitment->agama) == 'Katolik' ? 'selected' : '' }}>Katolik
                                    </option>
                                    <option value="Hindu"
                                        {{ old('agama', $recruitment->agama) == 'Hindu' ? 'selected' : '' }}>Hindu
                                    </option>
                                    <option value="Konghucu"
                                        {{ old('agama', $recruitment->agama) == 'Konghucu' ? 'selected' : '' }}>
                                        Konghucu</option>
                                    <option value="Buddha"
                                        {{ old('agama', $recruitment->agama) == 'Buddha' ? 'selected' : '' }}>Buddha
                                    </option>
                                </select>
                            </div>
                        </div>

                        {{-- Sosial Media --}}
                        <div class="sm:col-span-2">
                            <label for="sosial_media" class="block text-sm font-medium text-gray-900">Sosial
                                Media</label>
                            <div class="mt-2">
                                <input type="text" name="sosial_media"
                                    value="{{ old('sosial_media', $recruitment->sosial_media) }}"
                                    placeholder="@username atau link profil"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm" />
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="h-px my-8 bg-gray-300 border-0">

                {{-- Berkas --}}
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Berkas</h3>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        {{-- Berkas Saat Ini --}}
                        @if ($recruitment->berkas)
                            <div class="sm:col-span-full">
                                <label class="block text-sm font-medium text-gray-900 mb-2">Berkas Saat Ini</label>
                                <div class="flex items-center gap-3">
                                    <a href="{{ asset('storage/' . $recruitment->berkas) }}" download
                                        class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Download Berkas
                                    </a>
                                    <span class="text-sm text-gray-600">{{ basename($recruitment->berkas) }}</span>
                                </div>
                            </div>
                        @endif

                        {{-- Upload Berkas Baru (Optional) --}}
                        <div class="sm:col-span-full">
                            <label for="berkas" class="block text-sm font-medium text-gray-900">Upload Berkas Baru
                                (Opsional)</label>
                            <div class="mt-2">
                                <input type="file" name="berkas" accept=".rar,.zip"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                                <p class="mt-1 text-xs text-gray-500">Format: RAR atau ZIP. Max: 5MB</p>
                            </div>
                            @error('berkas')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <hr class="h-px my-8 bg-gray-300 border-0">

                {{-- Buttons --}}
                <div class="mt-8 flex items-center justify-between">
                    <a href="{{ route('admin.recruitments.index', $recruitmentPeriod->id) }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 hover:text-gray-900 rounded-md border border-gray-300 hover:bg-gray-50 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                    <div class="flex gap-2">
                        <button type="submit"
                            class="inline-flex rounded-md bg-yellow-600 px-6 py-2 text-sm font-medium text-white shadow-sm hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M5 19h1.425L16.2 9.225L14.775 7.8L5 17.575zm-1 2q-.425 0-.712-.288T3 20v-2.425q0-.4.15-.763t.425-.637L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.437.65T21 6.4q0 .4-.138.763t-.437.662l-12.6 12.6q-.275.275-.638.425t-.762.15zM19 6.4L17.6 5zm-3.525 2.125l-.7-.725L16.2 9.225z" />
                            </svg>
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</x-admin.layout>
