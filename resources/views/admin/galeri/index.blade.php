@extends('admin.layouts.admin')
@section('title')
Manajemen Galeri Kegiatan
@endsection
@section('content')
<div class="max-w-5xl mx-auto py-8 px-4">
    <h1 class="text-2xl font-bold text-green-700 mb-8">Manajemen Galeri Kegiatan Sekolah</h1>
    <a href="{{ route('admin.galeri.create') }}" class="mb-6 inline-block px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700 font-semibold">Tambah Foto/Video</a>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        @foreach($galeri as $item)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden relative">
                @if($item->tipe == 'foto')
                    <img src="{{ asset('storage/galeri/'.$item->file) }}" alt="Foto Kegiatan" class="w-full h-48 object-cover">
                @elseif($item->tipe == 'video')
                    <video controls class="w-full h-48">
                        <source src="{{ asset('storage/galeri/'.$item->file) }}" type="video/mp4">
                        Browser Anda tidak mendukung video.
                    </video>
                @endif
                <div class="p-4">
                    <div class="font-semibold text-lg text-gray-800 mb-2">{{ $item->judul }}</div>
                    <div class="text-gray-600 text-sm mb-2">{{ $item->deskripsi }}</div>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.galeri.edit', $item->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-xs">Edit</a>
                        <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-xs">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
