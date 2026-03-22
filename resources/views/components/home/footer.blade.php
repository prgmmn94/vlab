<footer class="bg-[#0F0F0F] text-gray-400">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10 pb-12 pt-16">
            <!-- Logo & Deskripsi -->
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 md:w-14 md:h-14">
                        <img src="/images/logo.png" alt="logo" class="w-full h-full object-contain">
                    </div>
                    <h4 class="text-white font-bold text-base md:text-lg leading-tight">
                        Lab<br><span class="text-purple-400">Manajemen Menengah</span>
                    </h4>
                </div>

                <p class="text-xs md:text-sm leading-relaxed text-gray-400 max-w-sm">
                    Unit kerja di Universitas Gunadarma yang menyelenggarakan praktikum
                    dan pengembangan kompetensi mahasiswa secara profesional.
                </p>

                <div class="flex gap-3 md:gap-4 pt-2">
                    <a href="https://www.instagram.com/labmamen"
                        class="w-9 h-9 rounded-full bg-white/5 flex items-center justify-center hover:bg-purple-600 hover:text-white transition-colors">
                        <i data-lucide="instagram" class="w-4 h-4"></i>
                    </a>

                    <a href="https://www.linkedin.com/company/laboratorium-manajemen-menengah/"
                        class="w-9 h-9 rounded-full bg-white/5 flex items-center justify-center hover:bg-purple-600 hover:text-white transition-colors">
                        <i data-lucide="linkedin" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>

            <!-- Tautan Cepat -->
            <div class="pt-4 md:pt-0 border-t md:border-none border-white/5">
                <h4 class="text-white font-semibold mb-4 text-sm md:text-base flex items-center gap-2">
                    <i data-lucide="link" class="w-4 h-4 text-purple-400"></i>
                    Tautan Cepat
                </h4>

                <ul class="space-y-2.5 md:space-y-3 text-xs md:text-sm">
                    <li>
                        <a href="#" class="group flex items-center gap-2 hover:text-white transition">
                            <i data-lucide="chevron-right"
                                class="w-3 h-3 text-gray-600 group-hover:text-purple-400"></i>
                            Modul Praktikum
                        </a>
                    </li>

                    <li>
                        <a href="#" class="group flex items-center gap-2 hover:text-white transition">
                            <i data-lucide="chevron-right"
                                class="w-3 h-3 text-gray-600 group-hover:text-purple-400"></i>
                            Kartu Praktikum
                        </a>
                    </li>

                    <li>
                        <a href="#" class="group flex items-center gap-2 hover:text-white transition">
                            <i data-lucide="chevron-right"
                                class="w-3 h-3 text-gray-600 group-hover:text-purple-400"></i>
                            Download Software
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Kontak Kami -->
            <div class="pt-4 md:pt-0 border-t md:border-none border-white/5 md:col-span-2 lg:col-span-1">
                <div class="bg-white/5 border border-white/10 rounded-xl md:rounded-2xl p-5 md:p-6">
                    <h4 class="text-white font-semibold mb-4 text-sm md:text-base flex items-center gap-2">
                        <i data-lucide="map-pin" class="w-4 h-4 text-purple-400"></i>
                        Kontak Kami
                    </h4>
                    <div class="space-y-3 md:space-y-4 text-xs md:text-sm">
                        <div class="flex gap-3 items-start">
                            <i data-lucide="building-2" class="w-4 h-4 mt-0.5 text-gray-500 shrink-0"></i>
                            <p>Depok, Indonesia<br>Universitas Gunadarma</p>
                        </div>
                        <div class="flex gap-3 items-start md:items-center">
                            <i data-lucide="phone" class="w-4 h-4 mt-0.5 md:mt-0 text-gray-500 shrink-0"></i>
                            <p class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2">
                                <span>0873-xxxx-xxxx</span>
                                <span class="text-xs font-semibold px-2 py-0.5 rounded-full bg-white/10 w-fit">
                                    Depok
                                </span>
                            </p>
                        </div>
                        <div class="flex gap-3 items-start md:items-center">
                            <i data-lucide="phone" class="w-4 h-4 mt-0.5 md:mt-0 text-gray-500 shrink-0"></i>
                            <p class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2">
                                <span>0873-xxxx-xxxx</span>
                                <span class="text-xs font-semibold px-2 py-0.5 rounded-full bg-white/10 w-fit">
                                    Kalimalang
                                </span>
                            </p>
                        </div>
                        <div class="flex gap-3 items-start md:items-center">
                            <i data-lucide="instagram" class="w-4 h-4 mt-0.5 md:mt-0 text-gray-500 shrink-0"></i>
                            <p class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2">
                                <a href="https://www.instagram.com/labmamen" target="_blank" class="">@labmamen</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-white/5 py-6">
            <p class="text-center text-xs md:text-sm text-gray-500">
                &copy; {{ date('Y') }} Laboratorium Manajemen Menengah. Prog 32 - 33. All rights reserved.
            </p>
        </div>
    </div>
</footer>
