<x-admin.layout>
    <div class="space-y-6">

        <div class="bg-green-600 text-white shadow-md rounded-lg">
            <div class="p-6 text-lg font-semibold">
                {{ __('Tambah Kegiatan') }}
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6">
            <form action="{{ route('admin.photo_events.store') }}" method="POST">
                @csrf
                <div class="space-y-12">
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="event_name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Kegiatan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="event_name" id="event_name" value="{{ old('event_name') }}"
                                required
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                placeholder="Contoh: Kegiatan Open Recruitment 2026">
                            @error('event_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-full">
                            <label for="event_date" class="block text-sm font-medium text-gray-700 mb-2">
                                Tanggal Kegiatan <span class="text-red-500">*</span>
                            </label>
                            <input type="date" name="event_date" id="event_date" value="{{ old('event_date') }}"
                                required
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            @error('event_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <hr class="h-px my-8 bg-gray-300 border-0">
                </div>
                <div class="mt-8 flex items-center justify-between">
                    <a href="{{ route('admin.photo_events.index') }}"
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
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</x-admin.layout>
