<nav class="sticky top-0 z-50 w-full" x-data="{ open: false }">

    {{-- BARIS NAVBAR UTAMA (Logo & Hamburger) --}}
    <div class="relative z-[60] bg-white shadow-[0_4px_20px_rgba(0,0,0,0.05)] h-20">
        <div class="max-w-7xl mx-auto px-4 md:px-10 lg:px-20 h-full flex items-center justify-between">

            {{-- LOGO DESKTOP & MOBILE --}}
            <div class="flex items-center gap-3">
                <img src="/images/logo.png" alt="Logo" class="w-10 h-10">
                <div class="text-[10px] md:text-xs font-bold leading-tight uppercase tracking-tighter">
                    V-LAB MAMEN<br>
                    <span class="text-[#71268a]">UNIVERSITAS GUNADARMA</span>
                </div>
            </div>

            {{-- HAMBURGER BUTTON --}}
            <button @click="open = !open" class="md:hidden p-2 text-gray-800 transition-transform duration-300" :class="open ? 'rotate-180' : ''">
                {{-- Icon Hamburger --}}
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!open">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                {{-- Icon silang --}}
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="open">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            {{-- MENU DESKTOP --}}
            <ul class="hidden md:flex items-center gap-6 lg:gap-8 text-[11px] lg:text-xs font-bold">
                @php
                    use Illuminate\Support\Str;

                    $menus = [
                        'Beranda' => '/',
                        'Berita' => 'berita',
                        'Profil' => 'profil',
                        'Praktikum' => [
                            'path' => 'praktikum', 
                            'submenu' => [
                                'Tata Tertib' => 'praktikum/tata-tertib',
                                'Jadwal' => 'praktikum/jadwal',
                                'ILab' => 'https://praktikum.gunadarma.ac.id/login/index.php',
                            ]
                        ],
                        'Download' => 'download',
                        'Kontak' => 'kontak',
                        'Galeri' => 'galeri',
                    ];
                @endphp

                @foreach ($menus as $label => $data)
                    @php
                        $path = is_array($data) ? $data['path'] : $data;
                        $hasSubmenu = is_array($data) && isset($data['submenu']);
                        $isActive = $path === '/' ? request()->is('/') : request()->is($path.'*');
                    @endphp

                    <li class="relative group"> 
                        <a href="{{ $hasSubmenu ? '#' : '/'.ltrim($path,'/') }}"
                           class="pb-2 flex items-center gap-1 transition
                           {{ $isActive ? 'font-bold text-gray-900' : 'text-gray-600 hover:text-gray-900' }}">
                            {{ $label }}

                            {{-- Buat icon panah ke bawah (khusus submenu) --}}
                            @if($hasSubmenu)
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            @endif
                        </a>

                        {{-- GARIS KUNING --}}
                        @if ($isActive)
                            <span class="absolute left-0 bottom-0 h-[3px] w-full bg-[#F5A623] rounded-full"></span>
                        @endif

                        {{-- DROPDOWN DESKTOP --}}
                        @if($hasSubmenu)
                            <div class="absolute left-0 w-48 bg-white shadow-2xl rounded-xl py-3 mt-1
                                        opacity-0 invisible translate-y-3 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0
                                        transition-all duration-300 z-[60] border border-gray-50">

                                @foreach($data['submenu'] as $subLabel => $subPath)
                                    @php
                                        $isExternal = Str::startsWith($subPath, ['http://','https://']);
                                    @endphp

                                    <a href="{{ $isExternal ? $subPath : '/'.ltrim($subPath,'/') }}"
                                       {{ $isExternal ? 'target=_blank rel=noopener' : '' }}
                                       class="block px-5 py-2 text-[11px] text-gray-600 hover:bg-purple-50 hover:text-[#71268a] font-bold">
                                        {{ $subLabel }}
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>

            {{-- BACKDROP (Fungsi buat nutup pas klik area luar) --}}
            <div x-show="open" 
                 @click="open = false" 
                 x-transition.opacity.duration.300ms
                 class="fixed inset-0 top-20 bg-gray-900/30 backdrop-blur-sm z-[40] md:hidden cursor-pointer"
                 style="display: none;">
            </div>
            
            {{-- TAMPILAN MENU MOBILE --}}
            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-300 origin-top"
                 x-transition:enter-start="scale-y-0 opacity-0"
                 x-transition:enter-end="scale-y-100 opacity-100"
                 x-transition:leave="transition ease-in duration-200 origin-top"
                 x-transition:leave-start="scale-y-100 opacity-100"
                 x-transition:leave-end="scale-y-0 opacity-0"
                 class="absolute top-20 left-0 w-full bg-white z-[50] shadow-xl rounded-b-3xl border-t border-gray-100 md:hidden overflow-hidden"
                 style="display: none;">

                {{-- ISI DAFTAR MENU MOBILE --}}
                <div class="max-h-[75vh] overflow-y-auto px-6 py-6">
                    <ul class="space-y-1">
                        @foreach ($menus as $label => $data)
                            @php
                                $path = is_array($data) ? $data['path'] : $data;
                                $hasSubmenu = is_array($data) && isset($data['submenu']);
                                $isActive = $path === '/' ? request()->is('/') : request()->is($path.'*');
                                
                                // ICON SESUAI MENUNYA
                                $iconName = match($label) {
                                    'Beranda' => 'home',
                                    'Berita' => 'newspaper',
                                    'Profil' => 'users',
                                    'Praktikum' => 'book-open',
                                    'Download' => 'download',
                                    'Kontak' => 'phone',
                                    'Galeri' => 'image',
                                    default => 'circle'
                                };
                            @endphp

                            <li>
                                @if($hasSubmenu)
                                    {{-- TIPE MENU A: PUNYA SUBMENU (Contoh: Praktikum) --}}
                                    <details class="group [&_summary::-webkit-details-marker]:hidden" {{ $isActive ? 'open' : '' }}>
                                        <summary class="group flex items-center justify-between rounded-xl px-4 py-3 text-gray-500 hover:bg-gray-100 hover:text-gray-700 cursor-pointer">
                                            <div class="flex items-center gap-3">
                                                <i data-lucide="{{ $iconName }}" class="size-5 opacity-75"></i>
                                                <span class="text-sm font-medium">{{ $label }}</span>
                                            </div>
                                            
                                            {{-- Icon panah pas submenu diklik --}}
                                            <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                            </span>
                                        </summary>

                                        {{-- LIST SUBMENU MOBILE --}}
                                        <ul class="mt-1 space-y-1 px-3 border-l-2 border-purple-100 ml-6 mb-2">
                                            @foreach($data['submenu'] as $subLabel => $subPath)
                                            @php
                                                // Cek apakah link eksternal (seperti ILab)
                                                $isExternal = Str::startsWith($subPath, ['http://','https://']);
                                                
                                                // Cek apakah user sedang berada di URL submenu ini
                                                $isSubActive = !$isExternal && request()->is(ltrim($subPath, '/'));
                                            @endphp
                                                <li>
                                                    <a href="{{ $isExternal ? $subPath : '/'.ltrim($subPath,'/') }}" 
                                                    class="block rounded-lg px-4 py-2 text-sm font-medium transition-colors
                                                    {{ $isSubActive ? 'bg-purple-50 text-[#71268a]' : 'text-gray-500 hover:bg-gray-50' }}">
                                                        {{ $subLabel }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </details>
                                @else

                                    {{-- TIPE MENU B: LINK LANGSUNG (Contoh: Beranda, Berita, Kontak) --}}
                                    <a href="/{{ ltrim($path,'/') }}" @click="open = false" 
                                    class="flex items-center gap-3 rounded-xl px-4 py-3 transition-colors
                                    {{ $isActive ? 'bg-purple-50 text-[#71268a]' : 'text-gray-500 hover:bg-gray-50' }}">
                                        <i data-lucide="{{ $iconName }}" class="size-5 opacity-70"></i>
                                        <span class="text-sm font-medium">{{ $label }}</span>
                                    </a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>