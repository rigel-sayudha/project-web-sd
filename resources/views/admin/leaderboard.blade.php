@extends('admin.layouts.admin')

@section('title')
Data Pendaftaran Siswa Baru
@endsection

@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('admin.printAcceptedRegistrations') }}" target="_blank" class="inline-block px-6 py-2 bg-green-700 text-white rounded hover:bg-green-800 font-semibold shadow transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m0 0l-3-3m3 3l3-3m-6 3h6" /></svg>
        Rekap PDF Siswa Lolos
    </a>
</div>
<div class="bg-white rounded-xl shadow-lg overflow-x-auto max-w-screen-2xl mx-auto p-8">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative m-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
    <div class="w-full overflow-x-auto">
        <table class="min-w-[900px] w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <!-- <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th> -->
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jadwal Tes ABK</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Lahir</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Kelamin</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pekerjaan Ayah</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penghasilan Ayah</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penghasilan Ibu</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status PIP</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">File KK</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">File Akta</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>

                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($registrations as $i => $reg)
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap">{{ $i+1 }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">{{ $reg->nama }}</td>
                    <!-- <td class="px-4 py-3 whitespace-nowrap">{{ $reg->email }}</td> -->
                    <td class="px-4 py-3 whitespace-nowrap">{{ $reg->jadwal_abk }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">{{ $reg->tanggal_lahir }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">{{ $reg->jenis_kelamin }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">{{ $reg->pekerjaan_ayah }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">{{ $reg->penghasilan_ayah ?? '-' }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">{{ $reg->penghasilan_ibu ?? '-' }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">
                        {{ $reg->status_pip ?? '-' }}
                    </td>
                      <td class="px-4 py-3 whitespace-nowrap">
                        @if(!empty($reg->file_kk))
                            <a href="{{ asset('storage/kk/'.$reg->file_kk) }}" target="_blank" class="text-blue-600 underline hover:text-blue-800">Lihat KK</a>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap">
                        @if(!empty($reg->file_akta))
                            <a href="{{ asset('storage/akta/'.$reg->file_akta) }}" target="_blank" class="text-blue-600 underline hover:text-blue-800">Lihat Akta</a>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap flex gap-2">
                        <a href="{{ route('admin.printRegistration', $reg->id) }}" target="_blank" class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9V2h12v7M6 18v4h12v-4M6 14h12M6 14v4m0-4V9m12 5v4m0-4V9" /></svg>
                            Print PDF
                        </a>
                        @if($reg->status_lolos)
                            <form action="{{ route('admin.belumloloskan', $reg->id) }}" method="POST" onsubmit="return confirm('Yakin ingin ubah status menjadi belum lolos?')">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 font-semibold">Belum Loloskan</button>
                            </form>
                        @else
                            <form action="{{ route('admin.loloskan', $reg->id) }}" method="POST" onsubmit="return confirm('Yakin ingin loloskan siswa ini?')">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 font-semibold">Loloskan</button>
                            </form>
                        @endif
                    </td>
                  
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
