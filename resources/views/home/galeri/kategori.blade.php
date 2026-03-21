@extends('components.home.layout')

@section('content')

    <section id="kategori-foto" class="py-16 lg:py-32 bg-[#5c2d2d]">
        <div class="container">

            <section class="bg-[#5c2d2d]">
                <div class="container text-center">
                    <a href="{{ route('galeri.index') }}"
                        class="inline-flex items-center gap-1 text-[#d9b3b3] text-sm mb-6 opacity-80 hover:opacity-100 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <polyline points="15 18 9 12 15 6" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </section>

            <h1 class="momen-heading text-6xl font-semibold leading-snug text-[#d9b3b3] mb-16 text-center"
                style="font-family: 'Georgia', serif;">
                Momen
            </h1>

            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @forelse ($photoEvents as $category)
                    <a href="{{ route('galeri.show', $category->slug) }}"
                        class="galeri-card group relative rounded-xl overflow-hidden block" style="aspect-ratio: 3/4;">

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

                        <div
                            class="absolute inset-0 bg-gradient-to-t from-[#1e0505dd] via-[#1e050520] to-transparent
                                group-hover:from-[#1e0505ee] transition-all duration-300">
                        </div>

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

            @if ($photoEvents->hasPages())
                <div class="mt-12 flex justify-center">
                    <div class="flex items-center gap-2">

                        @if ($photoEvents->onFirstPage())
                            <span
                                class="px-4 py-2 rounded-full text-[#d9b3b3] opacity-40 cursor-not-allowed border border-[#7a3a3a]">
                                &laquo;
                            </span>
                        @else
                            <a href="{{ $photoEvents->previousPageUrl() }}"
                                class="px-4 py-2 rounded-full text-[#f5e6e6] border border-[#7a3a3a] hover:bg-[#7a3a3a] transition">
                                &laquo;
                            </a>
                        @endif

                        @foreach ($photoEvents->getUrlRange(1, $photoEvents->lastPage()) as $page => $url)
                            @if ($page == $photoEvents->currentPage())
                                <span class="px-4 py-2 rounded-full bg-[#f5e6e6] text-[#5c2d2d] font-semibold">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}"
                                    class="px-4 py-2 rounded-full text-[#f5e6e6] border border-[#7a3a3a] hover:bg-[#7a3a3a] transition">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach

                        @if ($photoEvents->hasMorePages())
                            <a href="{{ $photoEvents->nextPageUrl() }}"
                                class="px-4 py-2 rounded-full text-[#f5e6e6] border border-[#7a3a3a] hover:bg-[#7a3a3a] transition">
                                &raquo;
                            </a>
                        @else
                            <span
                                class="px-4 py-2 rounded-full text-[#d9b3b3] opacity-40 cursor-not-allowed border border-[#7a3a3a]">
                                &raquo;
                            </span>
                        @endif
                    </div>
                </div>
            @endif

        </div>
    </section>

@endsection
