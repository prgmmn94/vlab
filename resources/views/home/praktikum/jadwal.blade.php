@extends('components.home.layout')

@section('title', 'Jadwal Praktikum')

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <div class="bg-gradient-to-b from-[#62286C] to-[#BF4ED2] min-h-screen font-sans text-gray-800 p-4 md:p-8">
        <div class="container">
            <div class="bg-white rounded-3xl md:rounded-[40px] shadow-2xl p-6 md:p-14 overflow-hidden">

                <div class="text-center mb-10 md:mb-16">
                    <h1 class="text-2xl md:text-3xl font-black uppercase tracking-tighter text-gray-800">
                        Jadwal Praktikum
                    </h1>

                    <h2 class="text-lg md:text-2xl font-black uppercase text-gray-800">
                        Laboratorium Manajemen Menengah
                    </h2>

                    {{-- <p class="text-gray-500 font-bold mt-1 text-sm md:text-base">
                        Periode PTA 2025/2026
                    </p> --}}
                </div>


                @foreach ($dataSchedule as $lokasi => $items)
                    <div class="mb-14 md:mb-20 relative group">

                        <div
                            class="flex items-center gap-2 md:gap-3 mb-6 md:mb-8 border-l-[4px] md:border-l-[6px] border-[#71268a] pl-3 md:pl-4">
                            <h3 class="text-lg md:text-2xl font-black uppercase text-gray-800 tracking-tight">
                                {{ strtoupper($lokasi) }}
                            </h3>
                        </div>


                        <div class="swiper mySwiper-{{ Str::slug($lokasi) }} px-2 md:px-4 py-4">

                            <div class="swiper-wrapper">

                                @foreach ($items as $item)
                                    <div class="swiper-slide h-auto">

                                        <div
                                            class="bg-white rounded-2xl md:rounded-[30px] p-5 md:p-6 shadow-[0_10px_40px_rgba(0,0,0,0.06)] border border-gray-50 flex flex-col items-center h-full">

                                            <h4
                                                class="text-[#4c1d95] font-black text-center text-[16px] md:text-[14px] mb-4 uppercase tracking-tight leading-none min-h-[2.5rem] flex items-center justify-center">
                                                {{ $item->lesson }}
                                            </h4>

                                            <div
                                                class="bg-[#F5A623] text-white text-[14px] md:text-[12px] font-black px-6 md:px-8 py-1.5 rounded-full mb-6 shadow-sm">
                                                {{ $item->class }}
                                            </div>


                                            <div
                                                class="w-full mt-auto rounded-xl overflow-hidden border border-gray-200 group/img relative">

                                                <a data-fslightbox="item-{{ $lokasi }}-{{ $loop->index }}"
                                                    href="{{ asset('storage/' . $item->image) }}">

                                                    <img src="{{ asset('storage/' . $item->image) }}"
                                                        alt="Jadwal {{ $item->class }}"
                                                        class="w-full h-auto object-cover hover:scale-110 transition-transform duration-500 cursor-zoom-in">

                                                    <div
                                                        class="absolute inset-0 bg-black/20 opacity-0 group-hover/img:opacity-100 transition-opacity flex items-center justify-center">
                                                    </div>

                                                </a>

                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div>


                            <div
                                class="swiper-button-next-{{ Str::slug($lokasi) }} hidden md:flex absolute right-[-15px] top-1/2 -translate-y-1/2 z-10 w-10 h-10 bg-white shadow-lg rounded-full items-center justify-center text-[#71268a] cursor-pointer border border-gray-100">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </div>

                            <div
                                class="swiper-button-prev-{{ Str::slug($lokasi) }} hidden md:flex absolute left-[-15px] top-1/2 -translate-y-1/2 z-10 w-10 h-10 bg-white shadow-lg rounded-full items-center justify-center text-[#71268a] cursor-pointer border border-gray-100">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M15 19l-7-7 7-7">
                                    </path>
                                </svg>
                            </div>

                        </div>

                    </div>
                @endforeach


            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fslightbox/3.0.9/index.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            @foreach ($dataSchedule as $lokasi => $items)

                new Swiper('.mySwiper-{{ Str::slug($lokasi) }}', {
                    slidesPerView: 1.2,
                    spaceBetween: 30,
                    watchOverflow: true,
                    grabCursor: true,

                    navigation: {
                        nextEl: '.swiper-button-next-{{ Str::slug($lokasi) }}',
                        prevEl: '.swiper-button-prev-{{ Str::slug($lokasi) }}',
                    },

                    breakpoints: {
                        640: {
                            slidesPerView: 2
                        },
                        1024: {
                            slidesPerView: 3
                        },
                        1280: {
                            slidesPerView: 4
                        }
                    }

                });
            @endforeach

        });
    </script>


    <style>
        .swiper-button-disabled {
            opacity: 0 !important;
            pointer-events: none;
        }

        .swiper {
            overflow: visible !important;
        }
    </style>

@endsection
