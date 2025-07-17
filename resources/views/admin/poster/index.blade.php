@extends('admin.layouts.admin')

@section('title', 'Manajemen Poster Iklan')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4 text-green-700">Manajemen Poster Iklan</h1>
    <a href="{{ route('admin.poster.create') }}" class="mb-4 inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Tambah Poster</a>
    <table class="w-full table-auto border">
        <thead>
            <tr class="bg-green-50">
                <th class="p-2 border">Gambar</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posters as $poster)
            <tr>
                <td class="p-2 border text-center">
                    <img src="{{ asset('storage/poster/'.$poster->image) }}" alt="Poster" class="h-20 mx-auto rounded shadow">
                </td>
                <td class="p-2 border text-center">
                    @if($poster->is_active)
                        <span class="px-2 py-1 bg-green-200 text-green-800 rounded text-xs">Aktif</span>
                    @else
                        <span class="px-2 py-1 bg-gray-200 text-gray-800 rounded text-xs">Nonaktif</span>
                    @endif
                </td>
                <td class="p-2 border text-center space-x-1">
                    <a href="{{ route('admin.poster.edit', $poster) }}" class="px-2 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">Edit</a>
                    <form action="{{ route('admin.poster.destroy', $poster) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600" onclick="return confirm('Hapus poster ini?')">Hapus</button>
                    </form>
                    @if(!$poster->is_active)
                    <form action="{{ route('admin.poster.activate', $poster) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-2 py-1 bg-green-600 text-white rounded hover:bg-green-700">Aktifkan</button>
                    </form>
                    @else
                    <form action="{{ route('admin.poster.deactivate', $poster) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-2 py-1 bg-gray-500 text-white rounded hover:bg-gray-600">Nonaktifkan</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
