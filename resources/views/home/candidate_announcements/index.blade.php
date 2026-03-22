@extends('components.home.layout')

@section('content')
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Header --}}
            <div class="text-center mb-12">
                <h1 class="text-4xl font-extrabold text-gray-900">
                    Pengumuman Rekrutmen
                </h1>
                <p class="text-gray-600 mt-3">
                    Informasi tahapan seleksi Calon Asisten & Programmer Laboratorium Manajemen Menengah.
                </p>
            </div>

            @forelse ($periods as $period)
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
                <div class="bg-gray-50 rounded-xl p-10 border text-center">
                    <svg class="mx-auto w-12 h-12 text-gray-300 mb-4" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path fill="currentColor" d="M18 11v2H6v-2zm0-4v2H6V7zm0 8v2H6v-2zM3 3h18v18H3z" />
                    </svg>
                    <p class="text-gray-500 font-medium">Belum ada pengumuman yang tersedia.</p>
                </div>
            @endforelse

        </div>
    </section>
@endsection
