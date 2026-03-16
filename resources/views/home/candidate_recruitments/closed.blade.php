@extends('components.home.layout')

@section('content')
    <section class="min-h-screen flex items-center justify-center py-16 lg:py-0">
        <div class="container">
            <div class="max-w-2xl mx-auto text-center">
                <div class="bg-gray-50 shadow-xl rounded-xl p-6 border text-center">
                    <div class="bg-white rounded-2xl p-12 border border-gray-100">
                        <svg class="mx-auto h-24 w-24 text-gray-400 mb-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>

                        <h1 class="text-3xl font-extrabold text-gray-900 mb-4">
                            Pendaftaran Ditutup
                        </h1>

                        <p class="text-gray-600 text-lg mb-6">
                            Saat ini belum ada periode rekrutmen yang dibuka.
                        </p>

                        <p class="text-gray-500 text-sm">
                            Silakan hubungi admin untuk informasi lebih lanjut.
                        </p>

                        <a href="/"
                            class="mt-8 inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md">
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection