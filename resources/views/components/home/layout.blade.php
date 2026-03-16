<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'V-LAB | Laboratorium Manajemen Menengah')</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <!-- Alpine.js v3 -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Tailwind CSS via CDN -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />

    <style>
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .homeSwiper .swiper-button-next::after,
        .homeSwiper .swiper-button-prev::after {
            display: none;
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    @include('components.home.navbar')

    {{-- PAGE CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- LIGHTBOX --}}
    <div id="lightbox" class="fixed inset-0 bg-black/90 hidden items-center justify-center z-50">
        <button id="closeLB" class="absolute top-6 right-8 text-white text-4xl">&times;</button>
        <button id="prevLB" class="absolute left-6 text-white text-4xl">&#10094;</button>
        <img id="lightboxImg" class="max-h-[85vh] max-w-[90vw] rounded-xl shadow-2xl">
        <button id="nextLB" class="absolute right-6 text-white text-4xl">&#10095;</button>
    </div>

    <button onclick="liveChat()" id="livechat">
        <a href="https://www.instagram.com/labmamen/" target="_blank">
            <i data-lucide="instagram" class="w-10 h-10"></i></a>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>

    {{-- FOOTER --}}
    @include('components.home.footer')

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
                currentGroup = Array.from(document.querySelectorAll(
                    `.gallery-img[data-group="${groupName}"]`));
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

    <script>
        var swiper = new Swiper(".homeSwiper", {
            slidesPerView: 2,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                },
            },
        });
    </script>

    <script>
        var swiper = new Swiper(".profilSwiper", {
            slidesPerView: 2,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                },
            },
        });
    </script>

</body>

</html>
