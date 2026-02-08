@extends('layouts.app')

@section('content')

<div class="bg-white min-h-screen w-full py-16 px-4 md:px-10 font-sans">
    <div class="max-w-3xl mx-auto">

        {{-- Tombol kembali --}}
        <a href="/berita" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-[#71268a] transition mb-10">
            ← Kembali ke Berita
        </a>

        {{-- Judul --}}
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight mb-6">
            {{ $berita['judul'] }}
        </h1>

        {{-- Info tanggal --}}
        <div class="text-gray-400 text-sm flex items-center gap-2 mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect width="18" height="18" x="3" y="4" rx="2"/>
                <line x1="16" x2="16" y1="2" y2="6"/>
                <line x1="8" x2="8" y1="2" y2="6"/>
                <line x1="3" x2="21" y1="10" y2="10"/>
            </svg>
            {{ $berita['tanggal'] }}
        </div>

        {{-- Gambar utama --}}
        <div class="w-full h-64 md:h-96 rounded-xl overflow-hidden shadow-md mb-10">
            <img src="{{ asset('images/' . $berita['gambar']) }}"
                 alt="{{ $berita['judul'] }}"
                 class="w-full h-full object-cover">
        </div>

        {{-- Isi berita --}}
        <article class="prose prose-gray max-w-none text-gray-700 leading-relaxed">
            {!! nl2br(e($berita['isi'])) !!}
        </article>

        {{-- Garis pemisah --}}
        <div class="border-t border-gray-100 my-16"></div>

        {{-- Berita lainnya --}}
        <h3 class="text-xl font-bold mb-6">Berita Lainnya</h3>

        <div class="grid md:grid-cols-2 gap-6">
            @foreach($beritaLainnya as $item)
                <a href="/berita/{{ $item['slug'] }}" class="group block">
                    <div class="flex gap-4 items-start p-4 rounded-lg border border-gray-100 hover:shadow-md transition">

                        <img src="{{ asset('images/' . $item['gambar']) }}"
                             class="w-24 h-20 object-cover rounded-md">

                        <div>
                            <h4 class="font-semibold text-gray-800 group-hover:text-[#71268a] transition line-clamp-2">
                                {{ $item['judul'] }}
                            </h4>
                            <p class="text-xs text-gray-400 mt-2">
                                {{ $item['tanggal'] }}
                            </p>
                        </div>

                    </div>
                </a>
            @endforeach
        </div>

    </div>
</div>

@endsection
