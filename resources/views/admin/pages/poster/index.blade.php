@extends('admin.layouts.admin')
@section('title', 'Poster Pop-up Iklan')
@section('content')
<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold">Daftar Poster Pop-up</h2>
    <a href="{{ route('admin.poster.create') }}" class="px-4 py-2 bg-green-600 text-white rounded shadow hover:bg-green-700">Tambah Poster</a>
</div>
@if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
@endif
<div class="overflow-x-auto">
<table class="min-w-full bg-white rounded shadow">
    <thead class="bg-green-50">
        <tr>
            <th class="py-3 px-4 text-left">#</th>
            <th class="py-3 px-4 text-left">Gambar</th>
            <th class="py-3 px-4 text-left">Status</th>
            <th class="py-3 px-4 text-left">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($posters as $i => $poster)
        <tr class="border-b">
            <td class="py-2 px-4 align-middle">{{ $i+1 }}</td>
            <td class="py-2 px-4 align-middle">
                <img src="{{ asset('storage/' . $poster->gambar) }}" alt="Poster" class="h-20 rounded shadow mx-auto">
            </td>
            <td class="py-2 px-4 align-middle">
                <span class="inline-block px-3 py-1 rounded {{ $poster->status == 'published' ? 'bg-green-600 text-white' : 'bg-gray-300 text-gray-700' }}">{{ ucfirst($poster->status) }}</span>
            </td>
            <td class="py-2 px-4 align-middle">
                <div class="flex flex-wrap gap-2 items-center">
                    <a href="{{ route('admin.poster.edit', $poster) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('admin.poster.destroy', $poster) }}" method="POST" onsubmit="return confirm('Hapus poster ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Hapus</button>
                    </form>
                    <form action="{{ $poster->status == 'published' ? route('admin.poster.deactivate', $poster) : route('admin.poster.activate', $poster) }}" method="POST" class="ml-2">
                        @csrf
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" onchange="this.form.submit()" {{ $poster->status == 'published' ? 'checked' : '' }} class="toggle-checkbox h-5 w-10 rounded-full border-2 border-gray-300 bg-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200">
                            <span class="ml-2 text-sm">Aktif</span>
                        </label>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr><td colspan="4" class="text-center py-4 text-gray-500">Belum ada poster.</td></tr>
        @endforelse
    </tbody>
</table>
</div>
<style>
.toggle-checkbox {
    appearance: none;
    width: 40px;
    height: 20px;
    background: #e5e7eb;
    border-radius: 9999px;
    position: relative;
    outline: none;
    transition: background 0.2s;
}
.toggle-checkbox:checked {
    background: #0f8941;
}
.toggle-checkbox:before {
    content: '';
    position: absolute;
    left: 2px;
    top: 2px;
    width: 16px;
    height: 16px;
    background: #fff;
    border-radius: 9999px;
    transition: transform 0.2s;
}
.toggle-checkbox:checked:before {
    transform: translateX(20px);
}
</style>
@endsection
