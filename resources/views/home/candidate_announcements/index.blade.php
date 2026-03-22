@extends('components.home.layout')

@section('content')
    <section>
        <div class="container">

            @forelse ($periods as $period)
                {{-- Header --}}
                <div class="text-center mb-12">
                    <h1 class="text-4xl font-extrabold text-gray-900">
                        Pengumuman Rekrutmen
                    </h1>
                    <p class="text-gray-600 mt-3">
                        Informasi tahapan seleksi Calon Asisten & Programmer Laboratorium Manajemen Menengah.
                    </p>
                </div>

                <div class="mb-10">

                    {{-- Label Tahun --}}
                    <div class="flex items-center gap-4 mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">Periode {{ $period->tahun }}</h2>
                        @if ($period->is_active)
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                Aktif
                            </span>
                        @endif
                        <div class="flex-1 h-px bg-gray-200"></div>
                    </div>

                    @if ($period->announcements->isEmpty())
                        <div class="bg-gray-50 rounded-xl p-6 border text-center text-gray-500">
                            Belum ada pengumuman untuk periode ini.
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                            @foreach ($period->announcements as $announcement)
                                <div
                                    class="bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow duration-200 flex flex-col">

                                    {{-- Card Header --}}
                                    <div
                                        class="bg-gray-50 rounded-t-xl px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-purple-100 text-purple-700 flex items-center justify-center font-bold text-sm shrink-0">
                                                {{ $loop->iteration }}
                                            </div>
                                            <h3 class="font-semibold text-gray-900 text-sm leading-snug">
                                                {{ $announcement->nama_tahap }}
                                            </h3>
                                        </div>
                                    </div>

                                    {{-- Card Body --}}
                                    <div class="px-6 py-5 flex flex-col gap-4 flex-1">

                                        @if ($announcement->deskripsi)
                                            <p class="text-sm text-gray-600 leading-relaxed">
                                                {{ $announcement->deskripsi }}
                                            </p>
                                        @endif

                                        @if ($announcement->link_google_sheets)
                                            <a href="{{ $announcement->link_google_sheets }}" target="_blank" rel="noopener"
                                                class="mt-auto inline-flex items-center justify-center gap-2 w-full rounded-lg bg-indigo-600 hover:bg-indigo-500 px-4 py-2.5 text-sm font-semibold text-white transition-colors duration-150">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M12.05 17.625L9.225 20.45q-.575.575-1.412.575T6.4 20.45l-2.825-2.825Q3 17.05 3 16.2t.575-1.425l2.8-2.8V8.7q0-.675.613-.925T8.075 8l7.95 7.925q.475.475.213 1.088t-.938.612zm.85-2L8.375 11.1v1.7l-3.4 3.4L7.8 19.025l3.4-3.4zm4.05-8.6q-1.475-1.475-3.463-1.9T9.6 5.4q-.375.125-.762-.012t-.513-.513q-.15-.425.025-.812t.6-.538q2.425-.9 4.975-.363t4.45 2.438t2.438 4.488t-.388 5.037q-.15.4-.55.563t-.8-.013q-.375-.15-.513-.525t.013-.775q.7-1.9.275-3.887t-1.9-3.463m-1.4 1.425q.525.525.85 1.188t.45 1.387q.075.425-.213.75t-.712.325q-.4 0-.687-.275t-.388-.675q-.1-.35-.262-.675t-.438-.6t-.625-.462t-.725-.288q-.4-.1-.687-.375t-.338-.7t.325-.7t.85-.2q.725.125 1.4.45t1.2.85m-6.6 6.6" />
                                                </svg>
                                                Lihat Pengumuman
                                            </a>
                                        @else
                                            <div
                                                class="mt-auto inline-flex items-center justify-center gap-2 w-full rounded-lg bg-gray-100 px-4 py-2.5 text-sm font-medium text-gray-400 cursor-not-allowed">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2m1 15h-2v-2h2zm0-4h-2V7h2z" />
                                                </svg>
                                                Belum Tersedia
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @empty
                <section class="min-h-screen flex items-center justify-center py-16 px-6">
                    <div class="w-full max-w-md text-center">

                        {{-- Card --}}
                        <div class="relative bg-white border border-gray-100 rounded-2xl p-10 shadow-sm overflow-hidden">

                            {{-- Top dashed accent bar --}}
                            <div class="absolute top-0 left-0 right-0 h-[3px]"
                                style="background: repeating-linear-gradient(90deg, #534AB7 0px, #534AB7 24px, transparent 24px, transparent 30px); opacity: 0.6;">
                            </div>

                            {{-- Icon --}}
                            <div
                                class="relative w-[72px] h-[72px] mx-auto mb-6 flex items-center justify-center rounded-full bg-[#EEEDFE]">
                                {{-- Spinning dashed ring --}}
                                <div class="absolute inset-[-5px] rounded-full border border-dashed border-[#AFA9EC] animate-spin"
                                    style="animation-duration: 18s;"></div>
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#534AB7"
                                    stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                            </div>

                            {{-- Title --}}
                            <h1 class="font-extrabold text-3xl text-gray-900 mb-3 leading-tight">
                                Pengumuman
                                <span class="italic font-bold text-[#7F77DD]">Ditutup</span>
                            </h1>

                            {{-- Description --}}
                            <p class="text-sm text-gray-500 leading-relaxed mb-8 max-w-xs mx-auto">
                                Saat ini belum ada pengumuman yang dibuka. Pantau terus halaman ini untuk informasi
                                berikutnya.
                            </p>

                            {{-- Info Rows --}}
                            <div class="space-y-3 mb-8 text-left">

                                {{-- Row 2 --}}
                                <div class="flex items-start gap-3 bg-gray-50 border border-gray-100 rounded-xl px-4 py-3">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-[#EEEDFE] flex items-center justify-center shrink-0 text-[#534AB7]">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path
                                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1.24h3a2 2 0 0 1 2 1.72c.127.96.36 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.96a16 16 0 0 0 6 6l.95-.95a2 2 0 0 1 2.11-.45c.907.34 1.85.573 2.81.7A2 2 0 0 1 21.73 16.92z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-[11px] text-gray-400 font-medium mb-0.5">Butuh Informasi?</p>
                                        <p class="text-[13px] text-gray-800 font-medium">Hubungi <a href=""
                                                class="text-[#534AB7]">@labmamen</a></p>
                                    </div>
                                </div>

                            </div>

                            {{-- Divider --}}
                            <div class="border-t border-gray-100 mb-6"></div>

                            {{-- Primary Button --}}
                            <a href="{{ url('/') }}"
                                class="flex items-center justify-center gap-2 w-full py-3 px-5 bg-[#534AB7] hover:bg-[#3C3489] text-white text-sm font-semibold rounded-xl transition-all duration-150 active:scale-[0.99]">
                                Kembali ke Beranda
                            </a>

                        </div>
                    </div>
                </section>
            @endforelse

        </div>
    </section>
@endsection
