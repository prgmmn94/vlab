@extends('layouts.app')

@section('title', 'Profil Lab')

@section('content')

{{-- ================= HERO FOTO ================= --}}
<section class="relative w-full h-[250px] md:h-[520px] overflow-hidden">
    <img src="/images/heroprofil.jpg"
         class="absolute inset-0 w-full h-full object-cover"
         alt="Tim Lab Mamen">
    {{-- overlay gelap --}}
    <div class="absolute inset-0 bg-black/45"></div>
</section>

{{-- ================= APA ITU LAB ================= --}}
<section class="bg-white relative">
    <div class="max-w-7xl mx-auto px-6 py-12 md:py-20 grid md:grid-cols-2 gap-6 md:gap-16 items-center text-center md:text-left">
        <div>
            <h2 class="text-2xl md:text-4xl font-extrabold text-gray-900 leading-tight">
                Apa itu — <br class="hidden md:block">
                <span class="text-[#581D74]">
                    Laboratorium<br class="hidden md:block">Manajemen Menengah?
                </span>
            </h2>
        </div>
        <p class="text-gray-600 leading-relaxed text-sm md:text-base mx-auto md:mx-0 max-w-md md:max-w-none">
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
<section class="text-white py-16 md:py-32" style="background:linear-gradient(to bottom,#62286C,#BF4ED2)">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-center text-3xl md:text-4xl font-extrabold mb-10 md:mb-16 tracking-wide drop-shadow-md">
            VISI & MISI
        </h2>
        <div class="grid md:grid-cols-2 gap-8 md:gap-12">
            {{-- VISI --}}
            <div class="bg-white text-gray-800 rounded-2xl p-6 md:p-10 shadow-2xl relative transform transition hover:-translate-y-1">
                <h3 class="font-bold text-lg md:text-xl mb-4 border-l-4 border-[#581D74] pl-4 text-[#581D74]">
                    Visi Kami
                </h3>
                <p class="text-sm md:text-base leading-relaxed text-justify md:text-left">
                    Unit penyelenggara... tahun 2017 menjadi laboratorium pengembangan praktikum
                    yang berpusat interaksi, memiliki jejaring global, dan memberikan kontribusi
                    signifikan bagi peningkatan daya saing bangsa khususnya bidang Manajemen
                    Pemasaran, Keuangan dan Perbankan berbasis TI.
                </p>
            </div>

            {{-- MISI --}}
            <div class="bg-white text-gray-800 rounded-2xl p-6 md:p-10 shadow-2xl relative transform transition hover:-translate-y-1">
                <h3 class="font-bold text-lg md:text-xl mb-4 border-l-4 border-[#581D74] pl-4 text-[#581D74]">
                    Misi Kami
                </h3>
                <p class="text-sm md:text-base leading-relaxed text-justify md:text-left">
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

{{-- ================= STRUKTUR ORGANISASI ================= --}}
<section class="relative bg-white pt-24 pb-16 md:pt-40 md:pb-40 overflow-hidden">
    {{-- WAVE ATAS --}}
    <div class="absolute top-0 left-0 w-full -mt-1">
        <svg viewBox="0 0 1440 120" class="w-full h-[60px] md:h-[120px]" preserveAspectRatio="none">
            <path fill="#BF4ED2" d="M0,40 C240,120 480,0 720,50 C960,100 1200,120 1440,60 L1440,0 L0,0 Z"/>
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative">
        <div class="grid md:grid-cols-2 gap-12 md:gap-16 items-center">
            
            {{-- KIRI: JUDUL + DESKRIPSI --}}
            <div class="order-2 md:order-1">
                <div class="flex items-start gap-4 mb-6">
                    <div class="w-1.5 h-16 bg-purple-600 rounded mt-1"></div>
                    <h2 class="text-2xl md:text-4xl font-extrabold leading-tight text-gray-900">
                        Struktur Organisasi <br>
                        <span class="text-purple-700">Laboratorium</span>
                    </h2>
                </div>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed max-w-lg">
                    Laboratorium Manajemen Menengah melakukan penyusunan dan
                    pengembangan program aplikasi komputer dengan sistem berbasis
                    jaringan internet. Layanan praktikum meliputi pelatihan aplikasi
                    manajemen bisnis seperti Manajemen Pemasaran, Manajemen
                    Keuangan, Manajemen Operasional, Sistem Informasi Manajemen,
                    Internet dan Jaringan.
                </p>
            </div>

            {{-- KANAN: GAMBAR STRUKTUR --}}
            <div class="flex justify-center order-1 md:order-2">
                <img src="/images/struktur.png"
                     alt="Struktur Organisasi"
                     class="w-full max-w-[400px] md:max-w-xl object-contain drop-shadow-xl">
            </div>
        </div>
    </div>
