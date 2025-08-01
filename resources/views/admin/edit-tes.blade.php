@extends('admin.layouts.admin')

@section('title')
Edit Nilai Tes Siswa
@endsection

@section('content')
<div class="max-w-lg mx-auto bg-white rounded-xl shadow-lg p-8 mt-8">
    <h2 class="text-2xl font-bold mb-6">Edit Nilai Tes Siswa</h2>
    <form action="{{ route('admin.updateTes', $registration->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block font-semibold mb-1">Nama Siswa</label>
            <input type="text" class="w-full border rounded px-3 py-2 bg-gray-100" value="{{ $registration->nama }}" disabled>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Tes Warna</label>
            <input type="number" name="tes_warna" class="w-full border rounded px-3 py-2" value="{{ old('tes_warna', $registration->tes_warna) }}" min="0" required>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Interaksi</label>
            <input type="number" name="interaksi" class="w-full border rounded px-3 py-2" value="{{ old('interaksi', $registration->interaksi) }}" min="0" required>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Tes Baca Tulis</label>
            <input type="number" name="tes_baca_tulis" class="w-full border rounded px-3 py-2" value="{{ old('tes_baca_tulis', $registration->tes_baca_tulis) }}" min="0" required>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">ABK</label>
            <input type="number" name="abk" class="w-full border rounded px-3 py-2" value="{{ old('abk', $registration->abk) }}" min="0" required>
        </div>
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 font-semibold">Simpan</button>
        <a href="{{ route('admin.leaderboard') }}" class="ml-4 px-6 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 font-semibold">Batal</a>
    </form>
</div>
@endsection
