@extends('components.home.layout')

@section('content')
    <section class="min-h-screen flex items-center justify-center py-16 lg:py-0">
        <div class="container">
            <div class="max-w-2xl mx-auto text-center">
                <div class="bg-gray-50 shadow-xl rounded-xl p-6 border text-center">
                    <div class="bg-white rounded-2xl p-12 border border-gray-100">
                        <svg class="mx-auto h-16 w-16 text-green-500 mb-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <h1 class="text-3xl font-bold text-gray-900 mb-4">
                            Pendaftaran Berhasil!
                        </h1>

                        @if (session('success'))
                            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6 inline-block">
                                <p class="text-blue-700 font-semibold">{{ session('success') }}</p>
                            </div>
                        @endif

                        <p class="text-gray-600 mb-8">
                            Terima kasih telah mendaftar. Data Anda telah berhasil tersimpan dan akan segera diproses oleh
                            tim kami.
                        </p>

                        <a href="/"
                            class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md">
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
