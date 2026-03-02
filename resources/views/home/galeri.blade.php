@extends('layouts.app')

@section('content')

<style>
    #galleryScroll::-webkit-scrollbar { display: none; }
    #galleryScroll { 
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

<section class="bg-white py-12 md:py-20">
    <div class="max-w-7xl mx-auto px-4 md:px-6 space-y-16 md:space-y-28">

        @php
        $angkatan = [
            ['nama' => 'ULTRAMEN', 'tahun' => '31', 'folder' => '31'],
            ['nama' => 'MENTARI', 'tahun' => '32', 'folder' => '32'],
            ['nama' => 'PERMEN', 'tahun' => '33', 'folder' => '33'],
            ['nama' => 'MAKRAB', 'tahun' => '25/26', 'folder' => 'makrab'],
        ];
        @endphp

        @foreach($angkatan as $item)
        <div class="flex flex-col md:grid md:grid-cols-12 gap-6 md:gap-12 items-start">

            {{-- KIRI --}}
            <div class="md:col-span-3">
                <div class="flex items-start gap-2 md:gap-3">
                    <div class="w-1 h-12 md:h-16 bg-purple-700"></div>
                    <div>
                        <h2 class="text-base md:text-lg font-extrabold tracking-wide text-purple-700 leading-none">
                            {{ $item['nama'] }}
                        </h2>
                        <p class="text-[13px] md:text-sm font-semibold text-gray-700 mt-1 md:mt-0">
                            {{ $item['tahun'] }}
                        </p>
                    </div>
                </div>

                <p class="text-[11px] md:text-xs text-gray-600 leading-relaxed mt-3 md:mt-4 text-justify md:text-left">
                    Dokumentasi kegiatan praktikum, kebersamaan asisten, serta aktivitas
                    Laboratorium Manajemen Menengah yang penuh pengalaman,
                    pembelajaran, dan momen berkesan.
                </p>
            </div>

{{-- KANAN FOTO --}}
<div class="md:col-span-9 relative w-full pt-4 md:pt-0 group">
    
    {{-- Tombol Geser Kiri (buat desktop) --}}
    <button id="btn-left-{{ $item['folder'] }}" onclick="scrollGallery('galleryScroll-{{ $item['folder'] }}', 'left')" 
            class="hidden absolute left-[-15px] top-1/2 -translate-y-1/2 z-10 w-10 h-10 bg-white shadow-lg rounded-full items-center justify-center text-[#71268a] cursor-pointer border border-gray-100 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path></svg>
    </button>

    <div id="galleryScroll-{{ $item['folder'] }}" onscroll="updateArrows('{{ $item['folder'] }}')" class="overflow-x-auto scroll-smooth cursor-grab active:cursor-grabbing pb-2 md:pb-6 snap-x snap-mandatory hide-scrollbar">
        {{-- Inner container yang dipaksa lebar biar bisa discroll --}}
        <div class="min-w-[700px] md:min-w-[1200px] space-y-2 md:space-y-4 px-1 md:px-0">
            
            {{-- BARIS 1 --}}
            <div class="grid grid-cols-5 gap-2 md:gap-4 snap-start">
                <img src="/images/galeri/{{ $item['folder'] }}/1.jpg" data-group="galeri-{{ $item['folder'] }}" class="gallery-img col-span-1 h-20 sm:h-28 md:h-28 w-full object-cover rounded-md md:rounded-lg cursor-pointer hover:scale-105 transition">
                <img src="/images/galeri/{{ $item['folder'] }}/2.jpg" data-group="galeri-{{ $item['folder'] }}" class="gallery-img col-span-1 h-20 sm:h-28 md:h-28 w-full object-cover rounded-md md:rounded-lg cursor-pointer hover:scale-105 transition">
                <img src="/images/galeri/{{ $item['folder'] }}/3.jpg" data-group="galeri-{{ $item['folder'] }}" class="gallery-img col-span-2 h-20 sm:h-28 md:h-28 w-full object-cover rounded-md md:rounded-lg cursor-pointer hover:scale-105 transition">
                <img src="/images/galeri/{{ $item['folder'] }}/4.jpg" data-group="galeri-{{ $item['folder'] }}" class="gallery-img col-span-1 h-20 sm:h-28 md:h-28 w-full object-cover rounded-md md:rounded-lg cursor-pointer hover:scale-105 transition">
            </div>

            {{-- BARIS 2 --}}
            <div class="grid grid-cols-5 gap-2 md:gap-4 snap-start">
                <img src="/images/galeri/{{ $item['folder'] }}/5.jpg" data-group="galeri-{{ $item['folder'] }}" class="gallery-img col-span-2 h-24 sm:h-32 md:h-32 w-full object-cover rounded-md md:rounded-lg cursor-pointer hover:scale-105 transition">
                <img src="/images/galeri/{{ $item['folder'] }}/6.jpg" data-group="galeri-{{ $item['folder'] }}" class="gallery-img col-span-1 h-24 sm:h-32 md:h-32 w-full object-cover rounded-md md:rounded-lg cursor-pointer hover:scale-105 transition">
                <img src="/images/galeri/{{ $item['folder'] }}/7.jpg" data-group="galeri-{{ $item['folder'] }}" class="gallery-img col-span-1 h-24 sm:h-32 md:h-32 w-full object-cover rounded-md md:rounded-lg cursor-pointer hover:scale-105 transition">
                <img src="/images/galeri/{{ $item['folder'] }}/8.jpg" data-group="galeri-{{ $item['folder'] }}" class="gallery-img col-span-1 h-24 sm:h-32 md:h-32 w-full object-cover rounded-md md:rounded-lg cursor-pointer hover:scale-105 transition">
            </div>

        </div>
    </div>

    {{-- Tombol Geser Kanan (buat desktop) --}}
    <button id="btn-right-{{ $item['folder'] }}" onclick="scrollGallery('galleryScroll-{{ $item['folder'] }}', 'right')" 
            class="hidden md:flex absolute right-[-15px] top-1/2 -translate-y-1/2 z-10 w-10 h-10 bg-white shadow-lg rounded-full items-center justify-center text-[#71268a] cursor-pointer border border-gray-100 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
    </button>
</div>

        </div>
        @endforeach

    </div>
</section>

<script>
    function updateArrows(folderId) {
        const container = document.getElementById('galleryScroll-' + folderId);
        const btnLeft = document.getElementById('btn-left-' + folderId);
        const btnRight = document.getElementById('btn-right-' + folderId);
        
        if (!container || !btnLeft || !btnRight) return;

        // Cek mentok kiri
        if (container.scrollLeft <= 5) { 
            btnLeft.classList.remove('md:flex');
            btnLeft.classList.add('hidden');
        } else {
            btnLeft.classList.add('md:flex');
            btnLeft.classList.remove('hidden');
        }

        // Cek mentok kanan
        if (container.scrollLeft + container.clientWidth >= container.scrollWidth - 5) {
            btnRight.classList.remove('md:flex');
            btnRight.classList.add('hidden');
        } else {
            btnRight.classList.add('md:flex');
            btnRight.classList.remove('hidden');
        }
    }

    function scrollGallery(containerId, direction) {
        const container = document.getElementById(containerId);
        if (container) {
            // Geser sejauh 400px per klik
            const scrollAmount = direction === 'left' ? -400 : 400;
            container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        }
    }

    // Inisialisasi awal panah saat halaman dimuat
    document.addEventListener('DOMContentLoaded', () => {
        @foreach($angkatan as $item)
            updateArrows('{{ $item['folder'] }}');
        @endforeach
    });
</script>

<style>
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>

@endsection
