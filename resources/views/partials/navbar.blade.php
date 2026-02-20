<nav class="sticky top-0 z-50 bg-white shadow-[0_10px_30px_rgba(0,0,0,0.05)]" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 md:px-10 lg:px-20">
        <div class="h-20 flex items-center justify-between">

            {{-- LOGO DESKTOP & MOBILE --}}
            <div class="flex items-center gap-3 relative z-[70]">
                <img src="/images/logo.png" alt="Logo" class="w-10 h-10">
                <div class="text-[10px] md:text-xs font-bold leading-tight uppercase tracking-tighter">
                    V-LAB MAMEN<br>
                    <span class="text-[#71268a]">UNIVERSITAS GUNADARMA</span>
                </div>
            </div>

            {{-- HAMBURGER BUTTON --}}
            <button @click="open = true" class="md:hidden p-2 text-gray-800 hover:text-[#71268a] transition-colors relative z-[70]">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16m-7 6h7"></path>
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

            {{-- TAMPILAN MENU MOBILE --}}
            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-x-full"
                 x-transition:enter-end="opacity-100 translate-x-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-x-0"
                 x-transition:leave-end="opacity-0 translate-x-full"
                 class="fixed inset-0 bg-white z-[100] md:hidden flex flex-col"
                 style="display: none;">
                
                {{-- HEADER MOBILE MENU (tampilan klo hamburger di klik)--}}
                <div class="h-20 px-4 flex items-center justify-between border-b border-gray-100">
                    <div class="flex items-center gap-3">
                        <img src="/images/logo.png" alt="Logo" class="w-10 h-10">
                        <div class="text-[10px] font-bold leading-tight uppercase tracking-tighter text-gray-900">
                            V-LAB MAMEN<br>
                            <span class="text-[#71268a]">UNIVERSITAS GUNADARMA</span>
                        </div>
                    </div>
                    
                    {{-- Tombol buat nutup navbar mobile --}}
                    <button @click="open = false" class="p-2 text-gray-800 hover:text-red-500 transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                {{-- ISI DAFTAR MENU MOBILE --}}
                <div class="flex-1 overflow-y-auto px-4 py-8 bg-white">
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
                                    {{-- Bisa diklik untuk lipat/buka ke bawah --}}
                                    <details class="group [&_summary::-webkit-details-marker]:hidden" {{ $isActive ? 'open' : '' }}>
                                        <summary class="group flex items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700 cursor-pointer transition-colors">
                                            <div class="flex items-center gap-2">
                                                <i data-lucide="{{ $iconName }}" class="size-5 opacity-75"></i>
                                                <span class="text-sm font-medium tracking-wide">{{ $label }}</span>
                                            </div>
                                            
                                            {{-- Icon panah pas submenu diklik --}}
                                            <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                            </span>
                                        </summary>

                                        {{-- LIST SUBMENU MOBILE --}}
                                        <ul class="mt-2 space-y-1 px-4 border-l border-gray-100 ml-6">
                                            @foreach($data['submenu'] as $subLabel => $subPath)
                                            @php
                                                // Cek apakah link eksternal (seperti ILab)
                                                $isExternal = Str::startsWith($subPath, ['http://','https://']);
                                                
                                                // Cek apakah user sedang berada di URL submenu ini
                                                $isSubActive = !$isExternal && request()->is(ltrim($subPath, '/'));
                                            @endphp
                                                <li>
                                                    <a href="{{ $isExternal ? $subPath : '/'.ltrim($subPath,'/') }}" 
                                                    {{ $isExternal ? 'target=_blank rel=noopener' : '' }}
                                                    @click="{{ $isExternal ? '' : 'open = false' }}"
                                                    class="block rounded-lg px-4 py-2 text-sm font-medium transition-colors
                                                    {{ $isSubActive ? 'bg-purple-50 text-[#71268a]' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700' }}">
                                                        {{ $subLabel }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </details>
                                @else

                                    {{-- TIPE MENU B: LINK LANGSUNG (Contoh: Beranda, Berita, Kontak) --}}
                                    {{-- Langsung pindah halaman saat diklik --}}
                                    <a href="/{{ ltrim($path,'/') }}" @click="open = false" 
                                    class="flex items-center gap-2 rounded-lg px-4 py-2 transition-colors
                                    {{ $isActive ? 'bg-purple-50 text-[#71268a]' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}">
                                        
                                        <i data-lucide="{{ $iconName }}" class="size-5 opacity-70 stroke-[1.5px]"></i>
                                        <span class="text-sm font-medium tracking-wide">{{ $label }}</span>
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