@extends('admin.layouts.admin')

@section('title', 'Tambah Poster Iklan')

@section('content')
<div class="max-w-lg mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4 text-green-700">Tambah Poster Iklan</h1>
    <form action="{{ route('admin.poster.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Gambar Poster <span class="text-red-500">*</span></label>
            <input type="file" name="image" accept="image/*" required class="block w-full border rounded p-2">
            @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="flex justify-end">
            <a href="{{ route('admin.poster.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 mr-2">Batal</a>
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
