<x-admin.layout>
    <div class="space-y-6">

        <div class="bg-blue-500 overflow-hidden shadow-md rounded-lg text-lg font-semibold mb-3 text-white">
            <div class="p-6 text-gray-100">
                Detail Berita
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-lg rounded-lg">
            @if ($news->image)
                 <div class="w-full h-auto overflow-hidden bg-gray-100">
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                        class="w-full h-full object-cover">
                </div>
            @endif
            <div class="p-6">

                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">
                        {{ $news->judul }}
                    </h1>
                    <div class="flex items-center text-sm text-gray-500 gap-4">
                        <div class="flex items-center gap-1">
                            <span>{{ $news->created_at->format('d M Y H:i') }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span>Admin</span>
                        </div>
                    </div>
                </div>

                <hr class="h-px my-8 bg-gray-300 border-0">

                @if ($news->excerpt)
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
                        <p class="text-gray-700 italic">
                            {{ $news->excerpt }}
                        </p>
                    </div>
                @endif
                <div class="prose max-w-none">
                    <div class="text-gray-700 text-base leading-relaxed whitespace-pre-line">
                        {{ $news->content }}
                    </div>
                </div>

                <hr class="h-px my-8 bg-gray-300 border-0">

                <div class="bg-gray-50 rounded-lg p-4">
                    <h3 class="text-sm font-semibold text-gray-700 mb-3">Informasi Sistem</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="text-gray-500">Dibuat pada:</span>
                            <span class="text-gray-900 font-medium">
                                {{ $news->created_at->format('d M Y H:i') }}
                            </span>
                        </div>
                        <div>
                            <span class="text-gray-500">Terakhir diupdate:</span>
                            <span class="text-gray-900 font-medium">
                                {{ $news->updated_at->format('d M Y H:i') }}
                            </span>
                        </div>
                    </div>
                </div>

                <hr class="h-px my-8 bg-gray-300 border-0">

                <div class="mt-8 flex items-center justify-between">
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
