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
        html {
            scroll-behavior: smooth;
        }

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

        @keyframes pulse-ring {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(88, 29, 116, 0.35);
            }

            50% {
                box-shadow: 0 0 0 6px rgba(88, 29, 116, 0);
            }
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(6px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-pulse-ring {
            animation: pulse-ring 1.8s ease-in-out infinite;
        }

        .animate-fade-up {
            animation: fadeUp .25s ease both;
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

    <script>
        const data = {
            asisten: [{
                    num: 1,
                    title: 'Registrasi Akun & Pengisian Data',
                    desc: 'Peserta membuat akun pada website, melengkapi data pribadi, serta mengunggah dokumen yang dipersyaratkan seperti foto, KTM, dan transkrip nilai.',
                    status: 'upcoming',
                },
                {
                    num: 2,
                    title: 'Validasi Data',
                    desc: 'Asisten laboratorium melakukan pengecekan menyeluruh terhadap kebenaran dan kelengkapan data serta dokumen yang telah diunggah peserta.',
                    status: 'upcoming',
                },
                {
                    num: 3,
                    title: 'Tes Tahap 1 – Ujian Tertulis (Daring)',
                    desc: 'Peserta mengikuti ujian daring yang mencakup pengetahuan dasar perbankan, pengetahuan umum, dan kemampuan analisis.',
                    status: 'upcoming',
                },
                {
                    num: 4,
                    title: 'Tes Tahap 2 – Tes Tutor & Wawancara',
                    desc: 'Peserta melaksanakan tes tutor sesuai bidang yang dipilih, dilanjutkan dengan sesi wawancara awal untuk menilai kemampuan mengajar.',
                    status: 'upcoming',
                },
                {
                    num: 5,
                    title: 'Tes Tahap 3 – Wawancara Staf',
                    desc: 'Peserta yang berhasil lolos tahap sebelumnya akan menjalani wawancara langsung dengan staf senior laboratorium.',
                    status: 'upcoming',
                },
                {
                    num: 6,
                    title: 'Pengumuman Hasil',
                    desc: 'Peserta yang dinyatakan lulus akan diumumkan secara resmi dan berhak bergabung sebagai Asisten di Laboratorium Manajemen Menengah.',
                    status: 'upcoming',
                },
            ],
            programmer: [{
                    num: 1,
                    title: 'Registrasi Akun & Pengisian Data',
                    desc: 'Peserta membuat akun pada website, melengkapi data pribadi, serta mengunggah dokumen yang dipersyaratkan seperti foto, KTM, dan portofolio proyek.',
                    status: 'upcoming',
                },
                {
                    num: 2,
                    title: 'Validasi Data',
                    date: '5 Nov – 7 Nov 2025',
                    desc: 'Asisten laboratorium melakukan pengecekan menyeluruh terhadap kebenaran dan kelengkapan data serta dokumen yang telah diunggah peserta.',
                    status: 'upcoming',
                },
                {
                    num: 3,
                    title: 'Tes Tahap 1 – Ujian Tertulis (Daring)',
                    desc: 'Peserta mengikuti ujian daring yang mencakup pengetahuan dasar pemrograman, logika, dan pengetahuan umum teknologi informasi.',
                    status: 'upcoming',
                },
                {
                    num: 4,
                    title: 'Tes Tahap 2 – Tes Programmer & Wawancara',
                    desc: 'Peserta menjalani tes teknis pemrograman secara langsung, kemudian dilanjutkan dengan wawancara untuk menggali kemampuan dan pengalaman coding.',
                    status: 'upcoming',
                },
                {
                    num: 5,
                    title: 'Tes Tahap 3 – Wawancara Staf',
                    desc: 'Peserta yang lolos tahap sebelumnya akan menjalani wawancara akhir dengan staf senior laboratorium untuk penilaian menyeluruh.',
                    status: 'upcoming',
                },
                {
                    num: 6,
                    title: 'Pengumuman Hasil',
                    desc: 'Peserta yang dinyatakan lulus akan diumumkan secara resmi dan berhak bergabung sebagai Programmer di Laboratorium Manajemen Menengah.',
                    status: 'upcoming',
                },
            ],
        };

        let currentRole = 'asisten';
        let currentStep = null;

        function switchRole(role) {
            currentRole = role;
            currentStep = null;

            const btnAsisten = document.getElementById('btn-asisten');
            const btnProgrammer = document.getElementById('btn-programmer');

            if (role === 'asisten') {
                btnAsisten.className =
                    'px-6 py-2 rounded-full text-sm font-medium border transition-all duration-200 bg-purple-800 text-white border-purple-800';
                btnProgrammer.className =
                    'px-6 py-2 rounded-full text-sm font-medium border border-gray-300 bg-white text-gray-500 transition-all duration-200 hover:bg-gray-50';
            } else {
                btnProgrammer.className =
                    'px-6 py-2 rounded-full text-sm font-medium border transition-all duration-200 bg-purple-800 text-white border-purple-800';
                btnAsisten.className =
                    'px-6 py-2 rounded-full text-sm font-medium border border-gray-300 bg-white text-gray-500 transition-all duration-200 hover:bg-gray-50';
            }

            renderSteps();
            selectStep(2);
        }

        function renderSteps() {
            const list = document.getElementById('step-list');
            const steps = data[currentRole];
            list.innerHTML = '';

            const line = document.createElement('div');
            line.className = 'absolute left-[11px] top-3 bottom-3 w-px bg-gray-200';
            list.appendChild(line);

            steps.forEach((s, i) => {
                const isSelected = currentStep === i;

                const item = document.createElement('div');
                item.className = 'flex items-start gap-3 mb-4 cursor-pointer';
                item.onclick = () => selectStep(i);

                const dot = document.createElement('div');
                let dotClass =
                    'flex-shrink-0 w-[22px] h-[22px] rounded-full flex items-center justify-center relative z-10 mt-0.5 transition-all duration-200 ';
                if (s.status === 'done') dotClass += 'bg-gray-300';
                else if (s.status === 'active') dotClass += 'bg-purple-800 animate-pulse-ring';
                else dotClass += 'bg-transparent border-2 border-purple-800';
                if (isSelected) dotClass += ' ring-4 ring-purple-200';
                dot.className = dotClass;

                if (s.status === 'done') {
                    dot.innerHTML =
                        `<svg width="10" height="10" viewBox="0 0 10 10"><path d="M2 5l2.5 2.5L8 3" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>`;
                } else {
                    const numColor = s.status === 'active' ? 'text-white' : 'text-purple-800';
                    dot.innerHTML = `<span class="text-[9px] font-semibold ${numColor}">${s.num}</span>`;
                }

                const body = document.createElement('div');
                body.className = 'flex-1 min-w-0';

                const inner = document.createElement('div');
                inner.className = 'rounded-xl px-3 py-2.5 border transition-all duration-200 ' +
                    (isSelected ? 'bg-purple-50 border-purple-700' : 'bg-transparent border-transparent');

                const titleColor = s.status === 'done' ?
                    'text-gray-400' :
                    (isSelected || s.status === 'active') ? 'text-purple-800' : 'text-gray-800';

                inner.innerHTML = `
                <p class="text-xs font-medium leading-snug ${titleColor}">${s.title}</p>
            `;

                body.appendChild(inner);
                item.appendChild(dot);
                item.appendChild(body);
                list.appendChild(item);
            });
        }

        function selectStep(i) {
            currentStep = i;
            const s = data[currentRole][i];
            const roleLabel = currentRole === 'asisten' ? 'Asisten' : 'Programmer';
            renderSteps();

            const badge = document.getElementById('detail-badge');
            badge.textContent = `Tahap ${s.num} · ${roleLabel}`;
            badge.className = 'inline-block text-xs font-medium px-3 py-1 rounded-full mb-3 ' +
                (s.status === 'active' ? 'bg-purple-100 text-purple-800' : 'bg-gray-100 text-gray-500');

            const titleEl = document.getElementById('detail-title');
            titleEl.classList.remove('animate-fade-up');
            void titleEl.offsetWidth;
            titleEl.textContent = s.title;
            titleEl.classList.add('animate-fade-up');

            document.getElementById('detail-desc').textContent = s.desc;
        }

        function nextStep() {
            const steps = data[currentRole];
            const next = currentStep === null ? 0 : Math.min(currentStep + 1, steps.length - 1);
            selectStep(next);
        }

        function prevStep() {
            if (currentStep === null) return;
            selectStep(Math.max(currentStep - 1, 0));
        }

        renderSteps();
        selectStep(2);
    </script>

</body>

</html>
