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
    <footer class="bg-[#0F0F0F] text-gray-400 pt-20 md:pt-40">

        <div class="max-w-7xl mx-auto px-6 grid gap-10 pb-16 md:pb-20 grid-cols-1 md:grid-cols-3">

            {{-- ABOUT --}}
            <div class="md:ps-10">
                <h4 class="text-white font-semibold mb-3 text-base">
                    Laboratorium Manajemen Menengah
                </h4>

                <p class="text-sm leading-relaxed md:pe-10">
                    Laboratorium Manajemen Menengah (Lab Mamen)
                    adalah unit kerja di Universitas Gunadarma
                    yang menyelenggarakan praktikum dan
                    pengembangan kompetensi mahasiswa.
                </p>
            </div>

            {{-- QUICK LINKS --}}
            <div class="md:ps-10">
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
            <div class="md:justify-self-end md:pe-10 ">
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

        {{-- COPYRIGHT --}}
        <div class="border-t border-white/15 py-6 text-xs text-center md:text-left md:ps-16 text-[#DC9A39]">
            © 2025 Laboratorium Manajemen Menengah. All rights reserved.
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
