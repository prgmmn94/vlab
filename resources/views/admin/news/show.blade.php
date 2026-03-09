<x-admin.layout>
    <div class="space-y-6">

        <div class="bg-blue-600 text-white shadow-md rounded-lg">
            <div class="p-6 text-lg font-semibold">
                {{ __('Detail Berita') }}
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-lg rounded-lg">
            {{-- Header dengan Gambar --}}
            @if ($news->image)
                <div class="w-full h-96 overflow-hidden bg-gray-100">
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
                    <div class="flex gap-2">
                        <a href="{{ route('admin.news.edit', $news->id) }}"
                            class="inline-flex items-center px-4 py-2 bg-yellow-600 hover:bg-yellow-500 text-white font-medium rounded-md shadow-sm transition">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M5 19h1.425L16.2 9.225L14.775 7.8L5 17.575zm-1 2q-.425 0-.712-.288T3 20v-2.425q0-.4.15-.763t.425-.637L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.437.65T21 6.4q0 .4-.138.763t-.437.662l-12.6 12.6q-.275.275-.638.425t-.762.15zM19 6.4L17.6 5zm-3.525 2.125l-.7-.725L16.2 9.225z" />
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST" class="inline"
                            onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-500 text-white font-medium rounded-md shadow-sm transition">
                                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-admin.layout>
