@extends('layouts.app')

@section('content')

<section class="bg-gradient-to-br from-purple-50 to-white py-20">
    <div class="max-w-4xl mx-auto px-6">

        {{-- HEADER --}}
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-gray-900">
                Pendaftaran Calon Asisten & Programmer
            </h1>
            <p class="text-gray-600 mt-3">
                Lengkapi data berikut untuk mengikuti proses seleksi Laboratorium Manajemen Menengah.
            </p>
        </div>

        {{-- CARD FORM --}}
        <div class="bg-white shadow-xl rounded-2xl p-8 md:p-10 border border-gray-100 space-y-10">

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('oprec.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                @csrf

                {{-- ================= DATA DIRI ================= --}}
                <div class="bg-gray-50 rounded-xl p-6 border">
                    <h2 class="text-2xl font-extrabold text-[#581D74] mb-6">
    Data Diri
</h2>


                    <div class="grid md:grid-cols-2 gap-6">

                        <div class="space-y-1">
                            <label class="label" for="nama">Nama Lengkap</label>
                            <input id="nama" type="text" name="nama" class="input-form" required>
                        </div>

                        <div class="space-y-1">
                            <label class="label" for="npm">NPM</label>
                            <input id="npm" type="text" name="npm" class="input-form" required>
                        </div>

                        <div class="space-y-1">
                            <label class="label" for="kelas">Kelas</label>
                            <input id="kelas" type="text" name="kelas" class="input-form" required>
                        </div>

                        <div class="space-y-1">
    <label class="label" for="jurusan">Jurusan</label>
    <select id="jurusan" name="jurusan" class="input-form" required>
        <option value="" disabled selected>Pilih Jurusan</option>
        <option value="Akuntansi">Akuntansi</option>
        <option value="Manajemen">Manajemen</option>
        <option value="Informatika">Informatika</option>
        <option value="Sistem Informasi">Sistem Informasi</option>
    </select>
</div>


                        <div class="space-y-1">
                            <label class="label" for="fakultas">Fakultas</label>
                            <input id="fakultas" type="text" name="fakultas" class="input-form" required>
                        </div>

                        <div class="space-y-1">
                            <label class="label" for="semester">Semester Saat Ini</label>
                            <select id="semester" name="semester" class="input-form" required>
                                <option value="" disabled selected>Pilih Semester</option>
                                <option>2</option><option>3</option><option>4</option>
                                <option>5</option><option>6</option><option>7</option>
                            </select>
                        </div>

                        <div class="space-y-1">
                            <label class="label" for="ipk">IPK Terakhir</label>
                            <input id="ipk" type="number" step="0.01" name="ipk" class="input-form" required>
                        </div>

                        <div class="space-y-1">
                            <label class="label" for="nohp">No. HP Aktif</label>
                            <input id="nohp" type="text" name="nohp" class="input-form" required>
                        </div>

                        <div class="space-y-1">
                            <label class="label" for="email">Email Aktif</label>
                            <input id="email" type="email" name="email" class="input-form" required>
                        </div>

                        <div class="space-y-1">
                            <label class="label" for="sosmed">URL Sosial Media</label>
                            <input id="sosmed" type="url" name="sosmed" class="input-form" placeholder="Instagram/LinkedIn/TikTok" required>
                        </div>

                        <div class="space-y-1">
                            <label class="label" for="region">Region</label>
                            <select id="region" name="region" class="input-form" required>
                                <option value="" disabled selected>Pilih Region</option>
                                <option>Depok</option>
                                <option>Kalimalang</option>
                                <option>Salemba</option>
                            </select>
                        </div>

                        <div class="space-y-1">
                            <label class="label" for="posisi">Posisi Dilamar</label>
                            <select id="posisi" name="posisi" class="input-form" required>
                                <option value="" disabled selected>Pilih Posisi</option>
                                <option>Asisten</option>
                                <option>Programmer</option>
                            </select>
                        </div>

                    </div>

                    <div class="mt-5 space-y-1">
                        <label class="label" for="alamat">Alamat Domisili</label>
                        <textarea id="alamat" name="alamat" rows="3" class="input-form" required></textarea>
                    </div>

                    <div class="mt-5 space-y-1">
                        <label class="label" for="motivasi">Motivasi Mendaftar</label>
                        <textarea id="motivasi" name="motivasi" rows="4" class="input-form" required></textarea>
                    </div>

                    <div class="text-xs text-gray-500 mt-4 space-y-1">
                        <p>* Pilih posisi lamaran sesuai jurusan masing-masing</p>
                        <p>* Cantumkan salah satu URL sosial media (Instagram/LinkedIn/TikTok)</p>
                        <p>* Pastikan akun sosial media tidak di private</p>
                    </div>
                </div>

                {{-- ================= UPLOAD BERKAS ================= --}}
                <div class="bg-gray-50 rounded-xl p-6 border">
                    <h2 class="text-2xl font-extrabold text-[#581D74] mb-6">Upload Berkas</h2>


                    <div class="border-2 border-dashed border-purple-300 rounded-xl p-6 text-center bg-white">
                        <input type="file" name="berkas" class="w-full text-sm" accept=".rar,.zip" required>
                        <p class="text-xs text-gray-500 mt-3">
                            Format .RAR / .ZIP • Maksimal 5MB
                        </p>
                    </div>

                    <div class="text-xs text-gray-500 mt-4 space-y-1">
                        <p>.RAR / .ZIP (berisi CV, Surat Lamaran, Motivation Letter, PAS Foto 4x6, KRS, Transkrip Nilai)</p>
                        <p>* Upload hanya file .RAR / .ZIP</p>
                        <p>* Transkrip nilai = semester terakhir</p>
                        <p>* Ukuran maksimal 5120KB (5MB)</p>
                    </div>
                </div>

                {{-- ================= SUBMIT ================= --}}
                <div class="text-center">
                    <button type="submit"
                        class="bg-gradient-to-r from-[#62286C] to-[#BF4ED2] text-white px-12 py-3 rounded-xl font-semibold shadow-md hover:shadow-xl hover:scale-105 transition">
                        Kirim Pendaftaran
                    </button>
                </div>

            </form>
        </div>
    </div>
</section>


@endsection
