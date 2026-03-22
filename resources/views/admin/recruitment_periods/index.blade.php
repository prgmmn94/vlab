<x-admin.layout>
    <div class="space-y-6">

        <div class="bg-blue-500 overflow-hidden shadow-md rounded-lg text-lg font-semibold text-white">
            <div class="p-6 text-gray-100">
                {{ __('Periode Rekrutmen') }}
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-md rounded-lg">
            <div class="p-6">
                <form method="GET" action="{{ route('recruitment_periods.index') }}" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-[1fr_auto] gap-3 items-end">

                        <div>
                            <label for="filter_tahun" class="block text-sm font-medium text-gray-700 mb-1">
                                Filter Tahun
                            </label>
                            <select name="filter_tahun" id="filter_tahun"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                <option value="">Semua Tahun</option>
                                @foreach ($years ?? [] as $year)
                                    <option value="{{ $year }}"
                                        {{ request('filter_tahun') == $year ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endforeach
                            </select>
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
                            <a href="{{ route('recruitment_periods.index') }}"
                                class="px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md font-semibold shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M12 20q-3.35 0-5.675-2.325T4 12t2.325-5.675T12 4q1.725 0 3.3.712T18 6.75V4h2v7h-7V9h4.2q-.8-1.4-2.187-2.2T12 6Q9.5 6 7.75 7.75T6 12t1.75 4.25T12 18q1.925 0 3.475-1.1T17.65 14h2.1q-.7 2.65-2.85 4.325T12 20" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    @if (request()->has('filter_tahun'))
                        <div class="flex items-center gap-2 flex-wrap">
                            <span class="text-sm text-gray-600">Filter aktif:</span>

                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                Tahun: {{ request('filter_tahun') }}
                                <a href="{{ route('recruitment_periods.index') }}"
                                    class="ml-2 text-blue-600 hover:text-blue-800">×</a>
                            </span>
                        </div>
                    @endif
                </form>
            </div>
        </div>

        @if (Auth::user()->role === 'Super Admin' || Auth::user()->role === 'Oprec Admin')
            <div class="flex justify-end">
                <a href="{{ route('recruitment_periods.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-md shadow-md">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Periode
                </a>
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-md rounded-lg">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tahun</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jumlah Pendaftar</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Lihat Data</th>
                            @if (Auth::user()->role === 'Super Admin' || Auth::user()->role === 'Oprec Admin')
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($periods as $index => $period)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $periods->firstItem() + $index }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex items-center gap-2">
                                        <span>{{ $period->tahun }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex items-center gap-2">
                                        @if ($period->is_active)
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
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        {{ $period->recruitments_count ?? 0 }} pendaftar
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <a href="{{ route('admin.recruitments.index', $period->id) }}"
                                        class="bg-green-600 hover:bg-green-500 text-white px-3 py-1 rounded-md text-sm shadow-md inline-flex items-center gap-2"
                                        title="Lihat Data">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M9.175 10.825Q8 9.65 8 8t1.175-2.825T12 4t2.825 1.175T16 8t-1.175 2.825T12 12t-2.825-1.175M4 20v-2.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13t3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20z" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    @if (Auth::user()->role === 'Super Admin' || Auth::user()->role === 'Oprec Admin')
                                    
                                        <form action="{{ route('recruitment_periods.toggle', $period->id) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="{{ $period->is_active ? 'bg-orange-600 hover:bg-orange-500' : 'bg-green-600 hover:bg-green-500' }} text-white px-3 py-1 rounded-md text-sm shadow-md inline-flex items-center gap-2"
                                                title="{{ $period->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                                @if ($period->is_active)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275t.275.7t-.275.7L13.4 12l4.9 4.9q.275.275.275.7t-.275.7t-.7.275t-.7-.275z" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="m9.55 15.15l8.475-8.475q.3-.3.7-.3t.7.3t.3.713t-.3.712l-9.175 9.2q-.3.3-.7.3t-.7-.3L4.55 13q-.3-.3-.288-.712t.313-.713t.713-.3t.712.3z" />
                                                    </svg>
                                                @endif
                                            </button>
                                        </form>

                                        <a href="{{ route('recruitment_periods.announcements.index', $period->id) }}"
                                            class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1 rounded-md text-sm shadow-md inline-flex items-center gap-2"
                                            title="Kelola Pengumuman">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M12.05 17.625L9.225 20.45q-.575.575-1.412.575T6.4 20.45l-2.825-2.825Q3 17.05 3 16.2t.575-1.425l2.8-2.8V8.7q0-.675.613-.925T8.075 8l7.95 7.925q.475.475.213 1.088t-.938.612zm.85-2L8.375 11.1v1.7l-3.4 3.4L7.8 19.025l3.4-3.4zm4.05-8.6q-1.475-1.475-3.463-1.9T9.6 5.4q-.375.125-.762-.012t-.513-.513q-.15-.425.025-.812t.6-.538q2.425-.9 4.975-.363t4.45 2.438t2.438 4.488t-.388 5.037q-.15.4-.55.563t-.8-.013q-.375-.15-.513-.525t.013-.775q.7-1.9.275-3.887t-1.9-3.463m-1.4 1.425q.525.525.85 1.188t.45 1.387q.075.425-.213.75t-.712.325q-.4 0-.687-.275t-.388-.675q-.1-.35-.262-.675t-.438-.6t-.625-.462t-.725-.288q-.4-.1-.687-.375t-.338-.7t.325-.7t.85-.2q.725.125 1.4.45t1.2.85m-6.6 6.6" />
                                            </svg>
                                        </a>

                                        <form action="{{ route('recruitment_periods.destroy', $period->id) }}"
                                            method="POST" class="inline"
                                            onsubmit="return confirm('Yakin ingin menghapus periode ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded-md text-sm shadow-md inline-flex items-center gap-2"
                                                title="Hapus">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div
                                        class="bg-gradient-to-l from-white to-red-50 text-red-800 px-6 py-5 w-full text-lg font-semibold">
                                        Data belum tersedia!
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $periods->links() }}
            </div>
        </div>

    </div>
</x-admin.layout>
