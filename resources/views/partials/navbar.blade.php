<nav
    class="sticky top-0 z-50 bg-white
           shadow-[0_2px_8px_rgba(0,0,0,0.08)]"
>
    <div class="max-w-7xl mx-auto px-6">
        <div class="h-20 flex items-center justify-between">

            {{-- LOGO --}}
            <div class="flex items-center gap-3">
                <img
                    src="/images/logo.png"
                    alt="Logo"
                    class="w-10 h-10"
                >

                <div class="text-xs font-bold leading-tight">
                    V-LAB MAMEN<br>
                    UNIVERSITAS GUNADARMA
                </div>
            </div>

            {{-- MENU --}}
            <ul class="flex items-center gap-8 text-sm font-medium">
                @php
                    $menus = [
                        'Beranda' => '/',
                        'Berita' => 'berita',
                        'Profil' => 'profil',
                        'Praktikum' => [
                        'path' => 'praktikum', 
                        'submenu' => [
                            'Tata Tertib' => 'praktikum/tata-tertib',
                            'Jadwal' => 'praktikum/jadwal',
                            ]
                        ],
                        'Download' => 'download',
                        'Kontak' => 'kontak',
                        'Galeri' => 'galeri',
                        ];
    @endphp

    @foreach ($menus as $label => $data)
        @php
            // Cek apakah menu ini punya submenu atau link biasa
            $path = is_array($data) ? $data['path'] : $data;
            $hasSubmenu = is_array($data) && isset($data['submenu']);
            
            $isActive = $path === '/'
                ? request()->is('/')
                : request()->is($path.'*');
        @endphp

        <li class="relative group"> 
            <a href="{{ $hasSubmenu ? '#' : '/'.ltrim($path,'/') }}"
               class="pb-2 flex items-center gap-1 transition
               {{ $isActive
                    ? 'font-bold text-gray-900'
                    : 'text-gray-600 hover:text-gray-900'
               }}">
                {{ $label }}
                @if($hasSubmenu)
                    {{-- Icon Panah Bawah Kecil --}}
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                @endif
            </a>

            {{-- GARIS KUNING --}}
            @if ($isActive)
                <span class="absolute left-1/2 -translate-x-1/2 bottom-0 h-[4px] w-10 bg-[#F5A623] rounded-full"></span>
            @endif

            {{-- DROPDOWN MENU --}}
            @if($hasSubmenu)
                <div class="absolute left-0 mt-0 w-48 bg-white border border-gray-100 shadow-xl rounded-lg py-2 
                            opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 
                            transition-all duration-300 z-[60]">
                    @foreach($data['submenu'] as $subLabel => $subPath)
                        <a href="/{{ ltrim($subPath,'/') }}" 
                           class="block px-4 py-2 text-sm text-gray-600 hover:bg-purple-50 hover:text-[#71268a] transition-colors">
                            {{ $subLabel }}
                        </a>
                    @endforeach
                </div>
            @endif
        </li>
    @endforeach
</ul>


        </div>
    </div>
</nav>