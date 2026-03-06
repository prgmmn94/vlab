<x-admin.layout>
    <div class="space-y-6">
        <div class="bg-blue-500 overflow-hidden shadow-md rounded-lg text-lg font-semibold text-white">
            <div class="p-6 text-gray-100">
                {{ __('Edit Periode Rekrutmen') }}
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-md rounded-lg">
            <div class="p-6">
                <form action="{{ route('recruitment_periods.update', $recruitmentPeriod->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="tahun" class="block text-sm font-medium text-gray-700 mb-2">
                            Tahun Periode <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="tahun" id="tahun"
                            value="{{ old('tahun', $recruitmentPeriod->tahun) }}" min="2000" max="2100"
                            step="1" required
                            class="block w-full md:w-1/3 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        @error('tahun')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1"
                                {{ old('is_active', $recruitmentPeriod->is_active) ? 'checked' : '' }}
                                class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-700">Aktifkan periode ini</span>
                        </label>
                        <p class="mt-1 text-xs text-gray-500">
                            * Jika dicentang, periode lain akan otomatis dinonaktifkan
                        </p>
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md shadow-sm">
                            Update
                        </button>
                        <a href="{{ route('recruitment_periods.index') }}"
                            class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-md shadow-sm">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin.layout>
