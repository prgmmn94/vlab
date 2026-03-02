@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')

{{-- ================= HERO ================= --}}
<section class="relative pt-20 pb-28 text-white overflow-hidden"
style="background:linear-gradient(to bottom,#62286C,#BF4ED2)">

    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">
        <h1 class="text-4xl font-extrabold mb-4 tracking-wide">
            Hubungi Kami
        </h1>
        <p class="text-white/80 text-sm max-w-xl mx-auto">
            Punya pertanyaan, butuh informasi praktikum, atau ingin bekerja sama?
            Tim Laboratorium Manajemen Menengah siap membantu.
        </p>
    </div>

    {{-- WAVE BAWAH HERO --}}
    <div class="absolute bottom-0 left-0 w-full">
        <svg viewBox="0 0 1440 120" class="w-full h-[120px]" preserveAspectRatio="none">
            <path fill="#ffffff"
                d="M0,96
                   C240,40 480,140 720,90
                   C960,40 1200,20 1440,80
                   L1440,120 L0,120 Z"/>
        </svg>
    </div>
</section>



{{-- ================= KONTAK + FORM ================= --}}
<section class="bg-white py-24 pb-20">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-16">

        {{-- INFO KONTAK --}}
        <div>
            <div class="flex items-center gap-4 mb-8">
                <div class="w-1.5 h-16 bg-purple-700 rounded"></div>
                <h2 class="text-2xl font-extrabold">Informasi Kontak</h2>
            </div>

          <div class="space-y-8 text-sm text-gray-600">

    <div class="flex gap-4 items-start">
        <div class="w-12 h-12 bg-purple-100 text-purple-700 flex items-center justify-center rounded-xl p-2">
            <i data-lucide="map-pin" class="w-5 h-5"></i>
        </div>
        <div>
            <p class="font-semibold text-gray-900">Lokasi</p>
            <p>Universitas Gunadarma, Depok & Kalimalang</p>
        </div>
    </div>

    <div class="flex gap-4 items-start">
        <div class="w-12 h-12 bg-purple-100 text-purple-700 flex items-center justify-center rounded-xl p-2">
            <i data-lucide="phone" class="w-5 h-5"></i>
        </div>
        <div>
            <p class="font-semibold text-gray-900">Telepon</p>
            <p>0873-xxxx-xxxx (Depok)<br>0873-xxxx-xxxx (Kalimalang)</p>
        </div>
    </div>

    <div class="flex gap-4 items-start">
        <div class="w-12 h-12 bg-purple-100 text-purple-700 flex items-center justify-center rounded-xl p-2">
            <i data-lucide="mail" class="w-5 h-5"></i>
        </div>
        <div>
            <p class="font-semibold text-gray-900">Email</p>
            <p>labmamen@gunadarma.ac.id</p>
        </div>
    </div>

</div>


        </div>


        {{-- FORM PESAN --}}
        <div class="bg-gray-50 rounded-2xl p-8 shadow-xl">
            <h3 class="font-bold text-lg mb-6">Kirim Pesan</h3>

            <form class="space-y-5">

                <div>
                    <label class="text-xs font-semibold text-gray-500">Nama Lengkap</label>
                    <input type="text"
                        class="w-full mt-1 px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-purple-500 outline-none text-sm">
                </div>

                <div>
                    <label class="text-xs font-semibold text-gray-500">Email</label>
                    <input type="email"
                        class="w-full mt-1 px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-purple-500 outline-none text-sm">
                </div>

                <div>
                    <label class="text-xs font-semibold text-gray-500">Pesan</label>
                    <textarea rows="4"
                        class="w-full mt-1 px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-purple-500 outline-none text-sm"></textarea>
                </div>

                <button type="submit"
                    class="w-full py-3 bg-purple-700 text-white rounded-lg font-semibold hover:bg-purple-800 transition">
                    Kirim Pesan
                </button>

            </form>
        </div>

    </div>
</section>



{{-- ================= MAP ================= --}}
<section class="bg-gray-100 py-24 pt-20 pb-20">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-2xl font-extrabold mb-8">Lokasi Kami</h2>

       <div class="w-full max-w-2xl mx-auto rounded-2xl overflow-hidden shadow-lg border border-gray-200">
    <div class="relative w-full" style="padding-bottom:32%;">
        <iframe
            class="absolute top-0 left-0 w-full h-full"
            src="https://www.google.com/maps?q=Universitas+Gunadarma+Kampus+E&output=embed"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>

    </div>
</section>

@endsection
