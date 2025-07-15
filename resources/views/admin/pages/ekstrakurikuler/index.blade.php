@extends('admin.layouts.admin')

@section('title', 'Ekstrakurikuler')

@section('content')
<div class="container mx-auto py-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Daftar Ekstrakurikuler</h2>
        <a href="{{ route('admin.ekstrakurikuler.create') }}" class="px-4 py-2 rounded text-white" style="background-color:#0f8941;transition:background-color 0.2s;" onmouseover="this.style.backgroundColor='#0c6c33'" onmouseout="this.style.backgroundColor='#0f8941'">Tambah</a>
    </div>
    @if(session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Deskripsi</th>
                    <th class="px-4 py-2 border">Foto</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ekstrakurikulers as $item)
                <tr>
                    <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border font-semibold">{{ $item->nama }}</td>
                    <td class="px-4 py-2 border">{{ Str::limit($item->deskripsi, 60) }}</td>
                    <td class="px-4 py-2 border">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="foto" class="h-12 w-12 object-cover rounded">
                        @endif
                    </td>
                    <td class="px-4 py-2 border">
                        @if($item->is_active)
                            <span class="text-green-600 font-bold">Aktif</span>
                        @else
                            <span class="text-gray-400">Nonaktif</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('admin.ekstrakurikuler.edit', $item) }}" class="px-2 py-1 rounded font-semibold shadow hover:bg-green-700 transition-colors duration-150 flex items-center gap-1 text-sm mr-2" style="background-color:#0f8941;color:#fff;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color:#fff;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828a2 2 0 01-2.828 0L5 11.828a2 2 0 112.828-2.828L13 9" /></svg>
                            Edit
                        </a>
                        <form action="{{ route('admin.ekstrakurikuler.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2 py-1 rounded font-semibold shadow transition-colors duration-150 flex items-center gap-1 text-sm" style="background-color:#0f8941;color:#fff;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color:#fff;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
