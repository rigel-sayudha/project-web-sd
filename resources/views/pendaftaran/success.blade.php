@extends('layouts.app')

@section('content')
<div class="min-h-screen pt-24 pb-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg overflow-hidden fade-in">
            <div class="p-8 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 mb-6 rounded-full bg-green-100">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Pendaftaran Berhasil!</h1>
                <p class="text-lg text-gray-600 mb-8">
                    Terima kasih telah mendaftar di SD Premium.<br>
                    Hasil seleksi akan diumumkan pada tanggal 5 Juli 2025.
                </p>
                <div class="space-y-4">
                    <div class="p-4 bg-blue-50 rounded-lg">
                        <h2 class="font-semibold text-blue-800 mb-2">Total Poin Anda</h2>
                        <p class="text-3xl font-bold text-blue-600">{{ session('total_points', 0) }}</p>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-lg">
                        <h2 class="font-semibold text-gray-800 mb-2">Rincian Poin</h2>
                        <div class="flex justify-center space-x-8">
                            <div>
                                <p class="text-gray-600">Nilai Ujian</p>
                                <p class="text-xl font-semibold text-gray-800">{{ session('exam_score', 0) }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Poin Sumbangan</p>
                                <p class="text-xl font-semibold text-gray-800">{{ session('donation_points', 0) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="{{ url('/') }}" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
