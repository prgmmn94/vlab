@extends('components.home.layout')

@section('content')
    <section class="py-16 lg:py-32 bg-[#ffffee]">
        <div class="container">

            <div class="relative flex items-center justify-center min-h-[500px] overflow-hidden">

                <div class="absolute rounded-lg overflow-hidden w-28 h-24" style="top: 90px; left: calc(45% - 170px);">
                    <img src="{{ asset('images/galeri/31/1.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>

                <div class="absolute rounded-lg overflow-hidden w-24 h-28" style="top: 100px; left: calc(60% + 60px);">
                    <img src="{{ asset('images/galeri/32/1.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>

                <div class="absolute rounded-lg overflow-hidden w-24 h-24" style="top: 25px; left: calc(45%);">
                    <img src="{{ asset('images/galeri/32/1.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>

                <div class="absolute rounded-lg overflow-hidden w-28 h-24" style="bottom: 80px; left: calc(50% - 220px);">
                    <img src="{{ asset('images/galeri/32/1.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>

                <div class="absolute rounded-lg overflow-hidden w-24 h-28" style="bottom: 40px; left: calc(50% - 60px);">
                    <img src="{{ asset('images/galeri/33/1.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>

                <div class="absolute rounded-lg overflow-hidden w-24 h-24" style="bottom: 20px; left: calc(50% + 80px);">
                    <img src="{{ asset('images/galeri/32/1.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>

                <div class="relative z-10 text-center max-w-xs">
                    <h1 class="text-3xl font-semibold leading-snug text-gray-800 mb-4"
                        style="font-family: 'Georgia', serif;">
                        Galeri MaMen
                    </h1>
                    <a href=""
                        class="inline-block bg-[#5c2d2d] text-[#f5e6e6] px-6 py-2 rounded-full hover:bg-[#7a3a3a] transition">
                        Mulai
                    </a>
                </div>

            </div>

        </div>
    </section>

    <section class="py-8 lg:py-16 bg-[#5c2d2d]">
        <div class="container">
            <h1 class="text-6xl font-semibold leading-snug text-[#d9b3b3] mb-16 text-center"
                style="font-family: 'Georgia', serif;">
                Momen
            </h1>

            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @forelse ($categories as $category)
                    <a href="{{ route('galeri.show', $category->id) }}"
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
