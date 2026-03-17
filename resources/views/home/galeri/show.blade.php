@extends('components.home.layout')

@section('content')

    {{-- Header --}}
    <section class="py-12 lg:py-16 bg-[#5c2d2d] border-b border-white/10">
        <div class="container text-center">
            <a href="{{ route('galeri.index') }}"
                class="inline-flex items-center gap-1 text-[#d9b3b3] text-sm mb-6 opacity-80 hover:opacity-100 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <polyline points="15 18 9 12 15 6" />
                </svg>
                Kembali ke Galeri
            </a>
            <p class="text-[11px] tracking-[4px] uppercase text-[#c49898] font-sans mb-2">Kategori</p>
            <h1 class="text-4xl lg:text-5xl text-[#f5e6e6] font-normal mb-3" style="font-family:'Georgia',serif;">
                {{ $photoEvent->event_name }}
            </h1>
            <p class="text-[#c49898] text-sm font-sans">{{ $photos->total() }} foto</p>
        </div>
    </section>

    {{-- Masonry Grid --}}
    <section class="py-10 lg:py-16 bg-[#5c2d2d]">
        <div class="container">

            @if ($photos->isEmpty())
                <p class="text-center text-[#d9b3b3] py-16">Belum ada foto di event ini.</p>
            @else
                {{-- Grid masonry dengan columns CSS --}}
                <div class="columns-2 md:columns-3 lg:columns-4 gap-3 space-y-3 max-w-6xl mx-auto"
                    style="column-gap: 12px;">
                    @foreach ($photos as $photo)
                        <div class="break-inside-avoid mb-3 rounded-xl overflow-hidden relative group cursor-pointer"
                            onclick="openLightbox('{{ asset('storage/' . $photo->image) }}', '{{ $photo->caption }}')">

                            <img src="{{ asset('storage/' . $photo->image) }}"
                                alt="{{ $photo->caption ?? $photoEvent->event_name }}"
                                class="w-full h-auto object-cover transition-transform duration-500 group-hover:scale-105">

                            {{-- Overlay gradient --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-[#1e0505dd] via-transparent to-transparent
                                        opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>

                            {{-- Caption --}}
                            @if ($photo->caption)
                                <div
                                    class="absolute bottom-0 left-0 right-0 p-3
                                            opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <p class="text-[#f5e6e6] text-sm font-sans leading-snug">
                                        {{ $photo->caption }}
                                    </p>
                                </div>
                            @endif

                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                @if ($photos->hasPages())
                    <div class="mt-12 flex justify-center">
                        {{ $photos->links() }}
                    </div>
                @endif
            @endif

        </div>
    </section>

    {{-- Lightbox --}}
    <div id="lightbox" class="fixed inset-0 z-50 bg-black/90 hidden items-center justify-center p-4"
        onclick="closeLightbox()">
        <button class="absolute top-4 right-5 text-white/70 hover:text-white text-3xl font-light"
            onclick="closeLightbox()">&times;</button>
        <div class="relative max-w-4xl w-full" onclick="event.stopPropagation()">
            <img id="lightbox-img" src="" alt=""
                class="w-full h-auto max-h-[85vh] object-contain rounded-xl">
            <p id="lightbox-caption" class="text-center text-[#d9b3b3] text-sm mt-3 font-sans"></p>
        </div>
    </div>

    <script>
        function openLightbox(src, caption) {
            document.getElementById('lightbox-img').src = src;
            document.getElementById('lightbox-caption').textContent = caption ?? '';
            const lb = document.getElementById('lightbox');
            lb.classList.remove('hidden');
            lb.classList.add('flex');
        }

        function closeLightbox() {
            const lb = document.getElementById('lightbox');
            lb.classList.add('hidden');
            lb.classList.remove('flex');
            document.getElementById('lightbox-img').src = '';
        }

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') closeLightbox();
        });
    </script>

@endsection
