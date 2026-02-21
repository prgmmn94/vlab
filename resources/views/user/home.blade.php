@extends('layouts.app')

@section('content')

{{-- ================= --}}
{{-- HERO PUTIH --}}
{{-- ================= --}}
<section class="relative bg-white overflow-hidden">
    
    {{-- ORNAMEN BLUR --}}
    <div class="absolute -top-10 -left-10 md:-top-20 md:-left-20 w-48 h-48 md:w-72 md:h-72 bg-purple-200 rounded-full blur-2xl md:blur-3xl opacity-40"></div>
    <div class="absolute top-20 right-[-20px] md:top-32 md:right-0 w-48 h-48 md:w-72 md:h-72 bg-pink-200 rounded-full blur-2xl md:blur-3xl opacity-30"></div>

    <div class="max-w-6xl mx-auto py-12 md:py-17 px-4 md:px-6 grid md:grid-cols-2 items-center gap-8 md:gap-12 relative z-10">

        {{-- ILUSTRASI (KIRI) --}}
        <div class="flex justify-center md:justify-start order-1 md:order-none">
            <img src="/images/homewelcome.png"
                 class="w-[85%] md:w-full max-w-md drop-shadow-xl"
                 alt="Hero">
        </div>

        {{-- TEXT (KANAN) --}}
        <div class="order-2 md:order-none text-center md:text-left">
            <span class="inline-block px-3 py-1 mb-3 md:mb-5 text-[10px] md:text-[11px] font-semibold tracking-wider text-purple-700 bg-purple-100 rounded-full">
                Portal Virtual Lab
            </span>

            <h1 class="text-2xl md:text-3xl lg:text-4xl font-extrabold leading-snug text-gray-900">
                SELAMAT DATANG DI <br class="hidden md:block">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#62286C] to-[#BF4ED2]">
                    LABORATORIUM MANAJEMEN MENENGAH
                </span>
            </h1>

            <p class="mt-3 md:mt-5 text-gray-600 text-sm md:text-base leading-relaxed max-w-md mx-auto md:mx-0">
                Ruang belajar, berkembang, dan berproses bersama untuk
                menciptakan pengalaman praktikum yang lebih nyata dan bermakna.
            </p>

            <div class="mt-6 md:mt-8 flex flex-wrap items-center justify-center md:justify-start gap-3 md:gap-4">

                <!-- BUTTON UTAMA -->
                <a href="{{ route('praktikum.jadwal') }}"
                   class="inline-flex items-center justify-center gap-2 px-6 py-4 md:px-7 md:py-4 rounded-xl 
                          bg-gradient-to-r from-[#62286C] to-[#BF4ED2] 
                          text-white font-semibold text-xs md:text-sm
                          shadow-md hover:shadow-xl w-full sm:w-auto
                          hover:-translate-y-0.5 transition-all duration-300">
                    Lihat Jadwal
                </a>

                <!-- BUTTON KEDUA -->
                <a href="/download"
                   class="inline-flex items-center justify-center px-6 py-4 md:px-7 md:py-4 rounded-xl 
                          border border-[#62286C]/40 w-full sm:w-auto
                          text-[#62286C] font-semibold text-xs md:text-sm
                          bg-white/60 backdrop-blur-sm
                          hover:bg-[#62286C] hover:text-white
                          hover:border-[#62286C]
                          transition-all duration-300">
                    Lihat Materi
                </a>

            </div>
           
        </div>

    </div>
</section>

{{-- ================= --}}
{{-- WAVE PEMBATAS --}}
{{-- ================= --}}
<x-wave />

{{-- ================= --}}
{{-- SECTION UNGU --}}
{{-- ================= --}}
<section
    class="text-white -mt-1"
    style="background:linear-gradient(to bottom,#62286C,#BF4ED2)"
>

    {{-- APA ITU V-LAB --}}
   <div class="max-w-full mx-auto px-6 md:px-30 pt-16 md:pt-30 pb-20 md:pb-35 grid md:grid-cols-2 lg:grid-cols-2 items-center gap-10 md:gap-0">

        <div class="md:pl-20 text-center md:text-left order-2 md:order-none">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                Apa Itu V-LAB?
            </h2>

            <p class="text-sm md:text-base leading-relaxed opacity-90 mx-auto md:mx-0 max-w-lg md:max-w-none">
                Portal Virtual Lab (V-Lab) merupakan layanan pembelajaran daring
                yang digunakan untuk mendukung proses belajar mengajar oleh
                asisten dan mahasiswa di lingkungan Laboratorium Manajemen
                Menengah Universitas Gunadarma.
            </p>
        </div>

        <img src="/images/apaitu.png"
             class="w-[85%] md:w-full max-w-md mx-auto order-1 md:order-none drop-shadow-xl"
             alt="Ilustrasi">
    </div>

    {{-- MATERI PRAKTIKUM --}}
    <div class="max-w-7xl mx-auto px-6 pb-20 md:pb-40">

        <h2 class="text-2xl md:text-3xl font-bold text-center mb-8 md:mb-12">
            Materi Praktikum
        </h2>

        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-5 gap-4 md:gap-6">

            @foreach ([
                ['shopping-cart','E-Commerce'],
                ['briefcase','Jasa'],
                ['wallet','Manajemen Keuangan'],
                ['megaphone','Marketing Komunikasi'],
                ['bar-chart-3','Riset Operasional']
            ] as [$icon, $label])

            <div
                class="bg-white text-gray-800 rounded-xl p-4 md:p-6 text-center shadow-lg 
                       transition hover:-translate-y-1 flex flex-col items-center justify-center {{ $loop->last ? 'col-span-2 md:col-span-1 mx-auto w-[60%] md:w-full' : '' }}"
            >
                <div
                    class="w-14 h-14 md:w-20 md:h-18 mx-auto mb-3 md:mb-4 flex items-center justify-center
                           rounded-full bg-purple-100 text-[#581D74]"
                >
                    <i data-lucide="{{ $icon }}" class="w-6 h-6 md:w-8 md:h-8"></i>
                </div>

                <p class="text-xs md:text-sm font-semibold">
                    {{ $label }}
                </p>
            </div>

            @endforeach

        </div>
    </div>

</section>

{{-- ================= --}}
{{-- ALUR PENDAFTARAN --}}
{{-- ================= --}}
<section class="relative bg-white pt-20 md:pt-28 pb-16 md:pb-24">

    {{-- WAVE ATAS (PUTIH KE UNGU) --}}
    <div class="absolute top-0 left-0 w-full overflow-hidden leading-none -mt-1">
        <svg viewBox="0 0 1440 160" class="w-full h-[80px] md:h-[160px]" preserveAspectRatio="none">
            <path
                fill="url(#gradWave)"
                d="
                    M0,80
                    C120,20 240,140 360,120
                    C480,100 600,20 720,60
                    C840,100 960,160 1080,120
                    C1200,80 1320,40 1440,60
                    L1440,0 L0,0 Z
                "
            />
            <defs>
                <linearGradient id="gradWave" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0%" stop-color="#BF4ED2"/>
                
                </linearGradient>
            </defs>
        </svg>
    </div>

    <div class="max-w-4xl mx-auto px-6 pt-10 md:pt-20 relative">

        {{-- JUDUL --}}
        <h2 class="text-3xl md:text-4xl font-extrabold text-center text-gray-900 md:pt-20">
            Alur Pendaftaran
        </h2>

        <p class="text-center text-xs md:text-sm text-gray-600 mt-2 mb-10 md:mb-16 max-w-sm md:max-w-none mx-auto">
            Ikuti tahapan seleksi untuk bergabung sebagai<br class="hidden md:block">
            Asisten atau Programmer di Laboratorium Manajemen Lanjut..
        </p>

        {{-- TIMELINE --}}
        <div class="relative">

            {{-- GARIS TENGAH --}}
            <div class="absolute left-1/2 top-0 h-full w-1 md:w-1.5 bg-purple-200 -translate-x-1/2"></div>

            {{-- ITEM --}}
            @php
                $steps = [
                    [
                        'date' => '13 Okt 2025 – 27 Okt 2025',
                        'title' => 'Registrasi Akun & Pengisian Data',
                        'desc' => 'Peserta membuat akun pada website, melengkapi data pribadi, serta mengunggah dokumen yang dipersyaratkan.'
                    ],
                    [
                        'date' => '5 Nov 2025 – 7 Nov 2025',
                        'title' => 'Validasi Data',
                        'desc' => 'Asisten melakukan pengecekan terhadap kebenaran dan kelengkapan data serta dokumen.'
                    ],
                    [
                        'date' => '8 Nov 2025',
                        'title' => 'Tes Tahap 1 – Ujian Tertulis (Daring)',
                        'desc' => 'Peserta mengikuti ujian yang mencakup pengetahuan dasar perbankan dan pengetahuan umum.'
                    ],
                    [
                        'date' => '14 Nov 2025 – 21 Nov 2025',
                        'title' => 'Tes Tahap 2 – Tes Tutor/Programmer & Wawancara',
                        'desc' => 'Peserta melaksanakan tes tutor atau programmer sesuai bidang yang dipilih serta wawancara.'
                    ],
                    [
                        'date' => '24 Nov 2025 – 26 Nov 2025',
                        'title' => 'Tes Tahap 3 – Wawancara Staf',
                        'desc' => 'Peserta yang lolos tahap sebelumnya akan menjalani wawancara dengan staf laboratorium.'
                    ],
                    [
                        'date' => '30 Nov 2025',
                        'title' => 'Pengumuman',
                        'desc' => 'Peserta yang dinyatakan lulus akan resmi menjadi Asisten atau Programmer.'
                    ],
                ];
            @endphp

            @foreach ($steps as $i => $step)
                <div class="relative mb-8 md:mb-14 flex {{ $i % 2 === 0 ? 'justify-start pr-4 md:pr-8' : 'justify-end pl-4 md:pl-8' }}">

                    <div class="w-[45%] md:w-[48%] bg-white rounded-lg md:rounded-xl shadow-lg p-3 md:p-6 border-1 border-[#ebebeb]">
                        <span class="text-[9px] md:text-xs font-semibold text-purple-600 block mb-1">
                            {{ $step['date'] }}
                        </span>

                        <h3 class="mt-1 md:mt-2 font-bold text-gray-900 text-[11px] md:text-base leading-tight">
                            {{ $step['title'] }}
                        </h3>

                        <p class="mt-1 md:mt-2 text-[10px] md:text-sm text-gray-600 leading-snug">
                            {{ $step['desc'] }}
                        </p>
                    </div>

                    {{-- DOT --}}
                    <span
                        class="absolute left-1/2 top-4 md:top-6 w-3 h-3 md:w-5 md:h-5 bg-[#581D74]
                               rounded-full -translate-x-1/2 border-2 md:border-4 border-white"
                    ></span>

                </div>
            @endforeach

        </div>
    </div>
</section>

{{-- ================= --}}
{{-- CTA + TESTIMONI --}}
{{-- ================= --}}
<section class="relative">

    {{-- CTA PUTIH --}}
    <div class="bg-white pt-16 md:pt-24 pb-20 md:pb-40 relative z-10">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-10 md:gap-16 items-center">

            {{-- ILUSTRASI --}}
            <img
                src="/images/berperan.png"
                alt="Ilustrasi"
                class="w-[85%] md:w-full max-w-md mx-auto order-1 md:order-none drop-shadow-xl"
            >

            {{-- TEXT --}}
            <div class="text-center md:text-left order-2 md:order-none">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">
                    Saatnya kamu berperan!
                </h2>

                <p class="mt-3 md:mt-4 text-gray-600 text-sm leading-relaxed max-w-md mx-auto md:mx-0">
                    Kembangkan potensi dan kemampuanmu bersama kami dengan bergabung
                    sebagai Calon Asisten Laboratorium Manajemen Menengah.
                    Daftarkan dirimu sekarang dan jadilah bagian dari tim kami.
                </p>

                <a href="{{ route('oprec') }}"
                   class="inline-block mt-6 bg-[#F5A623] text-white font-semibold px-6 py-2.5 md:px-8 md:py-3 rounded-lg hover:bg-[#e0941d] transition w-full sm:w-auto">
                    Ayo Daftar!
                </a>
            </div>

        </div>
    </div>

    {{-- WAVE PUTIH KE UNGU --}}
    <x-wave2 />

  
{{-- ================= --}}
{{-- SUARA MEREKA --}}
{{-- ================= --}}
<section
    class="text-white pt-20 pb-20 md:pt-40 md:pb-40 -mt-1"
    style="background:linear-gradient(to bottom,#7B2FA0,#62286C)"
>

    {{-- HEADER --}}
    <div class="max-w-7xl mx-auto px-6 mb-10 md:mb-18">
        <div class="flex flex-col md:flex-row items-center md:items-start gap-4 md:gap-8">

            {{-- TITLE --}}
            <h2 class="text-3xl md:text-4xl font-bold whitespace-nowrap text-center md:text-left">
                Suara Mereka
            </h2>

            {{-- LINE --}}
            <div class="hidden md:block w-px bg-white/40 h-14"></div>

            {{-- DESC --}}
            <p class="text-xs md:text-sm opacity-90 max-w-md text-center md:text-left">
                Cerita dari mereka yang belajar, berproses,
                dan berkembang bersama Laboratorium
                Manajemen Menengah.
            </p>

        </div>
    </div>

    {{-- TESTIMONI SLIDER (HIDDEN SLIDER STYLE) --}}
    <div class="max-w-7xl mx-auto pl-6 md:px-6">
        <div
            class="flex gap-4 md:gap-6 overflow-x-auto
                   snap-x snap-proximity
                   scrollbar-hide
                   cursor-grab active:cursor-grabbing pb-4 pr-6 md:pr-0"
        >

            @foreach (range(1,6) as $i)
            <div
                class="min-w-[240px] md:min-w-[260px] max-w-[240px] md:max-w-[260px]
                       snap-center
                       bg-white text-gray-800
                       rounded-xl p-5 md:p-6 shadow-xl
                       flex-shrink-0 text-center"
            >

                {{-- FOTO --}}
                <img
                    src="/images/testimoni/user{{ $i }}.jpg"
                    class="w-12 h-12 md:w-14 md:h-14 rounded-full mx-auto mb-3 md:mb-4 object-cover"
                    alt="User"
                >

                {{-- NAMA --}}
                <h4 class="font-semibold text-xs md:text-sm">
                    lisa bekping
                </h4>

                {{-- ROLE --}}
                <p class="text-[10px] md:text-xs text-gray-500 mb-3 md:mb-4">
                    prog 3b
                </p>

                {{-- ISI --}}
                <p class="text-[11px] md:text-xs leading-relaxed text-gray-600">
                    “mamen seru! bukan hanya tempat belajar teori,
                    tapi ruang untuk berproses. Di sini saya belajar
                    bekerja dalam tim, mengelola tanggung jawab,
                    dan berkembang menjadi pribadi yang lebih siap
                    menghadapi tantangan.”
                </p>

            </div>
            @endforeach

        </div>
    </div>

</section>



@endsection
