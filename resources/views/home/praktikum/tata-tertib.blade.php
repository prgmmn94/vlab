@extends('components.home.layout')

@section('title', 'Tata Tertib Praktikum')

@section('content')

{{-- ================= TATA TERTIB ================= --}}
<div class="bg-gradient-to-b from-[#62286C] to-[#BF4ED2] min-h-screen font-sans text-gray-800 py-8 lg:py-16">
    <div class="container py-6 md:py-0">

        {{-- HEADER --}}
        <div class="text-center text-white mb-8 md:mb-10">
            <h1 class="text-2xl md:text-3xl font-bold uppercase tracking-widest">Tata Tertib</h1>
            <h2 class="text-lg md:text-2xl font-semibold uppercase mt-2 md:mt-0">Laboratorium Manajemen Menengah</h2>
        </div>

        <div class="mb-8">
            <h3 class="text-white text-lg md:text-xl font-bold mb-6 uppercase text-center">Tata Tertib Praktikum</h3>

            {{-- BATAS KEHADIRAN --}}
            <div class="bg-white rounded-xl p-5 md:p-6 shadow-lg mb-6">
                <h4 class="font-bold text-base md:text-lg mb-3">BATAS KEHADIRAN</h4>

                <p class="text-[13px] md:text-sm mb-3 text-justify">
                    Batas kehadiran praktikum adalah 2x tidak masuk. Jika sudah 2x tidak hadir di saat praktikum, diberikan toleransi sebagai berikut:
                </p>

                <ol class="list-decimal ml-4 md:ml-5 text-[13px] md:text-sm space-y-1">
                    <li>Jika ada keluarga atau orang tua yang meninggal dunia.</li>
                    <li>Jika praktikan sakit: membawa surat keterangan sakit dari dokter tempat berobat (surat dapat diserahkan pada pertemuan selanjutnya).</li>
                </ol>

                <p class="text-[13px] md:text-sm mt-4 mb-2 font-medium">
                    Jika ada acara keluarga yang mendesak:
                </p>

                <ol class="list-decimal ml-4 md:ml-5 text-[13px] md:text-sm space-y-1">
                    <li>Membawa surat izin dari orang tua dan wajib disertakan tanda tangan dan fotokopi KTP orang tua/wali.</li>
                    <li>Jika ada acara resmi dari organisasi: membawa surat izin dari organisasi yang bersangkutan.</li>
                </ol>
            </div>

            {{-- PRAKTIKUM --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                {{-- OFFLINE --}}
                <div class="bg-white rounded-xl p-5 md:p-6 shadow-lg">
                    <h4 class="font-bold text-center text-base md:text-lg mb-4 uppercase">Praktikum Offline</h4>

                    <ul class="list-decimal ml-4 md:ml-5 text-[13px] md:text-sm space-y-2">
                        <li>Hadir ke ruangan praktikum Lab Manajemen Menengah dengan tepat waktu, maksimal keterlambatan 10 menit.</li>
                        <li>Wajib mengenakan pakaian sesuai dengan ketentuan yang berlaku.</li>
                        <li>Wajib membawa kartu praktikum yang sudah ditempel foto 2x3 dan dicap di setiap pertemuan praktikum.</li>
                        <li>Mengerjakan tugas sesuai dengan waktu yang diinstruksikan oleh asisten.</li>
                    </ul>
                </div>

                {{-- ONLINE --}}
                <div class="bg-white rounded-xl p-5 md:p-6 shadow-lg">
                    <h4 class="font-bold text-center text-base md:text-lg mb-4 uppercase">Praktikum Online</h4>

                    <ul class="list-decimal ml-4 md:ml-5 text-[13px] md:text-sm space-y-2">
                        <li>Wajib join google meet dengan penamaan akun google: Kelas_Nama, maksimal keterlambatan 10 menit.</li>
                        <li>Wajib menggunakan pakaian sesuai dengan aturan.</li>
                        <li>Mengerjakan tugas sesuai dengan waktu yang diinstruksikan oleh asisten.</li>
                    </ul>
                </div>

            </div>

            {{-- PERLENGKAPAN --}}
            <div class="bg-white rounded-xl p-5 md:p-6 shadow-lg mb-6">
                <h4 class="font-bold text-center text-base md:text-lg mb-4 uppercase">Perlengkapan yang Dibawa</h4>

                <ul class="list-decimal ml-4 md:ml-5 text-[13px] md:text-sm space-y-1">
                    <li>Modul Praktikum (wajib di print dan dijilid bagian depan bening dan bagian belakang putih)</li>
                    <li>Buku Tulis (disampul putih dan diberi logo Lab Manajemen Menengah)</li>
                    <li>Map Bening Letter L</li>
                    <li>Alat Tulis</li>
                    <li>Kalkulator</li>
                    <li>Pas Foto 2x3</li>
                </ul>
            </div>
        </div>

        {{-- MAHASISWA PENGULANGAN --}}
        <div class="bg-white rounded-xl p-5 md:p-6 shadow-lg mb-8 hover:shadow-xl transition duration-300">
            <h4 class="font-bold text-base md:text-lg mb-3">Mahasiswa Pengulangan</h4>

            <p class="text-[13px] md:text-sm mb-3 text-justify">
                Berikut Informasi terkait Mahasiswa Pengulangan:
            </p>

            <ol class="list-decimal ml-4 md:ml-5 text-[13px] md:text-sm space-y-3">
                <li>
                    Pengulangan praktikum hanya dapat dilakukan pada semester yang sama dengan semester pelaksanaan praktikum. Misalnya:
                    <ul class="list-disc ml-4 mt-2 space-y-1">
                        <li>Praktikum pada semester ganjil (PTA) hanya dapat diulang pada semester ganjil (PTA).</li>
                        <li>Praktikum pada semester genap (ATA) hanya dapat diulang pada semester genap (ATA).</li>
                    </ul>
                </li>

                <li>
                    Mahasiswa yang akan melakukan pengulangan praktikum wajib melakukan konfirmasi terlebih dahulu kepada ILAB dengan menghubungi helpdesk ILAB melalui WhatsApp di nomor 
                    <a href="https://wa.me/6281387243991" target="_blank"
                       class="font-semibold text-green-600 hover:text-green-700 underline">
                       0813-8724-3991
                    </a>.
                </li>

                <li>
                    Setelah konfirmasi dilakukan dan data pengulangan terverifikasi, pihak ILAB akan menginformasikan kepada laboratorium terkait.
                </li>

                <li>
                    Selanjutnya, mahasiswa wajib menghubungi atau melapor kepada laboratorium yang bersangkutan untuk proses pengulangan praktikum.
                </li>
            </ol>
        </div>

        {{-- ATURAN BERPAKAIAN --}}
        <div class="text-white">
            <h3 class="text-lg md:text-xl font-bold mb-8 uppercase text-center">Aturan Berpakaian</h3>

            <div class="flex flex-col md:flex-row gap-8">

                {{-- LAKI --}}
                <div class="flex-1">
                    <h4 class="font-bold mb-4 text-center">Laki-laki</h4>

                    <div class="flex justify-center">
                        <img src="{{ asset('images/aturan2.png') }}" alt="Aturan Pria" class="h-64 md:h-90 object-contain">
                    </div>

                    <div class="mt-6 text-[13px] md:text-sm space-y-2 pl-6 md:pl-10">
                        <p><strong>DILARANG:</strong></p>
                        <ul class="list-disc ml-4">
                            <li>Memakai kemeja bergambar, flannel, atau denim, serta celana denim dan chino.</li>
                            <li>Gelang tidak diperbolehkan kecuali jam tangan dan cincin nikah.</li>
                            <li class="hidden md:list-item list-none"><br><br></li>
                        </ul>
                    </div>
                </div>

                {{-- PEREMPUAN --}}
                <div class="flex-1">
                    <h4 class="font-bold mb-4 text-center">Perempuan</h4>

                    <div class="flex justify-center">
                        <img src="{{ asset('images/aturan1.png') }}" alt="Aturan Wanita" class="h-64 md:h-90 object-contain">
                    </div>

                    <div class="mt-6 text-[13px] md:text-sm space-y-2 pl-6 md:pl-10">
                        <p><strong>DILARANG:</strong></p>
                        <ul class="list-disc ml-4">
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