@extends('components.home.layout')

@section('content')
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
                    class="relative w-[72px] h-[72px] mx-auto mb-6 flex items-center justify-center rounded-full bg-green-100">
                    {{-- Spinning dashed ring --}}
                    <div class="absolute inset-[-5px] rounded-full border border-dashed border-[#7dbd94] animate-spin"
                        style="animation-duration: 18s;"></div>
                    <svg class="text-[#16A34A]" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                        stroke="#16A34A" stroke-width="1.75">
                        <path fill="currentColor"
                            d="m9.55 15.15l8.475-8.475q.3-.3.7-.3t.7.3t.3.713t-.3.712l-9.175 9.2q-.3.3-.7.3t-.7-.3L4.55 13q-.3-.3-.288-.712t.313-.713t.713-.3t.712.3z" />
                    </svg>
                </div>

                {{-- Title --}}
                <h1 class="font-extrabold text-3xl text-gray-900 mb-3 leading-tight">
                    Pendaftaran Berhasil!
                </h1>

                @if (session('success'))
                    <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 inline-block">
                        <p class="text-green-700 font-semibold">{{ session('success') }}</p>
                    </div>
                @endif

                {{-- Description --}}
                <p class="text-sm text-gray-500 leading-relaxed mb-8 max-w-xs mx-auto">
                    Terima kasih telah mendaftar. Data Anda telah berhasil tersimpan dan akan segera diproses oleh
                    tim kami.
                </p>

                {{-- Info Rows --}}
                <div class="space-y-3 mb-8 text-left">

                    {{-- Row 2 --}}
                    <div class="flex items-start gap-3 bg-gray-50 border border-gray-100 rounded-xl px-4 py-3">
                        <div
                            class="w-8 h-8 rounded-lg bg-[#EEEDFE] flex items-center justify-center shrink-0 text-[#534AB7]">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1.24h3a2 2 0 0 1 2 1.72c.127.96.36 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.96a16 16 0 0 0 6 6l.95-.95a2 2 0 0 1 2.11-.45c.907.34 1.85.573 2.81.7A2 2 0 0 1 21.73 16.92z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[11px] text-gray-400 font-medium mb-0.5">Butuh Informasi?</p>
                            <p class="text-[13px] text-gray-800 font-medium">Hubungi <a
                                    href="https://www.instagram.com/labmamen/" class="text-[#534AB7]">@labmamen</a></p>
                        </div>
                    </div>

                </div>

                {{-- Divider --}}
                <div class="border-t border-gray-100 mb-6"></div>

                {{-- Primary Button --}}
                <a href="{{ url('/pengumuman') }}"
                    class="flex items-center justify-center gap-2 w-full py-3 px-5 bg-[#F59E0B] hover:bg-[#D97706] text-white text-sm font-semibold rounded-xl transition-all duration-150 active:scale-[0.99]">
                    Pengumuman
                </a>

                <a href="{{ url('/') }}"
                    class="mt-6 flex items-center justify-center gap-2 w-full py-3 px-5 bg-[#534AB7] hover:bg-[#3C3489] text-white text-sm font-semibold rounded-xl transition-all duration-150 active:scale-[0.99]">
                    Kembali ke Beranda
                </a>

            </div>
        </div>
    </section>
@endsection
