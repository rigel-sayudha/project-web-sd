@extends('layouts.app')
@section('title')
Galeri Kegiatan Sekolah
@endsection
@section('content')
<div class="max-w-7xl mx-auto py-8 px-4">
    <div class="text-center mb-12 mt-16">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Galeri Kegiatan Sekolah</h1>
        <div class="w-24 h-1 bg-green-600 mx-auto mb-4"></div>
        {{-- <p class="text-xl text-gray-600">Dokumentasi foto & video kegiatan SDIT SEMESTA CENDEKIA</p> --}}
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        @foreach($galeri as $item)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                @if($item->tipe == 'foto')
                    <img src="{{ asset('storage/galeri/'.$item->file) }}" alt="Foto Kegiatan" class="w-full h-56 object-cover">
                @elseif($item->tipe == 'video')
                    <video controls class="w-full h-56">
                        <source src="{{ asset('storage/galeri/'.$item->file) }}" type="video/mp4">
                        Browser Anda tidak mendukung video.
                    </video>
                @endif
                <div class="p-4">
                    <div class="font-semibold text-lg text-gray-800 mb-2">{{ $item->judul }}</div>
                    <div class="text-gray-600 text-sm">{{ $item->deskripsi }}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
