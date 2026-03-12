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
                                Galeri
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span
                                    class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ $photoEvent->event_name }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="bg-blue-500 overflow-hidden shadow-md rounded-lg text-lg font-semibold text-white">
            <div class="p-6 text-gray-100">
                Galeri Foto: {{ $photoEvent->event_name }}
            </div>
        </div>

        {{-- Search Form --}}
        <div class="bg-white overflow-hidden shadow-md rounded-lg">
            <div class="p-6">
                <form method="GET" action="{{ route('admin.photo_events.photos.index', $photoEvent->id) }}"
                    class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-[1fr_auto] gap-3 items-end">
                        <div>
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-1">
                                Cari Caption
                            </label>
                            <input type="text" name="search" id="search" placeholder="Caption foto..."
                                value="{{ request('search') }}"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>

                        <div class="flex gap-2">
                            <button type="submit"
                                class="px-6 py-2 border border-blue-500 bg-blue-50 text-blue-600 hover:text-white hover:bg-blue-500 rounded-md font-semibold shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M9.5 16q-2.725 0-4.612-1.888T3 9.5t1.888-4.612T9.5 3t4.613 1.888T16 9.5q0 1.1-.35 2.075T14.7 13.3l5.6 5.6q.275.275.275.7t-.275.7t-.7.275t-.7-.275l-5.6-5.6q-.75.6-1.725.95T9.5 16m0-2q1.875 0 3.188-1.312T14 9.5t-1.312-3.187T9.5 5T6.313 6.313T5 9.5t1.313 3.188T9.5 14" />
                                </svg>
                            </button>
                            @if (request('search'))
                                <a href="{{ route('admin.photo_events.photos.index', $photoEvent->id) }}"
                                    class="px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md font-semibold shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 20q-3.35 0-5.675-2.325T4 12t2.325-5.675T12 4q1.725 0 3.3.712T18 6.75V4h2v7h-7V9h4.2q-.8-1.4-2.187-2.2T12 6Q9.5 6 7.75 7.75T6 12t1.75 4.25T12 18q1.925 0 3.475-1.1T17.65 14h2.1q-.7 2.65-2.85 4.325T12 20" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>

                    @if (request('search'))
                        <div class="flex items-center gap-2 flex-wrap">
                            <span class="text-sm text-gray-600">Filter aktif:</span>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                Pencarian: {{ request('search') }}
                                <a href="{{ route('admin.photo_events.photos.index', $photoEvent->id) }}"
                                    class="ml-2 text-blue-600 hover:text-blue-800">×</a>
                            </span>
                        </div>
                    @endif
                </form>
            </div>
        </div>

        {{-- Add Button --}}
        @if (Auth::user()->role === 'Super Admin' || Auth::user()->role === 'Admin')
            <div class="flex justify-end">
                <a href="{{ route('admin.photo_events.photos.create', $photoEvent->id) }}"
                    class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-md shadow-md">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Upload Foto
                </a>
            </div>
        @endif

        {{-- Photo Gallery with Bulk Delete --}}
        <div class="bg-white overflow-hidden shadow-md rounded-lg">
            <form method="POST" action="{{ route('admin.photo_events.photos.bulk-destroy', $photoEvent->id) }}">
                @csrf
                @method('DELETE')

                {{-- Bulk Action Bar --}}
                <div class="px-6 py-3 bg-gray-50 border-b border-gray-200 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <input type="checkbox" id="selectAll" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                        <label for="selectAll" class="text-sm font-medium text-gray-700">
                            Pilih Semua
                        </label>
                    </div>
                    <button type="submit" id="deleteSelectedBtn"
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-medium shadow-md inline-flex items-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed"
                        disabled onclick="return confirm('Apakah Anda yakin ingin menghapus foto yang dipilih?');">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
                        </svg>
                        Hapus <span id="selectedCount">0</span> Foto
                    </button>
                </div>

                {{-- Photo Grid --}}
                <div class="p-6">
                    @if ($photos->count() > 0)
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach ($photos as $photo)
                                <div class="relative group">
                                    {{-- Checkbox --}}
                                    <div class="absolute top-2 left-2 z-10">
                                        <input type="checkbox" name="photo_ids[]" value="{{ $photo->id }}"
                                            class="photo-checkbox w-5 h-5 text-blue-600 rounded focus:ring-blue-500 bg-white shadow-md">
                                    </div>

                                    {{-- Image --}}
                                    <div class="aspect-square rounded-lg overflow-hidden bg-gray-200">
                                        <img src="{{ asset('storage/' . $photo->image) }}"
                                            alt="{{ $photo->caption ?? 'Photo' }}"
                                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110 cursor-pointer"
                                            onclick="window.open('{{ asset('storage/' . $photo->image) }}', '_blank')">
                                    </div>

                                    {{-- Overlay Info --}}
                                    <div
                                        class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        @if ($photo->caption)
                                            <p class="text-white text-xs mb-2 line-clamp-2">{{ $photo->caption }}</p>
                                        @endif
                                        <div class="flex gap-2">
                                            <a href="{{ route('admin.photo_events.photos.edit', [$photoEvent->id, $photo->id]) }}"
                                                class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded text-xs text-center">
                                                Edit
                                            </a>
                                            <button type="button"
                                                onclick="if(confirm('Yakin hapus foto ini?')) { event.preventDefault(); document.getElementById('delete-form-{{ $photo->id }}').submit(); }"
                                                class="flex-1 bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-xs">
                                                Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                {{-- Hidden Delete Form --}}
                                <form id="delete-form-{{ $photo->id }}"
                                    action="{{ route('admin.photo_events.photos.destroy', [$photoEvent->id, $photo->id]) }}"
                                    method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="mt-2 text-sm text-gray-500">Belum ada foto</p>
                            <a href="{{ route('admin.photo_events.photos.create', $photoEvent->id) }}"
                                class="mt-4 inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-md shadow-md">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                Upload Foto Pertama
                            </a>
                        </div>
                    @endif
                </div>
            </form>

            {{-- Pagination --}}
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $photos->links() }}
            </div>
        </div>

        {{-- JavaScript for Bulk Selection --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const selectAllCheckbox = document.getElementById('selectAll');
                const photoCheckboxes = document.querySelectorAll('.photo-checkbox');
                const deleteSelectedBtn = document.getElementById('deleteSelectedBtn');
                const selectedCountSpan = document.getElementById('selectedCount');

                function updateSelectedCount() {
                    const checkedBoxes = document.querySelectorAll('.photo-checkbox:checked');
                    const count = checkedBoxes.length;
                    selectedCountSpan.textContent = count;
                    deleteSelectedBtn.disabled = count === 0;
                }

                selectAllCheckbox.addEventListener('change', function() {
                    photoCheckboxes.forEach(checkbox => {
                        checkbox.checked = this.checked;
                    });
                    updateSelectedCount();
                });

                photoCheckboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        const allChecked = Array.from(photoCheckboxes).every(cb => cb.checked);
                        const someChecked = Array.from(photoCheckboxes).some(cb => cb.checked);
                        selectAllCheckbox.checked = allChecked;
                        selectAllCheckbox.indeterminate = someChecked && !allChecked;
                        updateSelectedCount();
                    });
                });

                updateSelectedCount();
            });
        </script>

    </div>
</x-admin.layout>
