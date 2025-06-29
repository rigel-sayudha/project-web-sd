<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru - SD Premium</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-50">
    @include('partial.navbar')

    <div class="min-h-screen pt-24 pb-12">
        <div class="container mx-auto px-4">
            @php
    $step = request()->get('step', 1);
@endphp

@if(!$is_open)
            <!-- Pendaftaran Tutup -->
            <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg overflow-hidden fade-in">
                <div class="p-8 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 mb-6 rounded-full bg-red-100">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">Pendaftaran Ditutup</h1>
                    <p class="text-lg text-gray-600 mb-8">
                        Pendaftaran siswa baru untuk tahun ajaran 2025/2026 telah ditutup.<br>
                        Pendaftaran berikutnya akan dibuka pada periode:<br>
                        <span class="font-semibold text-blue-600">15 Mei - 30 Juni 2025</span>
                    </p>
                    <div class="space-y-4">
                        <div class="p-4 bg-blue-50 rounded-lg">
                            <h2 class="font-semibold text-blue-800 mb-2">Pengumuman Penting</h2>
                            <p class="text-blue-600">Hasil seleksi akan diumumkan pada tanggal 5 Juli 2025</p>
                        </div>
                        <div class="p-4 bg-yellow-50 rounded-lg">
                            <h2 class="font-semibold text-yellow-800 mb-2">Informasi Kontak</h2>
                            <p class="text-yellow-600">
                                Untuk informasi lebih lanjut, silakan hubungi:<br>
                                Telp: (021) 1234-5678<br>
                                Email: info@sdpremium.sch.id
                            </p>
                        </div>
                    </div>
                </div>
            </div>
