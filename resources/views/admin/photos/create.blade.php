<x-admin.layout>
    <div class="space-y-6">

        {{-- Breadcrumb --}}
        <div class="bg-white overflow-hidden shadow-md rounded-lg">
            <div class="p-4">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('admin.photo_events.index') }}"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                                Event Galeri
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <a href="{{ route('admin.photo_events.photos.index', $photoEvent->id) }}"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">
                                    {{ $photoEvent->event_name }}
                                </a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Upload Foto</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="bg-green-600 text-white shadow-md rounded-lg">
            <div class="p-6 text-lg font-semibold">
                Upload Foto - {{ $photoEvent->event_name }}
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6">
            <form action="{{ route('admin.photo_events.photos.store', $photoEvent->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="space-y-12">
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        {{-- Caption --}}
                        <div class="col-span-full">
                            <label for="caption" class="block text-sm font-medium text-gray-700 mb-2">
                                Caption (Opsional)
                            </label>
                            <input type="text" name="caption" id="caption" value="{{ old('caption') }}"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                placeholder="Deskripsi singkat foto...">
                            @error('caption')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Image Upload --}}
                        <div class="col-span-full">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                                Gambar Foto <span class="text-red-500">*</span>
                            </label>
                            <input type="file" name="image" id="image" accept="image/*" required
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                onchange="previewImage(event)">
                            <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Max: 5MB</p>
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            {{-- Preview --}}
                            <div id="imagePreview" class="mt-3 hidden">
                                <img id="preview" src="" alt="Preview"
                                    class="max-w-md h-auto rounded-md border border-gray-300">
                            </div>
                        </div>

                    </div>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                </div>
                <div class="mt-8 flex items-center justify-between">
                    <a href="{{ route('admin.photo_events.photos.index', $photoEvent->id) }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 hover:text-gray-900 rounded-md border border-gray-300 hover:bg-gray-50 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                    <div class="flex gap-2">
                        <button type="submit"
                            class="inline-flex rounded-md bg-green-600 px-6 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M21 7v12q0 .825-.587 1.413T19 21H5q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h12zm-6.875 10.125Q15 16.25 15 15t-.875-2.125T12 12t-2.125.875T9 15t.875 2.125T12 18t2.125-.875M6 10h9V6H6z" />
                            </svg>
                            Upload
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
