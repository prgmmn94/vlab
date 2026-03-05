@extends('components.home.layout')

@section('content')
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white text-center">
                    <div class="mb-6">
                        <svg class="mx-auto h-16 w-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>

                    <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        Pendaftaran Berhasil!
                    </h2>

                    @if (session('success'))
                        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6 inline-block">
                            <p class="text-blue-700 font-semibold">{{ session('success') }}</p>
                        </div>
                    @endif

                    <p class="text-gray-600 mb-8">
                        Terima kasih telah mendaftar. Data Anda telah berhasil tersimpan dan akan segera diproses oleh
                        tim kami.
                        <br>
                        <strong>Simpan ID Calas Anda untuk keperluan selanjutnya.</strong>
                    </p>

                    <div class="space-x-4">
                        <a href="{{ route('candidate.recruitments.index') }}"
                            class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md">
                            Kembali ke Halaman Utama
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
