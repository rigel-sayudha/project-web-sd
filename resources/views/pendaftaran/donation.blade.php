@extends('layouts.app')

@section('content')
<div class="min-h-screen pt-24 pb-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg overflow-hidden fade-in">
            <div class="p-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Sumbangan</h1>
                <form action="{{ route('pendaftaran.store') }}?step=finish" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="sumbangan" class="block text-gray-700 font-medium mb-2">Masukkan nominal sumbangan (minimal Rp 100.000):</label>
                        <input type="number" id="sumbangan" name="sumbangan" min="100000" step="100000" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    </div>
                    <div>
                        <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">Selesaikan Pendaftaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
