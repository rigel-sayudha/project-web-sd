@extends('layouts.app')

@section('title', 'Pendaftaran Siswa Baru - SDIT SEMESTA CENDEKIA')

@section('content')
@push('styles')
<style>
    .fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush

<div class="min-h-screen pt-24 pb-12">
    <div class="container mx-auto px-4">
        @php
            $step = request()->get('step', 1);
        @endphp

        @if(!$is_open)
            <!-- Pendaftaran Tutup -->
            <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg overflow-hidden fade-in">
                <div class="p-8 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 mb-6 rounded-full bg-red-100">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">Pendaftaran Ditutup</h1>
                    <p class="text-lg text-gray-600 mb-8">
                        Pendaftaran siswa baru untuk tahun ajaran 2025/2026 telah ditutup.<br>
                        Pendaftaran berikutnya akan dibuka pada periode:<br>
                        <span class="font-semibold text-blue-600">15 Mei - 30 Juni 2025</span>
                    </p>
                    <div class="space-y-4">
                        <div class="p-4 bg-blue-50 rounded-lg">
                            <h2 class="font-semibold text-blue-800 mb-2">Pengumuman Penting</h2>
                            <p class="text-blue-600">Hasil seleksi akan diumumkan pada tanggal 5 Juli 2025</p>
                        </div>
                        <div class="p-4 bg-yellow-50 rounded-lg">
                            <h2 class="font-semibold text-yellow-800 mb-2">Informasi Kontak</h2>
                            <p class="text-yellow-600">
                                Untuk informasi lebih lanjut, silakan hubungi:<br>
                                Telp: (021) 1234-5678<br>
                                Email: info@sdpremium.sch.id
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Progress Steps -->
            <div class="max-w-5xl mx-auto mb-8">
                <div class="flex justify-center items-center space-x-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 flex items-center justify-center rounded-full font-bold" style="background-color:{{ $step >= 1 ? '#0f8941' : '#e5e7eb' }};color:{{ $step >= 1 ? '#fff' : '#1f2937' }};">1</div>
                        <div class="ml-2 text-sm font-medium {{ $step >= 1 ? 'text-green-600' : 'text-gray-500' }}">Data Diri</div>
                    </div>
                    <div class="w-16 h-1" style="background-color:{{ $step >= 2 ? '#0f8941' : '#e5e7eb' }};"></div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 flex items-center justify-center rounded-full font-bold" style="background-color:{{ $step >= 2 ? '#0f8941' : '#e5e7eb' }};color:{{ $step >= 2 ? '#fff' : '#1f2937' }};">2</div>
                        <div class="ml-2 text-sm font-medium {{ $step >= 2 ? 'text-green-600' : 'text-gray-500' }}">Jadwal Tes</div>
                    </div>
                    {{-- <div class="w-16 h-1" style="background-color:{{ $step >= 3 ? '#0f8941' : '#e5e7eb' }};"></div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 flex items-center justify-center rounded-full font-bold" style="background-color:{{ $step >= 3 ? '#0f8941' : '#e5e7eb' }};color:{{ $step >= 3 ? '#fff' : '#1f2937' }};">3</div>
                        <div class="ml-2 text-sm font-medium {{ $step >= 3 ? 'text-green-600' : 'text-gray-500' }}">Sumbangan</div>
                    </div> --}}
                </div>
            </div>

            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-10 fade-in">
                    <h1 class="text-4xl font-bold text-gray-800 mb-4">Pendaftaran Siswa Baru</h1>
                    <p class="text-lg text-gray-600">Tahun Ajaran 2025/2026</p>
                </div>

                @if($step == 1)
                    @include('pendaftaran.step1')
                @elseif($step == 2)
                    @include('pendaftaran.step2')
                @elseif($step == 3 || $step == 'finish')
                    @include('pendaftaran.step3')
                @endif
            </div>
        @endif
    </div>
</div>
@endsection
