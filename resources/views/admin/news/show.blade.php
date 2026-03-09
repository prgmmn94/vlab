<x-admin.layout>
    <div class="space-y-6">

        <div class="bg-blue-500 overflow-hidden shadow-md rounded-lg text-lg font-semibold mb-3 text-white">
            <div class="p-6 text-gray-100">
                Detail Berita
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-lg rounded-lg">

            {{-- Header dengan Gambar --}}
            @if ($news->gambar)
                <div class="w-full h-auto overflow-hidden bg-gray-100">
                    <img src="{{ asset('storage/' . $news->gambar) }}"
                        alt="{{ $news->judul }}"
                        class="w-full h-full object-cover">
                </div>
            @endif

            {{-- Content --}}
            <div class="p-6 space-y-6">

                {{-- Judul --}}
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">
                        {{ $news->judul }}
                    </h1>

                    <div class="flex items-center text-sm text-gray-500 gap-4">

                        {{-- Tanggal --}}
                        <div class="flex items-center gap-1">
                            <span>{{ \Carbon\Carbon::parse($news->tanggal)->format('d F Y') }}</span>
                        </div>

                        {{-- Author --}}
                        <div class="flex items-center gap-1">
                            <span>Admin</span>
                        </div>

                    </div>
                </div>

                <hr class="border-gray-200">

                {{-- Excerpt --}}
                @if ($news->excerpt)
                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
                    <p class="text-gray-700 italic">
                        {{ $news->excerpt }}
                    </p>
                </div>
                @endif

                {{-- Konten --}}
                <div class="prose max-w-none">
                    <div class="text-gray-700 text-base leading-relaxed whitespace-pre-line">
                        {{ $news->isi }}
                    </div>
                </div>

                <hr class="border-gray-200">

                {{-- Informasi Tambahan --}}
                <div class="bg-gray-50 rounded-lg p-4">
                    <h3 class="text-sm font-semibold text-gray-700 mb-3">Informasi</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">

                        <div>
                            <span class="text-gray-500">Dibuat pada:</span>
                            <span class="text-gray-900 font-medium ml-2">
                                {{ $news->created_at->format('d M Y') }}
                            </span>
                        </div>

                        <div>
                            <span class="text-gray-500">Terakhir diupdate:</span>
                            <span class="text-gray-900 font-medium ml-2">
                                {{ $news->updated_at->format('d M Y') }}
                            </span>
                        </div>

                    </div>
                </div>

                {{-- Action --}}
                <div class="flex items-center justify-between pt-4">
                    <a href="{{ route('admin.news.index') }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 hover:text-gray-900 rounded-md border border-gray-300 hover:bg-gray-50 transition">
                        ← Kembali
                    </a>
                </div>

            </div>
        </div>

    </div>
</x-admin.layout>