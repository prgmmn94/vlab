<x-admin.layout>
    <div class="space-y-6">

        <div class="bg-yellow-600 text-white shadow-md rounded-lg">
            <div class="p-6 text-lg font-semibold">
                Edit Berita
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6">

            <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="space-y-12">

                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


                        {{-- Judul --}}
                        <div class="col-span-full">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Judul Berita *
                            </label>

                            <input type="text" name="judul" value="{{ old('judul', $news->judul) }}" required
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />

                            @error('judul')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror

                        </div>


                        {{-- Tanggal --}}
                        <div class="col-span-full">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Tanggal Berita
                            </label>

                            <input type="date" name="tanggal" value="{{ old('tanggal', $news->tanggal) }}"
                                class="block w-full md:w-1/3 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />

                            @error('tanggal')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror

                        </div>


                        {{-- Gambar --}}
                        <div class="col-span-full">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Gambar Berita
                            </label>

                            @if ($news->gambar)
                                <div class="mb-3">

                                    <p class="text-xs text-gray-600 mb-2">
                                        Gambar saat ini
                                    </p>

                                    <img src="{{ asset('storage/' . $news->gambar) }}"
                                        class="max-w-xs rounded-md border" />

                                </div>
                            @endif


                            <input type="file" name="gambar" accept="image/*"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer bg-gray-50" />

                            <p class="text-xs text-gray-500 mt-1">
                                Kosongkan jika tidak ingin mengganti gambar
                            </p>

                            @error('gambar')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror

                        </div>


                        {{-- Excerpt --}}
                        <div class="col-span-full">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Ringkasan Berita
                            </label>

                            <textarea name="excerpt" rows="3"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('excerpt', $news->excerpt) }}</textarea>

                            @error('excerpt')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror

                        </div>


                        {{-- Isi --}}
                        <div class="col-span-full">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Isi Berita *
                            </label>

                            <textarea name="isi" rows="10" required
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('isi', $news->isi) }}</textarea>

                            @error('isi')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror

                        </div>


                    </div>

                    <hr class="h-px my-8 bg-gray-300 border-0">

                </div>


                <div class="mt-8 flex items-center justify-between">

                    <a href="{{ route('admin.news.index') }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 border rounded-md hover:bg-gray-50">
                        ← Kembali
                    </a>

                    <button type="submit"
                        class="inline-flex rounded-md bg-yellow-600 px-6 py-2 text-sm font-medium text-white shadow-sm hover:bg-yellow-500">
                        Update Berita
                    </button>

                </div>

            </form>

        </div>
    </div>
</x-admin.layout>