@else
            <!-- Progress Steps -->
            <div class="max-w-5xl mx-auto mb-8">
                <div class="flex justify-center items-center space-x-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 flex items-center justify-center rounded-full {{ $step >= 1 ? 'bg-blue-600 text-white' : 'bg-gray-200' }} font-bold">1</div>
                        <div class="ml-2 text-sm font-medium {{ $step >= 1 ? 'text-blue-600' : 'text-gray-500' }}">Data Diri</div>
                    </div>
                    <div class="w-16 h-1 {{ $step >= 2 ? 'bg-blue-600' : 'bg-gray-200' }}"></div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 flex items-center justify-center rounded-full {{ $step >= 2 ? 'bg-blue-600 text-white' : 'bg-gray-200' }} font-bold">2</div>
                        <div class="ml-2 text-sm font-medium {{ $step >= 2 ? 'text-blue-600' : 'text-gray-500' }}">Soal Test</div>
                    </div>
                    <div class="w-16 h-1 {{ $step >= 3 ? 'bg-blue-600' : 'bg-gray-200' }}"></div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 flex items-center justify-center rounded-full {{ $step >= 3 ? 'bg-blue-600 text-white' : 'bg-gray-200' }} font-bold">3</div>
                        <div class="ml-2 text-sm font-medium {{ $step >= 3 ? 'text-blue-600' : 'text-gray-500' }}">Sumbangan</div>
                    </div>
                </div>
            </div>

            <div class="max-w-5xl mx-auto">
            <!-- Form Pendaftaran -->
            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-10 fade-in">
                    <h1 class="text-4xl font-bold text-gray-800 mb-4">Pendaftaran Siswa Baru</h1>
                    <p class="text-lg text-gray-600">Tahun Ajaran 2025/2026</p>
                </div>

                @if($step == 1)
                    <!-- Step 1: Form Data Diri -->
                    <form action="{{ route('pendaftaran.store') }}?step=2" method="POST" class="space-y-8">
                        @csrf
                        <!-- Data Siswa -->
                        <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 hover-card fade-in">
                            <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                                <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Data Calon Siswa
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2" for="nama">Nama Lengkap</label>
                                    <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2" for="nik">NIK</label>
                                    <input type="text" id="nik" name="nik" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required maxlength="16" minlength="16">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2" for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2" for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">Jenis Kelamin</label>
                                    <div class="flex space-x-4">
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="jenis_kelamin" value="L" class="form-radio text-blue-600" required>
                                            <span class="ml-2">Laki-laki</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="jenis_kelamin" value="P" class="form-radio text-blue-600" required>
                                            <span class="ml-2">Perempuan</span>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2" for="agama">Agama</label>
                                    <select id="agama" name="agama" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2" for="nama_ayah">Nama Ayah</label>
                                    <input type="text" id="nama_ayah" name="nama_ayah" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2" for="nama_ibu">Nama Ibu</label>
                                    <input type="text" id="nama_ibu" name="nama_ibu" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2" for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                    <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2" for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                    <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2" for="alamat">Alamat</label>
                                    <textarea id="alamat" name="alamat" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required></textarea>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2" for="no_telp">No. Telepon</label>
                                    <input type="tel" id="no_telp" name="no_telp" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2" for="email">Email</label>
                                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4 fade-in">
                            <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
                                Lanjut ke Soal Test
                            </button>
                        </div>
                    </form>

                @elseif($step == 2)
                    <!-- Step 2: Soal Test -->
                    <form action="{{ route('pendaftaran.store') }}?step=3" method="POST" class="space-y-8">
                        @csrf
                        <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 hover-card fade-in">
                            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Soal Seleksi</h2>
                            <div class="space-y-6">
                                @foreach($questions as $index => $question)
                                <div class="p-4 bg-gray-50 rounded-lg">
                                    <p class="font-medium text-gray-800 mb-4">{{ $index + 1 }}. {{ $question->question }}</p>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <label class="flex items-center p-3 bg-white rounded-lg hover:bg-blue-50 transition cursor-pointer">
                                            <input type="radio" name="soal[{{ $question->id }}]" value="A" class="form-radio text-blue-600" required>
                                            <span class="ml-2">A. {{ $question->option_a }}</span>
                                        </label>
                                        <label class="flex items-center p-3 bg-white rounded-lg hover:bg-blue-50 transition cursor-pointer">
                                            <input type="radio" name="soal[{{ $question->id }}]" value="B" class="form-radio text-blue-600" required>
                                            <span class="ml-2">B. {{ $question->option_b }}</span>
                                        </label>
                                        <label class="flex items-center p-3 bg-white rounded-lg hover:bg-blue-50 transition cursor-pointer">
                                            <input type="radio" name="soal[{{ $question->id }}]" value="C" class="form-radio text-blue-600" required>
                                            <span class="ml-2">C. {{ $question->option_c }}</span>
                                        </label>
                                        <label class="flex items-center p-3 bg-white rounded-lg hover:bg-blue-50 transition cursor-pointer">
                                            <input type="radio" name="soal[{{ $question->id }}]" value="D" class="form-radio text-blue-600" required>
                                            <span class="ml-2">D. {{ $question->option_d }}</span>
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="flex justify-between space-x-4 fade-in">
                            <a href="{{ route('pendaftaran') }}?step=1" class="px-6 py-3 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition duration-300">
                                Kembali ke Data Diri
                            </a>
                            <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
                                Lanjut ke Sumbangan
                            </button>
                        </div>
                    </form>

                @elseif($step == 3)
                    <!-- Step 3: Sumbangan -->
                    <form action="{{ route('pendaftaran.store') }}?step=finish" method="POST" class="space-y-8">
                        @csrf
                        <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 hover-card fade-in">
                            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Sumbangan</h2>
                            <div class="space-y-4">
                                <p class="text-gray-600">Silakan masukkan nominal sumbangan yang ingin Anda berikan:</p>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500">Rp</span>
                                    <input type="number" name="sumbangan" min="0" step="100000" class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                                </div>
                                <p class="text-sm text-gray-500">Minimal sumbangan Rp 100.000</p>
                                <div class="p-4 bg-blue-50 rounded-lg">
                                    <p class="text-sm text-blue-600">Setiap Rp 100.000 akan mendapatkan 1 poin tambahan</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-between space-x-4 fade-in">
                            <a href="{{ route('pendaftaran') }}?step=2" class="px-6 py-3 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition duration-300">
                                Kembali ke Soal Test
                            </a>
                            <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
                                Selesai
                            </button>
                        </div>
                    </form>
                @endif
            </div>
            @endif
        </div>
    </div>
</body>
</html>
