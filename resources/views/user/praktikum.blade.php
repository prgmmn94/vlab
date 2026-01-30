@extends('layouts.app')

@section('content')
<div class="bg-[#71268a] min-h-screen font-sans text-gray-800 p-8">
    <div class="max-w-4xl mx-auto">
        <div class="text-center text-white mb-10">
            <h1 class="text-3xl font-bold uppercase tracking-widest">Tata Tertib</h1>
            <h2 class="text-2xl font-semibold uppercase">Laboratorium Manajemen Menengah</h2>
        </div>

        <div class="mb-8">
            <h3 class="text-white text-xl font-bold mb-4 uppercase">Tata Tertib Praktikum</h3>
            
            <div class="bg-white rounded-xl p-6 shadow-lg mb-6">
                <h4 class="font-bold text-lg mb-2">Batas Kehadiran</h4>
                <p class="text-sm mb-2 text-justify">Batas kehadiran praktikum adalah 2x tidak masuk. Jika sudah 2x tidak hadir di saat praktikum, diberikan toleransi sebagai berikut:</p>
                <ol class="list-decimal ml-5 text-sm space-y-1">
                    <li>Jika ada keluarga atau orang tua yang meninggal dunia.</li>
                    <li>Jika praktikan sakit: membawa surat keterangan sakit dari dokter terdekat, bersifat (surat dapat diserahkan pada pertemuan selanjutnya).</li>
                </ol>
                <p class="text-sm mt-3 italic font-medium">Jika ada acara keluarga yang mendesak:</p>
                <ol class="list-decimal ml-5 text-sm space-y-1">
                    <li>Membawa surat izin dari orang tua dan wajib disertakan tanda tangan dan fotokopi KTP orang tua/wali.</li>
                    <li>Jika ada acara resmi dari organisasi: membawa surat izin dari organisasi yang bersangkutan.</li>
                </ol>
            </div>

            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white rounded-xl p-6 shadow-lg ">
                    <h4 class="font-bold text-center text-lg mb-4 uppercase">Praktikum Offline</h4>
                    <ul class="list-decimal ml-5 text-sm space-y-2">
                        <li>Hadir ke ruangan praktikum Labmanemen dengan tepat waktu, maksimal keterlambatan 10 menit.</li>
                        <li>Wajib mengenakan pakaian sesuai dengan ketentuan yang berlaku.</li>
                        <li>Wajib membawa kartu praktikum yang sudah ditempel foto 2x3 dan dicap di setiap pertemuan praktikum.</li>
                        <li>Mengerjakan tugas sesuai dengan waktu yang diinstruksikan oleh asisten.</li>
                    </ul>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <h4 class="font-bold text-center text-lg mb-4 uppercase">Praktikum Online</h4>
                    <ul class="list-decimal ml-5 text-sm space-y-2">
                        <li>Wajib join google meet dengan penamaan akun google: Kelas_Nama, maksimal keterlambatan 10 menit.</li>
                        <li>Wajib menggunakan pakaian sesuai dengan aturan.</li>
                        <li>Mengerjakan tugas sesuai dengan waktu yang diinstruksikan oleh asisten.</li>
                    </ul>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-lg mb-10">
                <h4 class="font-bold text-center text-lg mb-4 uppercase">Perlengkapan yang Dibawa</h4>
                <ul class="list-decimal ml-5 text-sm space-y-1">
                    <li>Modul Praktikum (wajib di print dan dijilid bagian depan bening dan bagian belakang putih)</li>
                    <li>Buku Tulis (disampul putih dan diberi logo Labmanemen)</li>
                    <li>Map Bening Letter L</li>
                    <li>Alat Tulis</li>
                    <li>Kalkulator</li>
                    <li>Pas Foto 2x3</li>
                </ul>
            </div>
        </div>

        <div class="text-white">
            <h3 class="text-xl font-bold mb-8 uppercase text-left">Aturan Berpakaian</h3>
                <div class="flex-1">
                    <h4 class="font-bold mb-4 text-center">Laki-laki</h4>
                    <div class="relative flex justify-center">
                         <img src="{{ asset('images/pria.png') }}" alt="Aturan Pria" class="h-80 object-contain">
                    </div>
                    <div class="mt-4 text-xs space-y-2">
                        <p><strong>DILARANG:</strong></p>
                        <ul class="list-disc ml-4 opacity-90">
                            <li>Memakai kemeja bergambar, flannel, atau denim, serta celana denim dan chino.</li>
                            <li>Gelang tidak diperbolehkan kecuali jam tangan dan cincin nikah.</li>
                        </ul>
                    </div>
                </div>

                <div class="flex-1">
                    <h4 class="font-bold mb-4 text-center">Perempuan</h4>
                    <div class="relative flex justify-center">
                        <img src="{{ asset('images/wanita.png') }}" alt="Aturan Wanita" class="h-80 object-contain">
                    </div>
                    <div class="mt-4 text-xs space-y-2">
                        <p><strong>DILARANG:</strong></p>
                        <ul class="list-disc ml-4 opacity-90">
                            <li>Memakai kemeja setengah kancing, model balon, V-neck, ketat, tembus pandang, atau berbahan denim serta kerudung bergo gelang.</li>
                            <li>Tidak diperbolehkan kecuali jam tangan dan cincin nikah.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection