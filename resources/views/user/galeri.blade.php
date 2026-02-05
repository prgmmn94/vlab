@extends('layouts.app')

@section('content')

<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6 space-y-28">

        @php
        $angkatan = [
            ['nama' => 'ULTRAMEN', 'tahun' => '31', 'folder' => '31'],
            ['nama' => 'MENTARI', 'tahun' => '32', 'folder' => '32'],
            ['nama' => 'PERMEN', 'tahun' => '33', 'folder' => '33'],
            ['nama' => 'MAKRAB', 'tahun' => '25/26', 'folder' => '2526'],
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

            {{-- KANAN FOTO (BENTUK KHAS SS) --}}
            <div class="md:col-span-9 space-y-4">

                {{-- BARIS 1 --}}
                <div class="grid grid-cols-5 gap-4">
                    <img src="/images/galeri/{{ $item['folder'] }}/1.jpg" class="col-span-1 h-28 w-full object-cover rounded">
                    <img src="/images/galeri/{{ $item['folder'] }}/2.jpg" class="col-span-1 h-28 w-full object-cover rounded">
                    <img src="/images/galeri/{{ $item['folder'] }}/3.jpg" class="col-span-2 h-28 w-full object-cover rounded">
                    <img src="/images/galeri/{{ $item['folder'] }}/4.jpg" class="col-span-1 h-28 w-full object-cover rounded">
                </div>

                {{-- BARIS 2 --}}
                <div class="grid grid-cols-5 gap-4">
                    <img src="/images/galeri/{{ $item['folder'] }}/5.jpg" class="col-span-2 h-32 w-full object-cover rounded">
                    <img src="/images/galeri/{{ $item['folder'] }}/6.jpg" class="col-span-1 h-32 w-full object-cover rounded">
                    <img src="/images/galeri/{{ $item['folder'] }}/7.jpg" class="col-span-1 h-32 w-full object-cover rounded">
                    <img src="/images/galeri/{{ $item['folder'] }}/8.jpg" class="col-span-1 h-32 w-full object-cover rounded">
                </div>

            </div>
        </div>
        @endforeach

    </div>
</section>

@endsection
