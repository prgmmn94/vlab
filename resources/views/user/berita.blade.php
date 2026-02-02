@extends('layouts.app')

@section('title', 'Berita Terbaru')

@section('content')

@php
    // TES PAKEKK DUMMY DLU GEYS
    $beritaData = [
        [
            'judul' => 'Open Recruitment LABMAMEN 2025/2026',
            'slug' => 'open-recruitment-2025', 
            'excerpt' => 'Mengapa Bergabung dengan Labmamen? Karena kami lebih dari sekadar komunitas. Kami adalah keluarga yang bertumbuh bersama, berbagi motivasi, dan meraih cita-cita tanpa pamrih. Labmamen adalah ruang untuk berkembang...',
            'tanggal' => '20 Januari 2026',
            'gambar' => 'berita1.png' 
        ],
        [
            'judul' => 'Open Recruitment LABMAMEN 2025/2026',
            'slug' => 'open-recruitment-2025', 
            'excerpt' => 'Mengapa Bergabung dengan Labmamen? Karena kami lebih dari sekadar komunitas. Kami adalah keluarga yang bertumbuh bersama, berbagi motivasi, dan meraih cita-cita tanpa pamrih. Labmamen adalah ruang untuk berkembang...',
            'tanggal' => '20 Januari 2026',
            'gambar' => 'berita1.png' 
        ],
        [
            'judul' => 'Open Recruitment LABMAMEN 2025/2026',
            'slug' => 'open-recruitment-2025', 
            'excerpt' => 'Mengapa Bergabung dengan Labmamen? Karena kami lebih dari sekadar komunitas. Kami adalah keluarga yang bertumbuh bersama, berbagi motivasi, dan meraih cita-cita tanpa pamrih. Labmamen adalah ruang untuk berkembang...',
            'tanggal' => '20 Januari 2026',
            'gambar' => 'berita1.png' 
        ],
    ];
@endphp

{{-- Container Utama --}}
<div class="bg-white min-h-screen w-full py-12 px-4 md:px-16 font-sans">
    <div class="max-w-5xl mx-auto">

        {{-- Grid Berita --}}
        <div class="flex flex-col gap-10">
            @foreach($beritaData as $berita)
                {{-- Card Berita --}}
                {{-- Block Link: Klik dimanapun di card akan menuju detail --}}
                <a href="/berita/{{ $berita['slug'] }}" class="group block">
                    <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.05)] hover:shadow-[0_10px_30px_rgba(113,38,138,0.15)] transition-all duration-300 transform ">
                        
                        {{-- Gambar Header --}}
                        <div class="w-full h-64 md:h-80 overflow-hidden relative">
                            <img src="{{ asset('images/' . $berita['gambar']) }}" 
                                 alt="{{ $berita['judul'] }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            
                            {{-- Overlay gradient tipis buat gambar --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
                        </div>

                        {{-- Konten Teks --}}
                        <div class="p-8">
                            {{-- Judul --}}
                            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 group-hover:text-[#71268a] transition-colors leading-tight">
                                {{ $berita['judul'] }}
                            </h2>

                            {{-- Deskripsi Singkat--}}
                            <p class="text-gray-500 text-sm md:text-base leading-relaxed mb-8 line-clamp-3">
                                {{ $berita['excerpt'] }}
                            </p>

                            {{-- Footer Card (Tanggal & Selengkapnya) --}}
                            <div class="flex items-center justify-between border-t border-gray-100 pt-6">
                                {{-- Tanggal --}}
                                <div class="text-gray-400 text-xs md:text-sm font-medium flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                    {{ $berita['tanggal'] }}
                                </div>

                                {{-- Tombol Selengkapnya --}}
                                <div class="text-[#71268a] font-bold text-sm flex items-center gap-1 group-hover:gap-2 transition-all">
                                    Selengkapnya
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection

