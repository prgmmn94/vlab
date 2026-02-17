@extends('layouts.app')

@section('title', 'Download Praktikum')

@section('content')
{{-- Load CSS Swiper --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

@php
    // tes Pake dummy dlu
    $downloadData = [
        'MODUL DAN SOAL LAPORAN AKHIR' => [
            [
                'judul' => 'E-Commerce',
                'tanggal' => '25/08/2025',
                'icon' => 'book',
                'link' => 'https://drive.google.com/...'
            ],
            [
                'judul' => 'Riset Operasional 1',
                'tanggal' => '01/09/2025',
                'icon' => 'book',
                'link' => '#'
            ],
            [
                'judul' => 'Manajemen Keuangan 2',
                'tanggal' => '28/08/2025',
                'icon' => 'book',
                'link' => '#'
            ],
        ],
        'KARTU PRAKTIKUM DAN LOGO' => [
            [
                'judul' => 'Kartu Praktikum',
                'tanggal' => '10/08/2025',
                'icon' => 'id-card',
                'link' => '#'
            ],
            [
                'judul' => 'Logo Laboratorium',
                'tanggal' => '24/07/2025',
                'icon' => 'image',
                'link' => '#'
            ],
        ],
        'APLIKASI PENUNJANG' => [
            [
                'judul' => 'POM-QM',
                'tanggal' => '15/09/2025',
                'icon' => 'monitor',
                'link' => 'https://drive.google.com/drive/folders/1fheFFX6milSZY46OmCX8tNBpKzbIFs7l'
            ],
            [
                'judul' => 'DosBox',
                'tanggal' => '20/09/2025',
                'icon' => 'box',
                'link' => 'https://drive.google.com/drive/folders/1vWL8WO5BvilrE0aAaFI26V1bsuArDWb0'
            ],
            [
                'judul' => 'SMM',
                'tanggal' => '05/10/2025',
                'icon' => 'app-window',
                'link' => 'https://drive.google.com/drive/folders/1JVD8hqvPkKXO4WrzBZrEBkEyjvhq3h6I'
            ],
            [
                'judul' => 'E-Commerce',
                'tanggal' => '05/10/2025',
                'icon' => 'app-window',
                'link' => '#'
            ],
        ]
    ];
@endphp

<div class="bg-[#71268a] min-h-screen w-full py-12 px-4 font-sans">
    <div class="bg-white max-w-7xl mx-auto rounded-[40px] shadow-2xl p-8 md:p-14 overflow-hidden">

        {{-- Loop Kategori --}}
        @foreach($downloadData as $kategori => $items)
            <div class="mb-20 relative group">
                {{-- Judul Kategori --}}
                <div class="flex items-center gap-3 mb-8 border-l-[6px] border-[#71268a] pl-4">
                    <h3 class="text-xl md:text-2xl font-black uppercase text-gray-800 tracking-tight">{{ $kategori }}</h3>
                </div>

                {{-- Container Swiper --}}
                <div class="swiper mySwiper-{{ Str::slug($kategori) }} px-4 py-4">
                    <div class="swiper-wrapper">
                        @foreach($items as $item)
                            <div class="swiper-slide h-auto">
                                {{-- Card Utama --}}
                                <div class="block h-full group/card">
                                    <div class="bg-white rounded-[30px] p-6 shadow-[0_10px_40px_rgba(0,0,0,0.06)] border border-gray-100 flex flex-col items-center h-full transition-transform duration-300 hover:-translate-y-2 hover:shadow-xl hover:border-purple-200">
                                        
                                        {{-- Icon Besar di Tengah --}}
                                        <div class="w-24 h-24 rounded-full bg-[#fdf4ff] flex items-center justify-center mb-6 text-[#71268a] group-hover/card:bg-[#71268a] group-hover/card:text-white transition-colors duration-300">
                                            @if($item['icon'] == 'book')
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                                            @elseif($item['icon'] == 'id-card')
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="12" x="3" y="5" rx="2"/><circle cx="9" cy="9" r="2"/><path d="M15 13h2"/><path d="M15 9h2"/></svg>
                                            @elseif($item['icon'] == 'image')
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                                            @elseif($item['icon'] == 'monitor')
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" x2="16" y1="21" y2="21"/><line x1="12" x2="12" y1="17" y2="21"/></svg>
                                            @elseif($item['icon'] == 'box')
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path d="m3.3 7 8.7 5 8.7-5"/><path d="M12 22v-9"/></svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M10 4v4"/><path d="M2 8h20"/><path d="M6 4v4"/></svg>
                                            @endif
                                        </div>

                                        {{-- Judul File --}}
                                        <h4 class="text-[#4c1d95] font-black text-center text-sm md:text-base mb-2 px-2 uppercase tracking-tight leading-tight min-h-[3rem] flex items-center justify-center">
                                            {{ $item['judul'] }}
                                        </h4>

                                        {{-- Tanggal Upload --}}
                                        <div class="flex items-center gap-1 text-gray-400 text-xs font-bold mb-6">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                            <span>{{ $item['tanggal'] }}</span>
                                        </div>

                                        {{-- Tombol Download --}}
                                        <a href="{{ $item['link'] }}" target="_blank" class="mt-auto w-full bg-[#71268a] text-white py-2 rounded-xl text-center font-bold text-xs uppercase tracking-wider hover:bg-[#5b1e6e] transition-colors">
                                            Download
                                        </a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Tombol Navigasi Kiri/Kanan --}}
                    <div class="swiper-button-next-{{ Str::slug($kategori) }} absolute right-[-15px] top-1/2 -translate-y-1/2 z-10 w-10 h-10 bg-white shadow-lg rounded-full flex items-center justify-center text-[#71268a] cursor-pointer border border-gray-100 transition-all hover:scale-110">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                    <div class="swiper-button-prev-{{ Str::slug($kategori) }} absolute left-[-15px] top-1/2 -translate-y-1/2 z-10 w-10 h-10 bg-white shadow-lg rounded-full flex items-center justify-center text-[#71268a] cursor-pointer border border-gray-100 transition-all hover:scale-110">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path></svg>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{-- Load Script Swiper --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @foreach($downloadData as $kategori => $items)
            new Swiper('.mySwiper-{{ Str::slug($kategori) }}', {
                slidesPerView: 1.2, 
                spaceBetween: 30,
                watchOverflow: true, 
                navigation: {
                    nextEl: '.swiper-button-next-{{ Str::slug($kategori) }}',
                    prevEl: '.swiper-button-prev-{{ Str::slug($kategori) }}',
                },
                breakpoints: {
                    640: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 }, // Desktop standar
                    1280: { slidesPerView: 3 }  // Layar lebar
                }
            });
        @endforeach
    });
</script>

<style>
    .swiper-button-disabled { opacity: 0 !important; pointer-events: none; }
    .swiper { overflow: visible !important; }
</style>
@endsection