@extends('layouts.app')

@section('title', 'Jadwal Praktikum')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
// TES PAKEKK DUMMY DLU GEYS
@php
    $jadwalData = [
        'DEPOK' => [
            [
                'matkul' => 'RISET OPERASIONAL 1',
                'kelas' => '2EA24',
                'icon' => 'chart', 
                'jadwal' => 'jadwal1.png'
            ],
            [
                'matkul' => 'MANAJEMEN KEUANGAN 2',
                'kelas' => '3DA01',
                'icon' => 'finance',
                'jadwal' => 'jadwal1.png'
            ],
            [
            'matkul' => 'MANAJEMEN KEUANGAN 2',
                'kelas' => '3DA01',
                'icon' => 'finance',
                'jadwal' => 'jadwal1.png'
            ],
            [
            'matkul' => 'MANAJEMEN KEUANGAN 2',
                'kelas' => '3DA01',
                'icon' => 'finance',
                'jadwal' => 'jadwal1.png' 
            ],
            [
            'matkul' => 'MANAJEMEN KEUANGAN 2',
                'kelas' => '3DA01',
                'icon' => 'finance',
                'jadwal' => 'jadwal1.png'],
        ],
        'KALIMALANG' => [
            [
                'matkul' => 'RISET OPERASIONAL 1',
                'kelas' => '2EA24',
                'icon' => 'chart', 
                'jadwal' => 'jadwal1.png'
            ],
            [
                'matkul' => 'MANAJEMEN KEUANGAN 2',
                'kelas' => '3DA01',
                'icon' => 'finance',
                'jadwal' => 'jadwal1.png'
            ],
        ],
        'KARAWACI' => [
            [
                'matkul' => 'RISET OPERASIONAL 1',
                'kelas' => '2EA24',
                'icon' => 'chart', 
                'jadwal' => 'jadwal1.png'
            ],
            [
                'matkul' => 'MANAJEMEN KEUANGAN 2',
                'kelas' => '3DA01',
                'icon' => 'finance',
                'jadwal' => 'jadwal1.png'
            ],
            [
            'matkul' => 'MANAJEMEN KEUANGAN 2',
                'kelas' => '3DA01',
                'icon' => 'finance',
                'jadwal' => 'jadwal1.png'
            ],
            [
            'matkul' => 'MANAJEMEN KEUANGAN 2',
                'kelas' => '3DA01',
                'icon' => 'finance',
                'jadwal' => 'jadwal1.png' 
            ],
            [
            'matkul' => 'MANAJEMEN KEUANGAN 2',
                'kelas' => '3DA01',
                'icon' => 'finance',
                'jadwal' => 'jadwal1.png'],
        ],
        'SALEMBA' => [
            [
                'matkul' => 'RISET OPERASIONAL 1',
                'kelas' => '2EA24',
                'icon' => 'chart', 
                'jadwal' => 'jadwal1.png'
            ],
            [
                'matkul' => 'MANAJEMEN KEUANGAN 2',
                'kelas' => '3DA01',
                'icon' => 'finance',
                'jadwal' => 'jadwal1.png'
            ],
        ],
        'CENGKARENG' => [
            [
                'matkul' => 'RISET OPERASIONAL 1',
                'kelas' => '2EA24',
                'icon' => 'chart', 
                'jadwal' => 'jadwal1.png'
            ],
            [
                'matkul' => 'MANAJEMEN KEUANGAN 2',
                'kelas' => '3DA01',
                'icon' => 'finance',
                'jadwal' => 'jadwal1.png'
            ],
        ],
    ];
@endphp

