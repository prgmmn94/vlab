<x-admin.layout>
    <div class="space-y-6">

        <div class="bg-blue-500 overflow-hidden shadow-md rounded-lg text-lg font-semibold mb-3 text-white">
            <div class="p-6 text-gray-100">
                Detail Berita
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-lg rounded-lg">
            {{-- Header dengan Gambar --}}
            @if ($news->image)
                <div class="w-full h-auto overflow-hidden bg-gray-100">
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                        class="w-full h-full object-cover">
                </div>
            @endif

            {{-- Content --}}
            <div class="p-6 space-y-6">
                {{-- Judul --}}
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">
                        {{ $news->title }}
                    </h1>
                    <div class="flex items-center text-sm text-gray-500 gap-4">
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 14q-.425 0-.712-.288T11 13t.288-.712T12 12t.713.288T13 13t-.288.713T12 14m-4 0q-.425 0-.712-.288T7 13t.288-.712T8 12t.713.288T9 13t-.288.713T8 14m8 0q-.425 0-.712-.288T15 13t.288-.712T16 12t.713.288T17 13t-.288.713T16 14m-4 4q-.425 0-.712-.288T11 17t.288-.712T12 16t.713.288T13 17t-.288.713T12 18m-4 0q-.425 0-.712-.288T7 17t.288-.712T8 16t.713.288T9 17t-.288.713T8 18m8 0q-.425 0-.712-.288T15 17t.288-.712T16 16t.713.288T17 17t-.288.713T16 18M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5z" />
                            </svg>
                            <span>{{ \Carbon\Carbon::parse($news->date_news)->format('d F Y') }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 12q-1.65 0-2.825-1.175T8 8t1.175-2.825T12 4t2.825 1.175T16 8t-1.175 2.825T12 12m-8 8v-2.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13t3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20z" />
                            </svg>
                            <span>Admin</span>
                        </div>
                    </div>
                </div>

                <hr class="border-gray-200">

                {{-- Konten --}}
                <div class="prose max-w-none">
                    <div class="text-gray-700 text-base leading-relaxed whitespace-pre-line">
                        {{ $news->content }}
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

                {{-- Action Buttons --}}
                <div class="flex items-center justify-between pt-4">
                    <a href="{{ route('admin.news.index') }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 hover:text-gray-900 rounded-md border border-gray-300 hover:bg-gray-50 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

    </div>
</x-admin.layout>
