@extends('admin.layouts.admin')

@section('title', 'Kotak Saran')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Kotak Saran</h1>
    <div class="bg-white rounded-xl shadow-lg overflow-x-auto max-w-2xl mx-auto p-8">
        <table class="min-w-full border border-gray-200">
            <thead>
                <tr class="bg-green-100 text-green-800">
                    <th class="py-3 px-6 text-left">Waktu</th>
                    <th class="py-3 px-6 text-left">Nama</th>
                    <th class="py-3 px-6 text-left">Pesan/Saran</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sarans as $saran)
                <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }} hover:bg-green-50">
                    <td class="py-3 px-6 text-xs text-gray-500">{{ $saran->created_at->format('d M Y H:i') }}</td>
                    <td class="py-3 px-6 text-sm">{{ $saran->nama ? $saran->nama : 'Anonim' }}</td>
                    <td class="py-3 px-6 text-sm">{{ $saran->message }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-4 text-gray-400">Belum ada saran.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $sarans->links() }}</div>
    </div>
</div>
@endsection
