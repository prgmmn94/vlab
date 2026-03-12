<x-admin.layout>
    <div class="space-y-6">

        <div class="bg-yellow-600 text-white shadow-md rounded-lg">
            <div class="p-6 text-lg font-semibold">
                {{ __('Edit Jadwal') }}
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6">
            <form action="{{ route('admin.schedules.update', $schedule->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="space-y-12">
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        {{-- Region --}}
                        <div class="col-span-full">
                            <label for="region" class="block text-sm font-medium text-gray-700 mb-2">
                                Region <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-2 grid grid-cols-1">
                                <select id="region" name="region" required
                                    class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm">
                                    <option value="">-- Pilih Region --</option>
                                    <option value="Depok"
                                        {{ old('region', $schedule->region) == 'Depok' ? 'selected' : '' }}>Depok
                                    </option>
                                    <option value="Kalimalang"
                                        {{ old('region', $schedule->region) == 'Kalimalang' ? 'selected' : '' }}>
                                        Kalimalang</option>
                                    <option value="Salemba"
                                        {{ old('region', $schedule->region) == 'Salemba' ? 'selected' : '' }}>Salemba
                                    </option>
                                    <option value="Karawaci"
                                        {{ old('region', $schedule->region) == 'Karawaci' ? 'selected' : '' }}>Karawaci
                                    </option>
                                    <option value="Cengkareng"
                                        {{ old('region', $schedule->region) == 'Cengkareng' ? 'selected' : '' }}>
                                        Cengkareng</option>
                                </select>
                            </div>
                            @error('region')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Kelas --}}
                        <div class="col-span-full">
                            <label for="class" class="block text-sm font-medium text-gray-700 mb-2">
                                Kelas <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="class" id="class"
                                value="{{ old('class', $schedule->class) }}" required
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            @error('class')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-full">
                            <label for="lesson" class="block text-sm font-medium text-gray-700 mb-2">
                                Mata Praktikum <span class="text-red-500">*</span>
                            </label>

                            <input type="text" name="lesson" id="lesson"
                                value="{{ old('lesson', $schedule->lesson) }}" required
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">

                            @error('lesson')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Gambar Saat Ini --}}
                        @if ($schedule->image)
                            <div class="col-span-full">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini</label>
                                <div class="mt-2 flex items-start gap-4">
                                    <img src="{{ asset('storage/' . $schedule->image) }}"
                                        alt="Jadwal {{ $schedule->region }}"
                                        class="w-48 h-48 object-cover rounded-md border border-gray-300 cursor-pointer hover:opacity-80 transition"
                                        onclick="window.open('{{ asset('storage/' . $schedule->image) }}', '_blank')">
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-600 mb-2">{{ basename($schedule->image) }}</p>
                                        <p class="text-xs text-gray-500">Klik gambar untuk melihat ukuran penuh</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Upload Gambar Baru --}}
                        <div class="col-span-full">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                                Upload Gambar Baru (Opsional)
                            </label>
                            <input type="file" name="image" id="image" accept="image/*"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                onchange="previewImage(event)">
                            <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Max: 5MB. Biarkan kosong jika
                                tidak ingin mengubah gambar.</p>
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            {{-- Preview Gambar Baru --}}
                            <div id="imagePreview" class="mt-3 hidden">
                                <p class="text-sm font-medium text-gray-700 mb-2">Preview Gambar Baru:</p>
                                <img id="preview" src="" alt="Preview"
                                    class="max-w-xs h-auto rounded-md border border-gray-300">
                            </div>
                        </div>
                    </div>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                </div>

                {{-- Buttons --}}
                <div class="mt-8 flex items-center justify-between">
                    <a href="{{ route('admin.schedules.index') }}"
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
