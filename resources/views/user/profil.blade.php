@extends('layouts.app')

@section('title', 'Profil Lab')

@section('content')

{{-- ================= HERO FOTO ================= --}}
<section class="relative w-full h-[220px] md:h-[520px] overflow-hidden">

    <img src="/images/heroprofil.jpg"
         class="absolute inset-0 w-full h-full object-cover"
         alt="Tim Lab">

    {{-- overlay gelap --}}
    <div class="absolute inset-0 bg-black/45"></div>

</section>




{{-- ================= APA ITU LAB ================= --}}
<section class="bg-white relative">
    <div class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-2 gap-16 items-start">

        <div>
            <h2 class="text-3xl font-extrabold text-gray-900 leading-tight">
                Apa itu — <br>
                <span class="text-[#581D74]">
                    Laboratorium<br>Manajemen Menengah?
                </span>
            </h2>
        </div>

        <p class="text-gray-600 leading-relaxed text-sm">
            Laboratorium Manajemen Menengah (Lab Mamen) adalah unit kerja Universitas Gunadarma
            yang menyelenggarakan praktikum penunjang bidang manajemen dan sistem informasi
            untuk mahasiswa. Lab Mamen berfokus pada praktik berbasis teknologi informasi untuk
            mahasiswa, guna mendukung pemecahan masalah dan pengambilan keputusan manajerial.
        </p>

    </div>
</section>


{{-- ================= WAVE ================= --}}
<x-wave />


{{-- ================= VISI MISI ================= --}}
<section class="text-white py-40" style="background:linear-gradient(to bottom,#62286C,#BF4ED2)">

    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-center text-3xl font-extrabold mb-12 tracking-wide">
            VISI & MISI
        </h2>

        <div class="grid md:grid-cols-2 gap-8">

            {{-- VISI --}}
            <div class="bg-white text-gray-800 rounded-xl p-8 shadow-xl relative">
                <h3 class="font-bold text-lg mb-4 border-l-4 border-[#581D74] pl-3">
                    Visi Kami
                </h3>

                <p class="text-sm leading-relaxed">
                    Unit penyelenggara... tahun 2017 menjadi laboratorium pengembangan praktikum
                    yang berpusat interaksi, memiliki jejaring global, dan memberikan kontribusi
                    signifikan bagi peningkatan daya saing bangsa khususnya bidang Manajemen
                    Pemasaran, Keuangan dan Perbankan berbasis TI.
                </p>
            </div>

            {{-- MISI --}}
            <div class="bg-white text-gray-800 rounded-xl p-8 shadow-xl relative">
                <h3 class="font-bold text-lg mb-4 border-l-4 border-[#581D74] pl-3">
                    Misi Kami
                </h3>

                <p class="text-sm leading-relaxed">
                    Melaksanakan praktikum untuk menghasilkan sarjana Manajemen dan Akuntansi
                    yang profesional dan mampu mengikuti perkembangan ilmu pengetahuan dan
                    teknologi serta mampu bersaing di lingkup global. Melaksanakan kegiatan
                    pengembangan dalam bidang Manajemen sehingga dapat memberikan kontribusi
                    kepada kemajuan ilmu pengetahuan.
                </p>
            </div>

        </div>

    </div>
</section>

<section class="relative bg-white py-40 overflow-hidden">

    {{-- WAVE ATAS --}}
    <div class="absolute top-0 left-0 w-full -mt-1">
        <svg viewBox="0 0 1440 120" class="w-full h-[120px]" preserveAspectRatio="none">
            <path fill="#BF4ED2"
                  d="M0,40 C240,120 480,0 720,50 C960,100 1200,120 1440,60 L1440,0 L0,0 Z"/>
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative">

        <div class="grid md:grid-cols-2 gap-16  py-20">

            {{-- KIRI: JUDUL + DESKRIPSI --}}
            <div>
                <div class="flex items-start gap-4 pt-20 mb-6">
                    <div class="w-1.5 h-16 bg-purple-600 rounded"></div>

                    <h2 class="text-3xl font-extrabold leading-tight">
                        Struktur Organisasi <br>
                        <span class="text-purple-700">Laboratorium</span>
                    </h2>
                </div>

                <p class="text-gray-600 text-sm leading-relaxed max-w-md">
                    Laboratorium Manajemen Menengah melakukan penyusunan dan
                    pengembangan program aplikasi komputer dengan sistem berbasis
                    jaringan internet. Layanan praktikum meliputi pelatihan aplikasi
                    manajemen bisnis seperti Manajemen Pemasaran, Manajemen
                    Keuangan, Manajemen Operasional, Sistem Informasi Manajemen,
                    Internet dan Jaringan.
                </p>
            </div>

            {{-- KANAN: GAMBAR STRUKTUR --}}
            <div class="flex justify-center md:justify-end items-center">
                <img
                    src="/images/struktur.png"
                    alt="Struktur Organisasi"
                    class="w-full max-w-xl object-contain drop-shadow-xl"
                >
            </div>

        </div>
    </div>
</section>

<section class="bg-white pb-28">

    <div class="max-w-7xl mx-auto px-6">

        {{-- HEADER --}}
        <div class="grid md:grid-cols-2 gap-10 items-center mb-12">

            <div>
                <div class="flex items-center gap-4">
                    <h2 class="text-3xl font-extrabold">
                        STAFF — <span class="text-purple-700">LAB MAMEN</span>
                    </h2>
                    <div class="flex-1 h-px bg-gray-300"></div>
                </div>
            </div>

            <p class="text-sm text-gray-600">
                Staff Laboratorium Manajemen Menengah bertanggung jawab dalam
                mendukung pelaksanaan praktikum serta membantu kelancaran proses
                pembelajaran mahasiswa.
            </p>
        </div>

        {{-- CARD STAFF --}}
        <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-8">

            @foreach ([
                ['img'=>'staff1.jpg','name'=>'Dr. Muh. Yanto, SE., MM.','role'=>'Kepala Lab. Manajemen Menengah'],
                ['img'=>'staff2.jpg','name'=>'Hadi Hidayanto, SE., MMA.','role'=>'Wakil Kepala Lab. Manajemen Menengah'],
                ['img'=>'staff3.jpg','name'=>'Darmadi, SE., MM.','role'=>'Staff Lab. Manajemen Menengah'],
                ['img'=>'staff4.jpg','name'=>'Dr. Ahmad, SE., MM.','role'=>'Staff Lab. Manajemen Menengah'],
            ] as $s)

            <div class="bg-white rounded-xl shadow-md overflow-hidden text-center">
                <img src="/images/staff/{{ $s['img'] }}"
                     class="w-full h-48 object-cover"
                     alt="Staff">

                <div class="p-4">
                    <h4 class="font-semibold text-sm text-gray-900">
                        {{ $s['name'] }}
                    </h4>
                    <p class="text-xs text-gray-500 mt-1">
                        {{ $s['role'] }}
                    </p>
                </div>
            </div>

            @endforeach

        </div>

    </div>
</section>

@endsection
