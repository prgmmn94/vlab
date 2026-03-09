<x-admin.layout>
    <div class="space-y-6">

        <div class="bg-yellow-600 text-white shadow-md rounded-lg">
            <div class="p-6 text-lg font-semibold">
                {{ __('Edit Berita') }}
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6">
            <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-12">
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                Judul Berita <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}"
                                required
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-full">
                            <label for="date_news" class="block text-sm font-medium text-gray-700 mb-2">
                                Tanggal Berita
                            </label>
                            <input type="date" name="date_news" id="date_news"
                                value="{{ old('date_news', $news->date_news) }}"
                                class="block w-full md:w-1/3 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            @error('date_news')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-full">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                                Gambar Berita
                            </label>

                            {{-- Gambar Saat Ini --}}
                            @if ($news->image)
                                <div class="mb-3">
                                    <p class="text-xs text-gray-600 mb-2">Gambar saat ini:</p>
                                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                        class="max-w-xs h-auto rounded-md border border-gray-300">
                                </div>
                            @endif

                            <input type="file" name="image" id="image" accept="image/*"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                onchange="previewImage(event)">
                            <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Max: 2MB. Kosongkan jika tidak
                                ingin mengubah gambar.</p>
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            {{-- Preview Gambar Baru --}}
                            <div id="imagePreview" class="mt-3 hidden">
                                <p class="text-xs text-gray-600 mb-2">Preview gambar baru:</p>
                                <img id="preview" src="" alt="Preview"
                                    class="max-w-xs h-auto rounded-md border border-gray-300">
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                                Konten Berita <span class="text-red-500">*</span>
                            </label>
                            <textarea name="content" id="content" rows="10" required
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('content', $news->content) }}</textarea>
                            @error('content')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                </div>
                <div class="mt-8 flex items-center justify-between">
                    <a href="{{ route('admin.news.index') }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 hover:text-gray-900 rounded-md border border-gray-300 hover:bg-gray-50 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                    <div class="flex gap-2">
                        <button type="submit"
                            class="inline-flex rounded-md bg-yellow-600 px-6 py-2 text-sm font-medium text-white shadow-sm hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M5 19h1.425L16.2 9.225L14.775 7.8L5 17.575zm-1 2q-.425 0-.712-.288T3 20v-2.425q0-.4.15-.763t.425-.637L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.437.65T21 6.4q0 .4-.138.763t-.437.662l-12.6 12.6q-.275.275-.638.425t-.762.15zM19 6.4L17.6 5zm-3.525 2.125l-.7-.725L16.2 9.225z" />
                            </svg>
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- JavaScript for Image Preview --}}
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('imagePreview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                previewContainer.classList.add('hidden');
            }
        }
    </script>
</x-admin.layout>