<div class="bg-gradient-to-b from-[#62286C] to-[#BF4ED2] min-h-screen font-sans text-gray-800 p-8">
    <div class="bg-white max-w-6xl mx-auto rounded-[40px] shadow-2xl p-8 md:p-14 overflow-hidden">
        
        <div class="text-center mb-16">
            <h1 class="text-2xl md:text-3xl font-black uppercase tracking-tighter text-gray-800">Jadwal Praktikum</h1>
            <h2 class="text-xl md:text-2xl font-black uppercase text-gray-800">Laboratorium Manajemen Menengah</h2>
            <p class="text-gray-500 font-bold mt-1 text-sm md:text-base">Periode PTA 2025/2026</p>
        </div>
        
        {{-- Group untuk kontrol hover panah --}}
        @foreach($jadwalData as $lokasi => $items)
            <div class="mb-20 relative group"> 
                <div class="flex items-center gap-2 mb-8 border-l-[6px] border-[#71268a] pl-4">
                    <h3 class="text-2xl font-black uppercase text-gray-800 tracking-tight">{{ $lokasi }}</h3>
                </div>

                {{-- SWIPER/GESER CONTAINER --}}
                <div class="swiper mySwiper-{{ Str::slug($lokasi) }} px-4 py-4">
                    <div class="swiper-wrapper">
                        @foreach($items as $item)
                            <div class="swiper-slide h-auto">
                                <div class="bg-white rounded-[30px] p-6 shadow-[0_10px_40px_rgba(0,0,0,0.06)] border border-gray-50 flex flex-col items-center h-full">
                                    <h4 class="text-[#4c1d95] font-black text-center text-[12px] md:text-sm mb-4 uppercase tracking-tight leading-none min-h-[2.5rem] flex items-center justify-center">
                                        {{ $item['matkul'] }}
                                    </h4>
                                    <div class="bg-[#F5A623] text-white text-[10px] font-black px-8 py-1.5 rounded-full mb-6 shadow-sm">
                                        {{ $item['kelas'] }}
                                    </div>

                                    {{-- ICON BUAT CARD JADWALNYA --}}
                                    <div class="w-24 h-24 rounded-full bg-[#fdf4ff] flex items-center justify-center mb-8 text-[#71268a]">
                                        
                                        {{-- Logika buat milih Icon --}}
                                        @if($item['icon'] == 'chart')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bar-chart-3">
                                                <path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/>
                                            </svg>

                                        @elseif($item['icon'] == 'finance')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wallet">
                                                <path d="M21 12V7H5a2 2 0 0 1 0-4h14v4"/><path d="M3 5v14a2 2 0 0 0 2 2h16v-5"/><path d="M18 12a2 2 0 0 0 0 4h4v-4Z"/>
                                            </svg>
                                        @endif

                                    </div>

                                    <div class="w-full mt-auto rounded-xl overflow-hidden border border-gray-200 group/img relative">
                                        <a data-fslightbox="item-{{ $lokasi }}-{{ $loop->index }}" href="{{ asset('images/' . $item['jadwal']) }}">
                                            <img src="{{ asset('images/' . $item['jadwal']) }}" 
                                                alt="Jadwal {{ $item['kelas'] }}" 
                                                class="w-full h-auto object-cover hover:scale-110 transition-transform duration-500 cursor-zoom-in">
                                            
                                            {{-- Overlay gambar jadwal --}}
                                            <div class="absolute inset-0 bg-black/20 opacity-0 group-hover/img:opacity-100 transition-opacity flex items-center justify-center">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="swiper-button-next-{{ Str::slug($lokasi) }} absolute right-[-15px] top-1/2 -translate-y-1/2 z-10 w-10 h-10 bg-white shadow-lg rounded-full flex items-center justify-center text-[#71268a] cursor-pointer border border-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                    <div class="swiper-button-prev-{{ Str::slug($lokasi) }} absolute left-[-15px] top-1/2 -translate-y-1/2 z-10 w-10 h-10 bg-white shadow-lg rounded-full flex items-center justify-center text-[#71268a] cursor-pointer border border-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path></svg>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fslightbox/3.0.9/index.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @foreach($jadwalData as $lokasi => $items)
            new Swiper('.mySwiper-{{ Str::slug($lokasi) }}', {
                slidesPerView: 1.2,
                spaceBetween: 30,
                watchOverflow: true,
                navigation: {
                    nextEl: '.swiper-button-next-{{ Str::slug($lokasi) }}',
                    prevEl: '.swiper-button-prev-{{ Str::slug($lokasi) }}',
                },
                breakpoints: {
                    640: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 },
                    1280: { slidesPerView: 4 }
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