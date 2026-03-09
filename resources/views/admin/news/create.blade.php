<x-admin.layout>
    <div class="space-y-6">

        <div class="bg-green-600 text-white shadow-md rounded-lg">
            <div class="p-6 text-lg font-semibold">
                Tambah Berita
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6">

            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="space-y-12">

                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


                        {{-- Judul --}}
                        <div class="col-span-full">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Judul Berita *
                            </label>

                            <input type="text" name="judul" value="{{ old('judul') }}" required
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

                            <input type="date" name="tanggal" value="{{ old('tanggal', $today) }}"
                                class="block w-full md:w-1/3 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />

                            <p class="text-xs text-gray-500 mt-1">
                                Default: hari ini
                            </p>

                            @error('tanggal')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror

                        </div>


                        {{-- Gambar --}}
                        <div class="col-span-full">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Gambar Berita *
                            </label>

                            <input type="file" name="gambar" accept="image/*" required
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer bg-gray-50"
                                onchange="previewImage(event)" />

                            <p class="text-xs text-gray-500 mt-1">
                                Format: JPG, PNG, GIF
                            </p>

                            @error('gambar')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror


                            <div id="imagePreview" class="mt-3 hidden">
                                <img id="preview" class="max-w-xs rounded-md border" />
                            </div>

                        </div>


                        {{-- Excerpt --}}
                        <div class="col-span-full">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Ringkasan Berita
                            </label>

                            <textarea name="excerpt" rows="3"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('excerpt') }}</textarea>

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
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('isi') }}</textarea>

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
                        class="inline-flex rounded-md bg-green-600 px-6 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-500">
                        Simpan
                    </button>

                </div>

            </form>

        </div>
    </div>



    <script>
        function previewImage(event) {

            const file = event.target.files[0]

            const preview = document.getElementById('preview')

            const previewContainer = document.getElementById('imagePreview')

            if (file) {

                const reader = new FileReader()

                reader.onload = function(e) {

                    preview.src = e.target.result

                    previewContainer.classList.remove('hidden')

                }

                reader.readAsDataURL(file)

            } else {

                previewContainer.classList.add('hidden')

            }

        }
    </script>


</x-admin.layout>
