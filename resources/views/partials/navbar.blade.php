<nav class="sticky top-0 z-50 bg-white shadow-[0_30px_22px_rgba(0,0,0,0.12)]">
    <div class="max-w-full mx-auto px-35 py-1">
        <div class="h-15 flex items-center justify-between">

            {{-- LOGO --}}
            <div class="flex items-center gap-3">
                <img src="/images/logo.png" alt="Logo" class="w-10 h-10">
                <div class="text-xs font-bold leading-tight">
                    V-LAB MAMEN<br>
                    UNIVERSITAS GUNADARMA
                </div>
            </div>

            {{-- MENU --}}
            <ul class="flex items-center gap-8 text-xs font-medium">
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

                        $isActive = $path === '/'
                            ? request()->is('/')
                            : request()->is($path.'*');
                    @endphp

                    <li class="relative group"> 
                        <a href="{{ $hasSubmenu ? '#' : '/'.ltrim($path,'/') }}"
                           class="pb-2 flex items-center gap-1 transition
                           {{ $isActive ? 'font-bold text-gray-900' : 'text-gray-600 hover:text-gray-900' }}">
                            {{ $label }}

                            @if($hasSubmenu)
                                <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            @endif
                        </a>

                        {{-- GARIS KUNING --}}
                        @if ($isActive)
                            <span class="absolute left-1/2 -translate-x-1/2 bottom-0 h-[4px] w-10 bg-[#F5A623] rounded-full"></span>
                        @endif

                        {{-- DROPDOWN --}}
                        @if($hasSubmenu)
                            <div class="absolute left-[-15%] w-52 bg-white border border-gray-100 shadow-xl rounded-lg py-2
                                        opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0
                                        transition-all duration-300 z-[60]">

                                @foreach($data['submenu'] as $subLabel => $subPath)
                                    @php
                                        $isExternal = Str::startsWith($subPath, ['http://','https://']);
                                    @endphp

                                    <a href="{{ $isExternal ? $subPath : '/'.ltrim($subPath,'/') }}"
                                       {{ $isExternal ? 'target=_blank rel=noopener' : '' }}
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
