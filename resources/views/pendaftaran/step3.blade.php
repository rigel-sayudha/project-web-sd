@extends('layouts.app')

@section('content')
<div class="min-h-screen pt-24 pb-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg overflow-hidden fade-in">
            <div class="p-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Sumbangan Pendaftaran</h1>
                @if ($errors->any())
                    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('pendaftaran.store') }}?step=finish" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="sumbangan" class="block text-gray-700 font-medium mb-4">Pilih nominal sumbangan:</label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <label class="relative flex items-center cursor-pointer gap-2 py-2">
                                <input type="radio" name="sumbangan" value="500000" class="accent-green-600 mr-2" style="width: 1.2em; height: 1.2em; min-width: 1.2em; min-height: 1.2em;" required>
                                <span class="p-4 border-2 border-gray-200 rounded-lg transition-all hover:border-green-200 w-full block">
                                    <span class="text-lg font-semibold text-gray-800">Rp 500.000</span>
                                </span>
                            </label>
                            <label class="relative flex items-center cursor-pointer gap-2 py-2">
                                <input type="radio" name="sumbangan" value="800000" class="accent-green-600 mr-2" style="width: 1.2em; height: 1.2em; min-width: 1.2em; min-height: 1.2em;">
                                <span class="p-4 border-2 border-gray-200 rounded-lg transition-all hover:border-green-200 w-full block">
                                    <span class="text-lg font-semibold text-gray-800">Rp 800.000</span>
                                </span>
                            </label>
                            <label class="relative flex items-center cursor-pointer gap-2 py-2">
                                <input type="radio" name="sumbangan" value="1000000" class="accent-green-600 mr-2" style="width: 1.2em; height: 1.2em; min-width: 1.2em; min-height: 1.2em;">
                                <span class="p-4 border-2 border-gray-200 rounded-lg transition-all hover:border-green-200 w-full block">
                                    <span class="text-lg font-semibold text-gray-800">Rp 1.000.000</span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="pt-4">
                        <button type="submit" class="w-full px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition">
                            Selesaikan Pendaftaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
