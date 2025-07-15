@extends('admin.layouts.admin')

@section('title', 'Struktur Organisasi')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Struktur Organisasi</h2>
    <form action="{{ route('admin.organization.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="flex flex-col items-center mb-6">
            <img src="{{ $organizationImage ?? '/images/struktur-placeholder.png' }}" alt="Struktur Organisasi" class="w-full max-w-xs rounded-lg mb-2 object-contain border border-gray-200">
            <label class="block w-full">
                <span class="block text-gray-700 font-medium mb-2">Upload Gambar Struktur Organisasi</span>
                <input type="file" name="organization_image" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            </label>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">Simpan</button>
        </div>
    </form>
</div>
@endsection
