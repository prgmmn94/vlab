<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'V-LAB')</title>

    {{-- Tailwind v4 via Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Lucide --}}
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="font-sans text-gray-800 bg-white antialiased">

    {{-- NAVBAR --}}
    @include('partials.navbar')

    {{-- PAGE CONTENT --}}
    {{-- pt-20 biar konten gak ketiban navbar sticky --}}
    <main class="pt-0">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-[#0F0F0F] text-gray-400 pt-40">

        <div class="max-w-full mx-auto px-6 grid gap-10 pb-20
                    md:grid-cols-3">

            {{-- ABOUT --}}
            <div class="ps-20">
                <h4 class="text-white font-semibold mb-3 text-base">
                    Laboratorium Manajemen Menengah
                </h4>

                <p class="text-sm leading-relaxed pe-15">
                    Laboratorium Manajemen Menengah (Lab Mamen)
                    adalah unit kerja di Universitas Gunadarma
                    yang menyelenggarakan praktikum dan
                    pengembangan kompetensi mahasiswa.
                </p>
            </div>

            {{-- QUICK LINKS --}}
            <div>
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
            <div class="pe-25 justify-self-end ">
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
        <div class="border-t border-white/15 py-4 text-xs ps-25 text-[#DC9A39] py-10">
            © 2025 Laboratorium Manajemen Menengah. All rights reserved.
        </div>

    </footer>

    {{-- INIT LUCIDE (SATU KALI AJA) --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
    </script>

</body>
</html>
