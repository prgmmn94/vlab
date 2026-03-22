@extends('components.home.layout')

@section('title', 'Kontak Kami')

@section('content')

    <div x-data="{ activeButton: '', visibleMap: 'depok' }" x-init="lucide.createIcons()">

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
                    <path fill="#ffffff" d="M0,96C240,40 480,140 720,90C960,40 1200,20 1440,80L1440,120 L0,120 Z" />
                </svg>
            </div>
        </section>

        <section class="bg-white py-8 lg:py-16">
            <div class="container grid md:grid-cols-2 gap-16">

                <div>
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-1.5 h-16 bg-purple-700 rounded"></div>
                        <h2 class="text-2xl font-extrabold">Informasi Kontak</h2>
                    </div>

                    <div class="space-y-8 text-sm text-gray-600">

                        {{-- LOKASI --}}
                        <div class="flex gap-5 items-start">
                            <div
                                class="w-12 h-12 bg-purple-100 text-purple-700 flex items-center justify-center rounded-2xl shrink-0 shadow-sm">
                                <i data-lucide="map-pin" class="w-6 h-6"></i>
                            </div>
                            <div class="flex-1">
                                <p class="font-bold text-gray-900 mb-3 text-base">Lokasi Kampus</p>
                                <div class="flex flex-wrap gap-2">
                                    <template
                                        x-for="campus in ['depok', 'kalimalang', 'cengkareng', 'karawaci', 'salemba']">
                                        <button
                                            @click="visibleMap = campus; document.getElementById('maps-section').scrollIntoView({behavior: 'smooth'})"
                                            class="bg-white text-gray-600 border-gray-200 hover:bg-purple-700 hover:text-white hover:border-purple-700 hover:shadow-md w-[110px] py-2.5 rounded-xl text-xs font-bold border transition-all duration-300 capitalize cursor-pointer text-center flex items-center justify-center">
                                            <span x-text="campus"></span>
                                        </button>
                                    </template>
                                </div>
                            </div>
                        </div>

                        {{-- TELEPON --}}
                        <div class="flex gap-4 items-start">
                            <div
                                class="w-12 h-12 bg-purple-100 text-purple-700 flex items-center justify-center rounded-xl p-2 shrink-0">
                                <i data-lucide="phone" class="w-5 h-5"></i>
                            </div>
                            <div class="w-full">
                                <p class="font-semibold text-gray-900 mb-3">Telepon</p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-3">
                                    <div class="flex items-center justify-between border-b border-gray-100 pb-2">
                                        <span class="text-gray-500 text-xs">Depok</span>
                                        <span class="font-semibold text-gray-800">0873-xxxx-xxxx</span>
                                    </div> <br>
                                    <div class="flex items-center justify-between border-b border-gray-100 pb-2">
                                        <span class="text-gray-500 text-xs">Kalimalang</span>
                                        <span class="font-semibold text-gray-800">0873-xxxx-xxxx</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- EMAIL --}}
                        <div class="flex gap-4 items-start">
                            <div
                                class="w-12 h-12 bg-purple-100 text-purple-700 flex items-center justify-center rounded-xl p-2">
                                <i data-lucide="instagram" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Instagram</p>
                                <a href="https://www.instagram.com/labmamen" target="_blank"
                                    class="text-purple-700 hover:underline">@labmamen</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-2xl p-2 shadow-xl hidden md:block">
                    <img src="images/3233.jpg" alt="" srcset="" class="w-full h-full object-cover rounded-2xl">
                </div>

            </div>
        </section>

        {{-- ================= MAP ================= --}}
        <section id="maps-section" class="bg-gray-50 py-8 lg:py-16">
            <div class="container">

                <div class="text-center mb-10">
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-3">Lokasi Kampus</h2>
                    <p class="text-gray-500 text-sm">Pilih lokasi kampus untuk melihat detail peta</p>
                </div>

                {{-- Navigation Tab --}}
                <div class="flex flex-wrap justify-center gap-3 mb-10">
                    <button @click="visibleMap = 'depok'; activeButton = 'depok'"
                        :class="visibleMap === 'depok' ? 'bg-purple-700 text-white shadow-lg scale-105' :
                            'bg-white text-gray-600 hover:bg-purple-50 border border-gray-200'"
                        class="px-6 py-2.5 rounded-full font-semibold text-sm transition-all duration-300">
                        Depok
                    </button>
                    <button @click="visibleMap = 'kalimalang'; activeButton = 'kalimalang'"
                        :class="visibleMap === 'kalimalang' ? 'bg-purple-700 text-white shadow-lg scale-105' :
                            'bg-white text-gray-600 hover:bg-purple-50 border border-gray-200'"
                        class="px-6 py-2.5 rounded-full font-semibold text-sm transition-all duration-300">
                        Kalimalang
                    </button>
                    <button @click="visibleMap = 'cengkareng'; activeButton = 'cengkareng'"
                        :class="visibleMap === 'cengkareng' ? 'bg-purple-700 text-white shadow-lg scale-105' :
                            'bg-white text-gray-600 hover:bg-purple-50 border border-gray-200'"
                        class="px-6 py-2.5 rounded-full font-semibold text-sm transition-all duration-300">
                        Cengkareng
                    </button>
                    <button @click="visibleMap = 'karawaci'; activeButton = 'karawaci'"
                        :class="visibleMap === 'karawaci' ? 'bg-purple-700 text-white shadow-lg scale-105' :
                            'bg-white text-gray-600 hover:bg-purple-50 border border-gray-200'"
                        class="px-6 py-2.5 rounded-full font-semibold text-sm transition-all duration-300">
                        Karawaci
                    </button>
                    <button @click="visibleMap = 'salemba'; activeButton = 'salemba'"
                        :class="visibleMap === 'salemba' ? 'bg-purple-700 text-white shadow-lg scale-105' :
                            'bg-white text-gray-600 hover:bg-purple-50 border border-gray-200'"
                        class="px-6 py-2.5 rounded-full font-semibold text-sm transition-all duration-300">
                        Salemba
                    </button>
                </div>

                {{-- Link Map --}}
                <div
                    class="bg-white p-3 rounded-[2rem] shadow-2xl border border-gray-100 relative w-full h-[400px] md:h-[500px] overflow-hidden">

                    {{-- Map Depok --}}
                    <div x-show="visibleMap === 'depok'" x-transition.opacity.duration.500ms
                        class="absolute inset-3 rounded-3xl overflow-hidden">
                        <iframe class="w-full h-full"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.304974072863!2d106.84158839999999!3d-6.3545526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec475427cefd%3A0xc4e7eee0f871687!2sUniversitas%20Gunadarma%20Kampus%20E%20-%20Depok!5e0!3m2!1sid!2sus!4v1773109311241!5m2!1sid!2sus"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    {{-- Map Kalimalang --}}
                    <div x-show="visibleMap === 'kalimalang'" x-transition.opacity.duration.500ms
                        class="absolute inset-3 rounded-3xl overflow-hidden" style="display: none;">
                        <iframe class="w-full h-full"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.110155731844!2d106.96554807732515!3d-6.249212977596131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698c5204032a97%3A0x7dd864ce65061cd8!2sUniversitas%20Gunadarma%20Kampus%20J1!5e0!3m2!1sid!2sus!4v1773109201533!5m2!1sid!2sus"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    {{-- Map Cengkareng --}}
                    <div x-show="visibleMap === 'cengkareng'" x-transition.opacity.duration.500ms
                        class="absolute inset-3 rounded-3xl overflow-hidden" style="display: none;">
                        <iframe class="w-full h-full"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.9518485684307!2d106.7328609747498!3d-6.1371718938497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1d5821b39347%3A0x8d2bbf732ee7597a!2sUniversitas%20Gunadarma!5e0!3m2!1sid!2sus!4v1773109413351!5m2!1sid!2sus"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    {{-- Map Karawaci --}}
                    <div x-show="visibleMap === 'karawaci'" x-transition.opacity.duration.500ms
                        class="absolute inset-3 rounded-3xl overflow-hidden" style="display: none;">
                        <iframe class="w-full h-full"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2379648806223!2d106.61299907475063!3d-6.232328993755822!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fc1acf84837d%3A0x6642a0008730b471!2sUniversitas%20Gunadarma%20Kampus%20K!5e0!3m2!1sid!2sus!4v1773109459179!5m2!1sid!2sus"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    {{-- Map Salemba --}}
                    <div x-show="visibleMap === 'salemba'" x-transition.opacity.duration.500ms
                        class="absolute inset-3 rounded-3xl overflow-hidden" style="display: none;">
                        <iframe class="w-full h-full"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5041525591164!2d106.84952017475037!3d-6.197017693790674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f468146eb42b%3A0xe44e7c8794de2787!2sUniversitas%20Gunadarma%20Kampus%20C!5e0!3m2!1sid!2sus!4v1773109358771!5m2!1sid!2sus"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                </div>

            </div>
        </section>

    </div>

@endsection
