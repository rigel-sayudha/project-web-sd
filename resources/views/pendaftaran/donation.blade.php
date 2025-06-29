@extends('layouts.app')

@section('content')
<div class="min-h-screen pt-24 pb-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg overflow-hidden fade-in">
            <div class="p-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Sumbangan Pendaftaran</h1>
                <form action="{{ route('pendaftaran.store') }}?step=finish" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="sumbangan" class="block text-gray-700 font-medium mb-4">Pilih nominal sumbangan:</label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <label class="relative">
                                <input type="radio" name="sumbangan" value="500000" class="peer sr-only">
                                <div class="p-4 border-2 border-gray-200 rounded-lg cursor-pointer transition-all peer-checked:border-blue-500 peer-checked:bg-blue-50 hover:border-blue-200">
                                    <div class="text-lg font-semibold text-gray-800">Rp 500.000</div>
                                </div>
                            </label>
                            <label class="relative">
                                <input type="radio" name="sumbangan" value="800000" class="peer sr-only">
                                <div class="p-4 border-2 border-gray-200 rounded-lg cursor-pointer transition-all peer-checked:border-blue-500 peer-checked:bg-blue-50 hover:border-blue-200">
                                    <div class="text-lg font-semibold text-gray-800">Rp 800.000</div>
                                </div>
                            </label>
                            <label class="relative">
                                <input type="radio" name="sumbangan" value="1000000" class="peer sr-only" checked>
                                <div class="p-4 border-2 border-gray-200 rounded-lg cursor-pointer transition-all peer-checked:border-blue-500 peer-checked:bg-blue-50 hover:border-blue-200">
                                    <div class="text-lg font-semibold text-gray-800">Rp 1.000.000</div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="pt-4">
                        <button type="submit" class="w-full px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                            Selesaikan Pendaftaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
