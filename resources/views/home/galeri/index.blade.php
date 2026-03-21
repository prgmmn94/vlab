@extends('components.home.layout')

@section('content')
    <style>
        /* === Hero floating images === */
        @keyframes fadeSlideDown {
            from {
                opacity: 0;
                transform: translateY(-28px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeSlideUp {
            from {
                opacity: 0;
                transform: translateY(28px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeSlideLeft {
            from {
                opacity: 0;
                transform: translateX(28px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeSlideRight {
            from {
                opacity: 0;
                transform: translateX(-28px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeScaleIn {
            from {
                opacity: 0;
                transform: scale(0.88);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Hero image wrappers — mulai tersembunyi */
        .hero-img {
            opacity: 0;
        }

        .hero-img.top-left {
            animation: fadeSlideRight 0.7s ease forwards;
            animation-delay: 0.15s;
        }

        .hero-img.top-center {
            animation: fadeSlideDown 0.7s ease forwards;
            animation-delay: 0.25s;
        }

        .hero-img.top-right {
            animation: fadeSlideLeft 0.7s ease forwards;
            animation-delay: 0.15s;
        }

        .hero-img.bot-left {
            animation: fadeSlideRight 0.7s ease forwards;
            animation-delay: 0.35s;
        }

        .hero-img.bot-center {
            animation: fadeSlideUp 0.7s ease forwards;
            animation-delay: 0.45s;
        }

        .hero-img.bot-right {
            animation: fadeSlideLeft 0.7s ease forwards;
            animation-delay: 0.35s;
        }

        /* Teks tengah hero */
        .hero-text {
            opacity: 0;
            animation: fadeScaleIn 0.75s cubic-bezier(0.22, 1, 0.36, 1) forwards;
            animation-delay: 0.55s;
        }

        /* === Heading "Momen" === */
        @keyframes slideUpFade {
            from {
                opacity: 0;
                transform: translateY(32px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .momen-heading {
            opacity: 0;
            animation: slideUpFade 0.7s ease forwards;
            animation-delay: 0.1s;
        }

        /* === Kartu galeri — stagger via JS === */
        .galeri-card {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.55s ease, transform 0.55s ease;
        }

        .galeri-card.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <section class="py-16 lg:py-32 bg-[#ffffee] relative overflow-hidden min-h-screen">

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
                <div class="hero-img top-left absolute rounded-lg overflow-hidden
                    w-20 h-16 md:w-28 md:h-24 lg:w-36 lg:h-28"
                    style="top: 5%; left: 2%;">
                    <img src="{{ asset('images/galeri/31/1.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>

                {{-- Tengah atas --}}
                <div class="hero-img top-center absolute rounded-lg overflow-hidden
                    w-16 h-16 md:w-24 md:h-24 lg:w-32 lg:h-32"
                    style="top: 2%; left: 50%; transform: translateX(-50%);">
                    <img src="{{ asset('images/galeri/32/1.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>

                {{-- Kanan atas --}}
                <div class="hero-img top-right absolute rounded-lg overflow-hidden
                    w-20 h-16 md:w-28 md:h-24 lg:w-36 lg:h-28"
                    style="top: 5%; right: 2%;">
                    <img src="{{ asset('images/galeri/32/1.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>

                {{-- Kiri bawah --}}
                <div class="hero-img bot-left absolute rounded-lg overflow-hidden
                    w-20 h-16 md:w-28 md:h-24 lg:w-36 lg:h-28"
                    style="bottom: 5%; left: 2%;">
                    <img src="{{ asset('images/galeri/32/1.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>

                {{-- Tengah bawah --}}
                <div class="hero-img bot-center absolute rounded-lg overflow-hidden
                    w-16 h-16 md:w-24 md:h-24 lg:w-32 lg:h-32"
                    style="bottom: 2%; left: 50%; transform: translateX(-50%);">
                    <img src="{{ asset('images/galeri/33/1.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>

                {{-- Kanan bawah --}}
                <div class="hero-img bot-right absolute rounded-lg overflow-hidden
                    w-20 h-16 md:w-28 md:h-24 lg:w-36 lg:h-28"
                    style="bottom: 5%; right: 2%;">
                    <img src="{{ asset('images/galeri/32/1.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>

                {{-- Teks tengah --}}
                <div class="hero-text relative z-10 text-center max-w-[180px] md:max-w-xs">
                    <h1 class="text-2xl md:text-3xl lg:text-4xl font-semibold leading-snug text-gray-800 mb-4"
                        style="font-family: 'Georgia', serif;">
                        Galeri MaMen
                    </h1>
                    <a href="#kategori-foto"
                        class="inline-block bg-[#5c2d2d] text-[#f5e6e6] px-5 py-2 md:px-6 md:py-2 rounded-full hover:bg-[#7a3a3a] transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M11 16.175V5q0-.425.288-.712T12 4t.713.288T13 5v11.175l4.9-4.9q.3-.3.7-.288t.7.313q.275.3.287.7t-.287.7l-6.6 6.6q-.15.15-.325.213t-.375.062t-.375-.062t-.325-.213l-6.6-6.6q-.275-.275-.275-.687T4.7 11.3q.3-.3.713-.3t.712.3z" />
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <section id="kategori-foto" class="py-16 lg:py-32 bg-[#5c2d2d]">
        <div class="container">
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
                        </div>
                    </a>
                @empty
                    <p class="col-span-4 text-center text-[#d9b3b3] py-16">Belum ada kategori.</p>
                @endforelse
            </div>

            @if ($photoEvents->count() >= 4)
                <div class="mt-12 flex justify-center">
                    <a href="{{ route('galeri.kategori') }}"
                        class="inline-flex items-center gap-2 px-8 py-3 rounded-full border border-[#d9b3b3] text-[#f5e6e6] hover:bg-[#7a3a3a] transition text-sm font-medium">
                        Lihat Semua Momen
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z" />
                        </svg>
                    </a>
                </div>
            @endif

        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.galeri-card');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Tambahkan delay bertahap berdasarkan urutan kartu
                        const index = [...cards].indexOf(entry.target);
                        entry.target.style.transitionDelay = (index % 4) * 80 + 'ms';
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.12
            });

            cards.forEach(card => observer.observe(card));
        });
    </script>
@endsection
