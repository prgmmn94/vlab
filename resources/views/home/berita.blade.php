@extends('layouts.app')

@section('title', 'Berita Terbaru')

@section('content')

<div class="bg-white min-h-screen w-full py-10 md:py-16 px-4 md:px-10 font-sans">
    <div class="max-w-4xl mx-auto">

        <div class="flex flex-col gap-8 md:gap-14">
            @foreach($beritaData as $berita)
                <a href="{{ url('/berita/'.$berita['slug']) }}" class="group block">
                    <div class="bg-white rounded-xl overflow-hidden shadow-[0_3px_12px_rgba(0,0,0,0.05)] hover:shadow-[0_8px_22px_rgba(113,38,138,0.12)] transition-all duration-300 border border-[#e5e5e5]">
                        
                        <div class="w-full h-44 md:h-60 overflow-hidden relative">
                            <img src="{{ asset('images/'.$berita['gambar']) }}" 
                                 alt="{{ $berita['judul'] }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/5 to-transparent"></div>
                        </div>

                        <div class="p-4 md:p-6">
                            <h2 class="text-lg md:text-2xl font-bold text-gray-900 mb-2 md:mb-3 group-hover:text-[#71268a] transition-colors leading-snug">
                                {{ $berita['judul'] }}
                            </h2>

                            <p class="text-gray-500 text-xs md:text-sm leading-relaxed mb-4 md:mb-6 line-clamp-3">
                                {{ $berita['excerpt'] }}
                            </p>

                            <div class="flex items-center justify-between border-t border-gray-100 pt-3 md:pt-4">
                                <div class="text-gray-400 text-[10px] md:text-xs font-medium flex items-center gap-1 md:gap-2">
                                    {{ $berita['tanggal'] }}
                                </div>

                                <div class="text-[#71268a] font-semibold text-xs md:text-sm flex items-center gap-1 group-hover:gap-2 transition-all">
                                    Selengkapnya →
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
