<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'V-LAB')</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Tailwind v4 via Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Lucide --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
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



</body>

</html>
