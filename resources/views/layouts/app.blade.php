<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'V-LAB')</title>

    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Tailwind v4 via Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Lucide --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>

<body class="font-sans text-gray-800 bg-white antialiased overflow-x-hidden">

    {{-- NAVBAR --}}
    @include('partials.navbar')

    {{-- PAGE CONTENT --}}
    {{-- pt-20 biar konten gak ketiban navbar sticky --}}
    <main class="pt-0">
        @yield('content')
    </main>

    {{-- LIGHTBOX --}}
<div id="lightbox" class="fixed inset-0 bg-black/90 hidden items-center justify-center z-50">
    <button id="closeLB" class="absolute top-6 right-8 text-white text-4xl">&times;</button>
    <button id="prevLB" class="absolute left-6 text-white text-4xl">&#10094;</button>
    <img id="lightboxImg" class="max-h-[85vh] max-w-[90vw] rounded-xl shadow-2xl">
    <button id="nextLB" class="absolute right-6 text-white text-4xl">&#10095;</button>
</div>

    {{-- FOOTER --}}
    <footer class="bg-[#0F0F0F] text-gray-400">

        {{-- VERSI MOBILE --}}
        <div class="md:hidden max-w-7xl mx-auto px-6 grid gap-8 pb-12 pt-16">
            {{-- ABOUT --}}
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center p-1.5 shadow-sm">
                        <img src="/images/logo.png" alt="logo" class="w-full h-full object-contain">
                    </div>
                    <h4 class="text-white font-bold text-lg leading-tight">
                        Lab<br><span class="text-purple-400">Manajemen Menengah</span>
                    </h4>
                </div>

                <p class="text-sm leading-relaxed text-gray-400">
                    Unit kerja di Universitas Gunadarma yang menyelenggarakan praktikum dan pengembangan kompetensi mahasiswa secara profesional.
                </p>
                
                <div class="flex gap-4 pt-2">
                    <a href="https://www.instagram.com/labmamen?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center hover:bg-purple-600 hover:text-white transition-colors">
                        <i data-lucide="instagram" class="w-4 h-4"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/laboratorium-manajemen-menengah/" class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center hover:bg-purple-600 hover:text-white transition-colors">
                        <i data-lucide="linkedin" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>

            {{-- QUICK LINKS --}}
            <div class="pt-4 border-t border-white/5">
                <h4 class="text-white font-semibold mb-4 text-base flex items-center gap-2">
                    <i data-lucide="link" class="w-4 h-4 text-purple-400"></i>
                    Tautan Cepat
                </h4>

                <ul class="space-y-3 text-sm">
                    <li>
                        <a href="#" class="group flex items-center gap-2 hover:text-white transition">
                            <i data-lucide="chevron-right" class="w-3 h-3 text-gray-600 group-hover:text-purple-400 transition-colors"></i>
                            Modul Praktikum
                        </a>
                    </li>
                    <li>
                        <a href="#" class="group flex items-center gap-2 hover:text-white transition">
                            <i data-lucide="chevron-right" class="w-3 h-3 text-gray-600 group-hover:text-purple-400 transition-colors"></i>
                            Kartu Praktikum
                        </a>
                    </li>
                    <li>
                        <a href="#" class="group flex items-center gap-2 hover:text-white transition">
                            <i data-lucide="chevron-right" class="w-3 h-3 text-gray-600 group-hover:text-purple-400 transition-colors"></i>
                            Download Software
                        </a>
                    </li>
                </ul>
            </div>

            {{-- CONTACT --}}
            <div class="w-full mt-4">
                <div class="bg-white/5 border border-white/10 rounded-2xl p-6">
                    <h4 class="text-white font-semibold mb-4 text-base flex items-center gap-2">
                        <i data-lucide="map-pin" class="w-4 h-4 text-purple-400"></i>
                        Kontak Kami
                    </h4>

                    <div class="space-y-4 text-sm">
                        <div class="flex gap-3 items-start">
                            <i data-lucide="building-2" class="w-4 h-4 mt-0.5 text-gray-500 shrink-0"></i>
                            <p class="leading-relaxed">Depok, Indonesia<br>Universitas Gunadarma</p>
                        </div>
                        <div class="flex gap-3 items-center">
                            <i data-lucide="phone" class="w-4 h-4 text-gray-500 shrink-0"></i>
                            <p>0873-xxxx-xxxx <span class="text-xs font-semibold px-2 py-0.5 rounded-full bg-white/10 ml-2">Depok</span></p>
                        </div>
                        <div class="flex gap-3 items-center">
                            <i data-lucide="phone-call" class="w-4 h-4 text-gray-500 shrink-0"></i>
                            <p>0873-xxxx-xxxx <span class="text-xs font-semibold px-2 py-0.5 rounded-full bg-white/10 ml-2">Kalimalang</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ========================================= --}}
        {{-- VERSI DESKTOP (Standar/Klasik)              --}}
        {{-- ========================================= --}}
        <div class="hidden md:grid max-w-7xl mx-auto px-6 gap-10 pb-20 pt-40 grid-cols-3">

            {{-- ABOUT --}}
            <div class="ps-10">
                <h4 class="text-white font-semibold mb-3 text-base">
                    Laboratorium Manajemen Menengah
                </h4>

                <p class="text-sm leading-relaxed pe-10">
                    Laboratorium Manajemen Menengah (Lab Mamen)
                    adalah unit kerja di Universitas Gunadarma
                    yang menyelenggarakan praktikum dan
                    pengembangan kompetensi mahasiswa.
                </p>
            </div>

            {{-- QUICK LINKS --}}
            <div class="ps-10">
                <h4 class="text-white font-semibold mb-3 text-base">
                    Tautan Cepat
                </h4>

                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white transition">Modul</a></li>
                    <li><a href="#" class="hover:text-white transition">Kartu Praktikum</a></li>
                    <li><a href="#" class="hover:text-white transition">Software</a></li>
                </ul>
            </div>

            {{-- CONTACT --}}
            <div class="justify-self-end pe-10">
                <h4 class="text-white font-semibold mb-3 text-base">
                    Kontak Kami
                </h4>

                <p class="text-sm leading-relaxed">
                    Depok, Indonesia<br>
                    0873-xxxx-xxxx (Depok)<br>
                    0873-xxxx-xxxx (Kalimalang)
                </p>
            </div>

        </div>

        {{-- COPYRIGHT (Milik Bersama) --}}
        <div class="border-t border-white/10 md:border-white/15 py-5 md:py-6">
            <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center md:items-start md:ps-16 justify-between md:justify-start gap-2 md:gap-0 text-xs text-center md:text-left text-[#DC9A39]">
                <div class="text-gray-500 md:text-[#DC9A39] flex items-center gap-1 md:block">
                    <span class="md:hidden">© 2025 Laboratorium Manajemen Menengah.</span>
                    <span class="hidden md:inline">© 2025 Laboratorium Manajemen Menengah. All rights reserved.</span>
                </div>
                <div class="md:hidden font-medium tracking-wide">
                    All rights reserved.
                </div>
            </div>
        </div>

    </footer>

    {{-- INIT LUCIDE (SATU KALI AJA) --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
    </script>

<script>
const images = document.querySelectorAll('.gallery-img');
const lightbox = document.getElementById('lightbox');
const lightboxImg = document.getElementById('lightboxImg');
const closeBtn = document.getElementById('closeLB');
const nextBtn = document.getElementById('nextLB');
const prevBtn = document.getElementById('prevLB');

let currentGroup = [];
let currentIndex = 0;

images.forEach(img => {
    img.addEventListener('click', () => {
        const groupName = img.dataset.group;
        currentGroup = Array.from(document.querySelectorAll(`.gallery-img[data-group="${groupName}"]`));
        currentIndex = currentGroup.indexOf(img);
        showImage();
        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
    });
});

function showImage() {
    lightboxImg.src = currentGroup[currentIndex].src;
}

nextBtn.onclick = () => {
    currentIndex = (currentIndex + 1) % currentGroup.length;
    showImage();
};

prevBtn.onclick = () => {
    currentIndex = (currentIndex - 1 + currentGroup.length) % currentGroup.length;
    showImage();
};

closeBtn.onclick = () => {
    lightbox.classList.add('hidden');
    lightbox.classList.remove('flex');
};

lightbox.addEventListener('click', e => {
    if (e.target === lightbox) closeBtn.click();
});
</script>



</body>
</html>