</section>

{{-- ================= STAFF LAB ================= --}}
<section class="bg-white pb-20 md:pb-32">
    <div class="max-w-7xl mx-auto px-6">
        
        {{-- HEADER STAFF --}}
        <div class="grid md:grid-cols-2 gap-6 md:gap-10 items-center mb-10 md:mb-12">
            <div class="flex items-center gap-4 justify-center md:justify-start">
                <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900">
                    STAFF — <span class="text-purple-700">LAB MAMEN</span>
                </h2>
                <div class="hidden md:flex flex-1 h-px bg-gray-300"></div>
            </div>
            <p class="text-sm text-gray-600 text-center md:text-left mx-auto md:mx-0 max-w-sm md:max-w-none">
                Staff Laboratorium Manajemen Menengah bertanggung jawab dalam
                mendukung pelaksanaan praktikum serta membantu kelancaran proses
                pembelajaran mahasiswa.
            </p>
        </div>

       <div class="relative max-w-7xl mx-auto">

    {{-- BUTTON LEFT --}}
    <button onclick="scrollStaff(-1)"
        class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 z-20
               w-10 h-10 bg-white rounded-full shadow-xl
               items-center justify-center
               hover:scale-110 transition">
        <svg class="w-5 h-5 text-purple-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M15 18l-6-6 6-6"/>
        </svg>
    </button>

    {{-- SLIDER --}}
    <div id="staffSlider"
        class="flex gap-4 md:gap-8 overflow-x-auto snap-x snap-mandatory
               scroll-smooth pb-6 hide-scrollbar px-6 md:px-0">

        @php
            $staffs = [
                ['img'=>'pak yunan.png','name'=>'Dr. Muh. Yanto, SE., MM.','role'=>'Kepala Lab. Manajemen Menengah'],
                ['img'=>'pak hadir1.png','name'=>'Hadir Hidayanto, SE., MMA.','role'=>'Wakil Kepala Lab. Manajemen Menengah'],
                ['img'=>'pak darmadi.png','name'=>'Darmadi, SE., MM.','role'=>'Staff Lab. Manajemen Menengah'],
                ['img'=>'pak suwardi.png','name'=>'Suwardi, SE','role'=>'Staff Lab. Manajemen Menengah'],
                ['img'=>'staff5.png','name'=>'Aditya Rian Ramadhan, SE','role'=>'Staff Lab. Manajemen Menengah'],
                ['img'=>'staff6.png','name'=>'Ridwan Z Agha','role'=>'Staff Lab. Manajemen Menengah'],
            ];
        @endphp

        @foreach ($staffs as $s)
        <div
            class="snap-center bg-white border border-gray-100 rounded-2xl shadow-lg
                   overflow-hidden text-center
                   min-w-[220px] md:min-w-[260px]
                   max-w-[220px] md:max-w-[260px]
                   flex-shrink-0 transition hover:-translate-y-2"
        >
            <img src="/images/staff/{{ $s['img'] }}"
                 class="w-full h-48 md:h-56 object-cover object-top bg-gray-50"
                 alt="{{ $s['name'] }}">

            <div class="p-4 md:p-5">
                <h4 class="font-bold text-sm md:text-base text-gray-900 mb-1">
                    {{ $s['name'] }}
                </h4>
                <p class="text-xs md:text-sm text-purple-600 font-medium">
                    {{ $s['role'] }}
                </p>
            </div>
        </div>
        @endforeach

    </div>

    {{-- BUTTON RIGHT --}}
    <button onclick="scrollStaff(1)"
        class="absolute right-2 md:-right-4 top-1/2 -translate-y-1/2 z-20
               w-10 h-10 bg-white rounded-full shadow-xl
               flex items-center justify-center
               hover:scale-110 transition">
        <svg class="w-5 h-5 text-purple-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M9 6l6 6-6 6"/>
        </svg>
    </button>

</div>
    </div>
</section>

@endsection