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
            'Praktikum' => 'praktikum',
            'Download' => 'download',
            'Kontak' => 'kontak',
            'Galeri' => 'galeri',
        ];
    @endphp

    @foreach ($menus as $label => $path)
        @php
            $isActive = $path === '/'
                ? request()->is('/')
                : request()->is($path.'*');
        @endphp

        <li class="relative">
            <a href="/{{ ltrim($path,'/') }}"
               class="pb-2 block transition
               {{ $isActive
                    ? 'font-bold text-gray-900'
                    : 'text-gray-600 hover:text-gray-900'
               }}">
                {{ $label }}
            </a>

            {{-- GARIS KUNING --}}
            @if ($isActive)
                <span
                    class="absolute left-1/2 -translate-x-1/2
                           bottom-0 h-[4px] w-10
                           bg-[#F5A623] rounded-full">
                </span>
            @endif
        </li>
    @endforeach

</ul>


        </div>
    </div>
</nav>