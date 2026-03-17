@extends('components.home.layout')

@section('content')
    <section class="py-16 lg:py-32 bg-[#ffffee] relative overflow-hidden min-h-screen">

        {{-- SVG Background Subtle Dots --}}
        <div class="absolute inset-0 w-full h-full pointer-events-none">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="dotgrid" x="0" y="0" width="24" height="24" patternUnits="userSpaceOnUse">
                        <circle cx="12" cy="12" r="1.2" fill="#8a5a5a" opacity="0.22" />
                    </pattern>
                    <pattern id="cross" x="0" y="0" width="48" height="48" patternUnits="userSpaceOnUse">
                        <line x1="24" y1="18" x2="24" y2="30" stroke="#8a5a5a"
                            stroke-width="0.5" opacity="0.2" />
                        <line x1="18" y1="24" x2="30" y2="24" stroke="#8a5a5a"
                            stroke-width="0.5" opacity="0.2" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#dotgrid)" />
                <rect width="100%" height="100%" fill="url(#cross)" />
            </svg>
        </div>

        <div class="container relative z-10">
            <div class="relative flex items-center justify-center min-h-[400px] md:min-h-[500px] lg:min-h-[560px]">

                {{-- Kiri atas --}}
                <div class="absolute rounded-lg overflow-hidden
                        w-20 h-16 md:w-28 md:h-24 lg:w-36 lg:h-28"
                    style="top: 5%; left: 2%;">
                    <img src="{{ asset('images/galeri/31/1.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>

                {{-- Tengah atas --}}
                <div class="absolute rounded-lg overflow-hidden
                        w-16 h-16 md:w-24 md:h-24 lg:w-32 lg:h-32"
                    style="top: 2%; left: 50%; transform: translateX(-50%);">
                    <img src="{{ asset('images/galeri/32/1.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>

                {{-- Kanan atas --}}
                <div class="absolute rounded-lg overflow-hidden
                        w-20 h-16 md:w-28 md:h-24 lg:w-36 lg:h-28"
                    style="top: 5%; right: 2%;">
                    <img src="{{ asset('images/galeri/32/1.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>

                {{-- Kiri bawah --}}
                <div class="absolute rounded-lg overflow-hidden
                        w-20 h-16 md:w-28 md:h-24 lg:w-36 lg:h-28"
                    style="bottom: 5%; left: 2%;">
                    <img src="{{ asset('images/galeri/32/1.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>

                {{-- Tengah bawah --}}
                <div class="absolute rounded-lg overflow-hidden
                        w-16 h-16 md:w-24 md:h-24 lg:w-32 lg:h-32"
                    style="bottom: 2%; left: 50%; transform: translateX(-50%);">
                    <img src="{{ asset('images/galeri/33/1.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>

                {{-- Kanan bawah --}}
                <div class="absolute rounded-lg overflow-hidden
                        w-20 h-16 md:w-28 md:h-24 lg:w-36 lg:h-28"
                    style="bottom: 5%; right: 2%;">
                    <img src="{{ asset('images/galeri/32/1.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>

                {{-- Teks tengah --}}
                <div class="relative z-10 text-center max-w-[180px] md:max-w-xs">
                    <h1 class="text-2xl md:text-3xl lg:text-4xl font-semibold leading-snug text-gray-800 mb-4"
                        style="font-family: 'Georgia', serif;">
                        Galeri MaMen
                    </h1>
                    <a href="#kategori-foto"
                        class="inline-block bg-[#5c2d2d] text-[#f5e6e6] px-5 py-2 md:px-6 md:py-2 rounded-full text-sm md:text-base hover:bg-[#7a3a3a] transition">
                        Mulai
                    </a>
                </div>

            </div>
        </div>
    </section>

    <section id="kategori-foto" class="py-16 lg:py-32 bg-[#5c2d2d]">
        <div class="container">
            <h1 class="text-6xl font-semibold leading-snug text-[#d9b3b3] mb-16 text-center"
                style="font-family: 'Georgia', serif;">
                Momen
            </h1>

            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @forelse ($photoEvents as $category)
                    <a href="{{ route('galeri.show', $category->slug) }}"
                        class="group relative rounded-xl overflow-hidden block" style="aspect-ratio: 3/4;">

                        {{-- Thumbnail --}}
                        @if ($category->thumbnail)
                            <img src="{{ asset('storage/' . $category->thumbnail) }}" alt="{{ $category->event_name }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @elseif ($category->photos->first())
                            <img src="{{ asset('storage/' . $category->photos->first()->image) }}"
                                alt="{{ $category->event_name }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @else
                            <div class="w-full h-full bg-[#3d1a1a]"></div>
                        @endif

                        {{-- Overlay --}}
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-[#1e0505dd] via-[#1e050520] to-transparent
                                    group-hover:from-[#1e0505ee] transition-all duration-300">
                        </div>

                        {{-- Info --}}
                        <div class="absolute bottom-0 left-0 right-0 p-4">
                            <p class="text-[10px] uppercase tracking-widest text-[#d9b3b3] opacity-80 mb-1">Kategori</p>
                            <p class="font-semibold text-[#f5e6e6] text-lg leading-tight mb-1"
                                style="font-family: 'Georgia', serif;">
                                {{ $category->event_name }}
                            </p>
                            <p class="text-xs text-[#c49898]">{{ $category->photos_count }} foto</p>
                            @if ($category->description)
                                <span
                                    class="inline-block mt-2 text-[10px] text-[#f5e6e6] bg-white/10 px-2 py-1 rounded-full">
                                    {{ Str::limit($category->description, 20) }}
                                </span>
                            @endif
                        </div>

                    </a>
                @empty
                    <p class="col-span-4 text-center text-[#d9b3b3] py-16">Belum ada kategori.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
