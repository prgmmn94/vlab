@extends('layouts.app')

@section('content')

{{-- ================= --}}
{{-- HERO PUTIH --}}
{{-- ================= --}}
<section class="bg-white ">
    <div class="max-w-full mx-auto py-20 grid md:grid-cols-2 items-center">

        {{-- ILUSTRASI --}}
        <img src="/images/homewelcome.png"
             class="w-full max-w-lg mx-auto"
             alt="Hero">

        {{-- TEXT --}}
        <div>
            <h1 class="text-4xl font-extrabold leading-tight text-gray-900">
                SELAMAT DATANG DI<br>
                <span class="text-[#581D74]">
                    LABORATORIUM<br>
                    MANAJEMEN MENENGAH
                </span>
            </h1>

            <p class="mt-4 text-gray-600 text-base">
                Bersama kita wujudkan masa depan yang lebih baik!
            </p>
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
   <div class="max-w-full mx-auto px-30 pt-30 pb-35 grid md:grid-cols-2 items-center">


        <div class="md:pl-20">
            <h2 class="text-4xl font-bold mb-4">
                Apa Itu V-LAB?
            </h2>

            <p class="text-base leading-relaxed opacity-90">
                Portal Virtual Lab (V-Lab) merupakan layanan pembelajaran daring
                yang digunakan untuk mendukung proses belajar mengajar oleh
                asisten dan mahasiswa di lingkungan Laboratorium Manajemen
                Menengah Universitas Gunadarma.
            </p>
        </div>

        <img src="/images/apaitu.png"
             class="w-full max-w-md mx-auto"
             alt="Ilustrasi">
    </div>

    {{-- MATERI PRAKTIKUM --}}
    <div class="max-w-7xl mx-auto px-6 pb-40">

        <h2 class="text-3xl font-bold text-center mb-12">
            Materi Praktikum
        </h2>

        <div class="grid sm:grid-cols-2 md:grid-cols-5 gap-6">

            @foreach ([
                ['shopping-cart','E-Commerce'],
                ['briefcase','Jasa'],
                ['wallet','Manajemen Keuangan'],
                ['megaphone','Marketing Komunikasi'],
                ['bar-chart-3','Riset Operasional']
            ] as [$icon, $label])

            <div
                class="bg-white text-gray-800 rounded-xl p-6 text-center shadow-lg 
                       transition hover:-translate-y-1"
            >
                <div
                    class="w-20 h-18 mx-auto mb-4 flex items-center justify-center
                           rounded-full bg-purple-100 text-[#581D74]"
                >
                    <i data-lucide="{{ $icon }}"></i>
                </div>

                <p class="text-sm font-semibold">
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
<section class="relative bg-white pt-28 pb-24 ">

    {{-- WAVE ATAS (PUTIH KE UNGU) --}}
    <div class="absolute top-0 left-0 w-full overflow-hidden leading-none -mt-1">
        <svg viewBox="0 0 1440 160" class="w-full h-[160px]" preserveAspectRatio="none">
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

    <div class="max-w-4xl mx-auto px-6 pt-20 relative">

        {{-- JUDUL --}}
        <h2 class="text-4xl font-extrabold text-center text-gray-900 pt-20">
            Alur Pendaftaran
        </h2>

        <p class="text-center text-sm text-gray-600 mt-2 mb-16">
            Ikuti tahapan seleksi untuk bergabung sebagai<br>
            Asisten atau Programmer di Laboratorium Manajemen Lanjut..
        </p>

        {{-- TIMELINE --}}
        <div class="relative">

            {{-- GARIS TENGAH --}}
            <div class="absolute left-1/2 top-0 h-full w-1.5 bg-purple-200 -translate-x-1/2"></div>

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
                <div class="relative mb-14 flex {{ $i % 2 === 0 ? 'justify-start pr-8' : 'justify-end pl-8' }}">

                    <div class="w-full md:w-[48%] bg-white rounded-xl shadow-lg p-6 border-1 border-[#ebebeb]">
                        <span class="text-xs font-semibold text-purple-600">
                            {{ $step['date'] }}
                        </span>

                        <h3 class="mt-2 font-bold text-gray-900">
                            {{ $step['title'] }}
                        </h3>

                        <p class="mt-2 text-sm text-gray-600">
                            {{ $step['desc'] }}
                        </p>
                    </div>

                    {{-- DOT --}}
                    <span
                        class="absolute left-1/2 top-6 w-5 h-5 bg-[#581D74]
                               rounded-full -translate-x-1/2 border-4 border-white"
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
    <div class="bg-white pt-24 pb-40 relative z-10">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">

            {{-- ILUSTRASI --}}
            <img
                src="/images/berperan.png"
                alt="Ilustrasi"
                class="w-full max-w-md mx-auto"
            >

            {{-- TEXT --}}
            <div>
                <h2 class="text-4xl font-extrabold text-gray-900">
                    Saatnya kamu berperan!
                </h2>

                <p class="mt-4 text-gray-600 text-sm leading-relaxed">
                    Kembangkan potensi dan kemampuanmu bersama kami dengan bergabung
                    sebagai Calon Asisten Laboratorium Manajemen Menengah.
                    Daftarkan dirimu sekarang dan jadilah bagian dari tim kami.
                </p>

                <a
                    href="#"
                    class="inline-block mt-6 bg-[#F5A623] text-white
                           font-semibold px-8 py-3 rounded-lg
                           hover:bg-[#e0941d] transition"
                >
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
    class="text-white pt-40 pb-40 -mt-1"
    style="background:linear-gradient(to bottom,#7B2FA0,#62286C)"
>

    {{-- HEADER --}}
    <div class="max-w-7xl mx-auto px-6 mb-18">
        <div class="flex flex-col md:flex-row items-center md:items-start gap-8">

            {{-- TITLE --}}
            <h2 class="text-4xl font-bold whitespace-nowrap">
                Suara Mereka
            </h2>

            {{-- LINE --}}
            <div class="hidden md:block w-px bg-white/40 h-14"></div>

            {{-- DESC --}}
            <p class="text-sm opacity-90 max-w-md">
                Cerita dari mereka yang belajar, berproses,
                dan berkembang bersama Laboratorium
                Manajemen Menengah.
            </p>

        </div>
    </div>

    {{-- TESTIMONI SLIDER (HIDDEN SLIDER STYLE) --}}
    <div class="max-w-7xl mx-auto px-6">
        <div
            class="flex gap-6 overflow-x-auto
                   snap-x snap-proximity
                   scrollbar-hide
                   cursor-grab active:cursor-grabbing pb-4"
        >

            @foreach (range(1,6) as $i)
            <div
                class="min-w-[260px] max-w-[260px]
                       snap-center
                       bg-white text-gray-800
                       rounded-xl p-6 shadow-xl
                       flex-shrink-0 text-center"
            >

                {{-- FOTO --}}
                <img
                    src="/images/testimoni/user{{ $i }}.jpg"
                    class="w-14 h-14 rounded-full mx-auto mb-4 object-cover"
                    alt="User"
                >

                {{-- NAMA --}}
                <h4 class="font-semibold text-sm">
                    lisa bekping
                </h4>

                {{-- ROLE --}}
                <p class="text-xs text-gray-500 mb-4">
                    prog 3b
                </p>

                {{-- ISI --}}
                <p class="text-xs leading-relaxed text-gray-600">
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
