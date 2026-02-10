@extends('layouts.app')

@section('content')

<style>
    #galleryScroll::-webkit-scrollbar { display: none; }
    #galleryScroll { 
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6 space-y-28">

        @php
        $angkatan = [
            ['nama' => 'ULTRAMEN', 'tahun' => '31', 'folder' => '31'],
            ['nama' => 'MENTARI', 'tahun' => '32', 'folder' => '32'],
            ['nama' => 'PERMEN', 'tahun' => '33', 'folder' => '33'],
            ['nama' => 'MAKRAB', 'tahun' => '25/26', 'folder' => 'makrab'],
        ];
        @endphp

        @foreach($angkatan as $item)
        <div class="grid md:grid-cols-12 gap-12 items-start">

            {{-- KIRI --}}
            <div class="md:col-span-3">
                <div class="flex items-start gap-3">
                    <div class="w-1 h-16 bg-purple-700"></div>
                    <div>
                        <h2 class="text-lg font-extrabold tracking-wide text-purple-700 leading-none">
                            {{ $item['nama'] }}
                        </h2>
                        <p class="text-sm font-semibold text-gray-700">
                            {{ $item['tahun'] }}
                        </p>
                    </div>
                </div>

                <p class="text-xs text-gray-600 leading-relaxed mt-4">
                    Dokumentasi kegiatan praktikum, kebersamaan asisten, serta aktivitas
                    Laboratorium Manajemen Menengah yang penuh pengalaman,
                    pembelajaran, dan momen berkesan.
                </p>
            </div>

{{-- KANAN FOTO --}}
<div class="md:col-span-9 relative">

    <div id="galleryScroll"
         class="overflow-x-auto scroll-smooth cursor-grab active:cursor-grabbing pb-6">

        <div class="min-w-[1200px] space-y-4 snap-x snap-mandatory">

            {{-- BARIS 1 --}}
            <div class="grid grid-cols-5 gap-4 snap-start">
                <img src="/images/galeri/{{ $item['folder'] }}/1.jpg" data-group="galeri-{{ $item['folder'] }}" class="gallery-img col-span-1 h-28 w-full object-cover rounded-lg cursor-pointer hover:scale-105 transition">
                <img src="/images/galeri/{{ $item['folder'] }}/2.jpg" data-group="galeri-{{ $item['folder'] }}" class="gallery-img col-span-1 h-28 w-full object-cover rounded-lg cursor-pointer hover:scale-105 transition">
                <img src="/images/galeri/{{ $item['folder'] }}/3.jpg" data-group="galeri-{{ $item['folder'] }}" class="gallery-img col-span-2 h-28 w-full object-cover rounded-lg cursor-pointer hover:scale-105 transition">
                <img src="/images/galeri/{{ $item['folder'] }}/4.jpg" data-group="galeri-{{ $item['folder'] }}" class="gallery-img col-span-1 h-28 w-full object-cover rounded-lg cursor-pointer hover:scale-105 transition">
            </div>

            {{-- BARIS 2 --}}
            <div class="grid grid-cols-5 gap-4 snap-start">
                <img src="/images/galeri/{{ $item['folder'] }}/5.jpg" data-group="galeri-{{ $item['folder'] }}" class="gallery-img col-span-2 h-32 w-full object-cover rounded-lg cursor-pointer hover:scale-105 transition">
                <img src="/images/galeri/{{ $item['folder'] }}/6.jpg" data-group="galeri-{{ $item['folder'] }}" class="gallery-img col-span-1 h-32 w-full object-cover rounded-lg cursor-pointer hover:scale-105 transition">
                <img src="/images/galeri/{{ $item['folder'] }}/7.jpg" data-group="galeri-{{ $item['folder'] }}" class="gallery-img col-span-1 h-32 w-full object-cover rounded-lg cursor-pointer hover:scale-105 transition">
                <img src="/images/galeri/{{ $item['folder'] }}/8.jpg" data-group="galeri-{{ $item['folder'] }}" class="gallery-img col-span-1 h-32 w-full object-cover rounded-lg cursor-pointer hover:scale-105 transition">
            </div>

        </div>
    </div>
</div>


        </div>
        @endforeach

    </div>
</section>

@endsection
