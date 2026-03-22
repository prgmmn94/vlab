<x-admin.layout>
    <div class="space-y-6">

        {{-- Breadcrumb --}}
        <div class="bg-white overflow-hidden shadow-md rounded-lg">
            <div class="p-4">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('recruitment_periods.index') }}"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                                Periode Rekrutmen
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">
                                    Pengumuman {{ $recruitmentPeriod->tahun }}
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        {{-- Header --}}
        <div class="bg-blue-500 overflow-hidden shadow-md rounded-lg text-lg font-semibold text-white">
            <div class="p-6 text-gray-100">
                Pengumuman Rekrutmen {{ $recruitmentPeriod->tahun }}
            </div>
        </div>

        {{-- Tombol Tambah --}}
        <div class="flex justify-end">
            <a href="{{ route('admin.recruitment_periods.announcements.create', $recruitmentPeriod) }}"
                class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-md shadow-md">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Tahap
            </a>
        </div>

        {{-- Tabel --}}
        <div class="bg-white overflow-hidden shadow-md rounded-lg">
            @if ($announcements->isEmpty())
                <div class="px-6 py-10 text-center">
                    <svg class="mx-auto w-10 h-10 text-gray-300 mb-3" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path fill="currentColor" d="M18 11v2H6v-2zm0-4v2H6V7zm0 8v2H6v-2zM3 3h18v18H3z" />
                    </svg>
                    <p class="text-gray-500 font-medium">Belum ada pengumuman untuk periode ini.</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-10">
                                    ☰
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Tahap
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Link Google Sheets
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Deskripsi
                                </th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="sortableBody">
                            @foreach ($announcements as $i => $announcement)
                                <tr class="hover:bg-gray-50" data-id="{{ $announcement->id }}">
                                    {{-- Drag handle --}}
                                    <td class="px-4 py-4 text-center text-gray-400 cursor-grab drag-handle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M9 20q-.825 0-1.412-.587T7 18t.588-1.412T9 16t1.413.588T11 18t-.587 1.413T9 20m6 0q-.825 0-1.412-.587T13 18t.588-1.412T15 16t1.413.588T17 18t-.587 1.413T15 20m-6-6q-.825 0-1.412-.587T7 12t.588-1.412T9 10t1.413.588T11 12t-.587 1.413T9 14m6 0q-.825 0-1.412-.587T13 12t.588-1.412T15 10t1.413.588T17 12t-.587 1.413T15 14M9 8q-.825 0-1.412-.587T7 6t.588-1.412T9 4t1.413.588T11 6t-.587 1.413T9 8m6 0q-.825 0-1.412-.587T13 6t.588-1.412T15 4t1.413.588T17 6t-.587 1.413T15 8" />
                                        </svg>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                        {{ $announcement->nama_tahap }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if ($announcement->link_google_sheets)
                                            <a href="{{ $announcement->link_google_sheets }}" target="_blank"
                                                rel="noopener"
                                                class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 hover:underline">
                                                Buka Link
                                            </a>
                                        @else
                                            <span class="text-gray-400">—</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">
                                        {{ $announcement->deskripsi ?: '—' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        @if ($announcement->is_published)
                                            <span
                                                class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                                Aktif
                                            </span>
                                        @else
                                            <span
                                                class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                                Nonaktif
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">

                                        {{-- Toggle Publish --}}
                                        <form method="POST"
                                            action="{{ route('admin.recruitment_periods.announcements.toggle-publish', [$recruitmentPeriod, $announcement]) }}"
                                            class="inline">
                                            @csrf @method('PATCH')
                                            <button type="submit"
                                                class="{{ $announcement->is_published ? 'bg-orange-600 hover:bg-orange-500' : 'bg-green-600 hover:bg-green-500' }} text-white px-3 py-1 rounded-md text-sm shadow-md inline-flex items-center gap-2"
                                                title="{{ $announcement->is_published ? 'Sembunyikan' : 'Tampilkan' }}">
                                                @if ($announcement->is_published)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M2 5.27L3.28 4L20 20.72L18.73 22l-3.08-3.08c-1.15.38-2.37.58-3.65.58c-5 0-9.27-3.11-11-7.5c.69-1.76 1.79-3.31 3.19-4.54zM12 4.5c5 0 9.27 3.11 11 7.5a11.8 11.8 0 0 1-4.07 5.31L17.5 15.8A9.86 9.86 0 0 0 20.82 12C19.17 8.03 15.79 5.5 12 5.5c-1.3 0-2.56.25-3.71.69L6.8 4.69A11.3 11.3 0 0 1 12 4.5m0 3a4.5 4.5 0 0 1 4.5 4.5c0 .65-.14 1.27-.38 1.83l-2.16-2.16A2.48 2.48 0 0 0 12 9.5a2.5 2.5 0 0 0-2.5 2.5c0 .16.01.31.04.46L7.38 10.3A4.46 4.46 0 0 1 12 7.5" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5M12 17a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-8a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3" />
                                                    </svg>
                                                @endif
                                            </button>
                                        </form>

                                        {{-- Edit --}}
                                        <a href="{{ route('admin.announcements.edit', $announcement) }}"
                                            class="bg-yellow-600 hover:bg-yellow-500 text-white px-3 py-1 rounded-md text-sm shadow-md inline-flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M5 19h1.425L16.2 9.225L14.775 7.8L5 17.575zm-1 2q-.425 0-.712-.288T3 20v-2.425q0-.4.15-.763t.425-.637L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.437.65T21 6.4q0 .4-.138.763t-.437.662l-12.6 12.6q-.275.275-.638.425t-.762.15zM19 6.4L17.6 5zm-3.525 2.125l-.7-.725L16.2 9.225z" />
                                            </svg>
                                        </a>

                                        {{-- Hapus --}}
                                        <form method="POST"
                                            action="{{ route('admin.announcements.destroy', $announcement) }}"
                                            class="inline"
                                            onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded-md text-sm shadow-md inline-flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
                                                </svg>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
        <script>
            const tbody = document.getElementById('sortableBody');
            const reorderUrl = "{{ route('admin.recruitment_periods.announcements.reorder', $recruitmentPeriod) }}";

            if (tbody) {
                Sortable.create(tbody, {
                    handle: '.drag-handle',
                    animation: 150,
                    onEnd: function() {
                        const order = [...tbody.querySelectorAll('tr[data-id]')]
                            .map(tr => tr.dataset.id);

                        fetch(reorderUrl, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                },
                                body: JSON.stringify({
                                    order
                                }),
                            })
                            .then(r => r.json())
                            .then(data => {
                                if (!data.success) console.error('Reorder gagal');
                            })
                            .catch(err => console.error(err));
                    }
                });
            }
        </script>
    @endpush
</x-admin.layout>
