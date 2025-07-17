<div class="bg-white p-8 rounded-xl shadow-lg">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Penjadwalan Tes Anak Berkebutuhan Khusus (ABK)</h1>
    <form action="{{ route('pendaftaran.store') }}?step=finish" method="POST" class="space-y-8">
        @csrf
        <div class="bg-gray-50 p-6 rounded-lg">
            <p class="text-lg font-semibold text-gray-800 mb-4">Silakan pilih jadwal tes untuk anak berkebutuhan khusus (ABK):</p>
            <div class="space-y-4">
                @php
                    use App\Models\Registration;
                    $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
                    $jadwalTes = [];
                    $now = strtotime(date('Y-m-d'));
                    $currentDay = date('N', $now);
                    foreach ($days as $i => $day) {
                        $targetDay = $i + 1;
                        if ($targetDay >= $currentDay) {
                            $diff = $targetDay - $currentDay;
                            $timestamp = strtotime("+{$diff} days", $now);
                            $date = date('d M Y', $timestamp);
                            $jadwalTes[] = [
                                'hari' => $day,
                                'tanggal' => $date,
                                'waktu' => '07.00 - 12.00 WIB',
                                'key' => $day.'-'.$date.'-07.00-12.00',
                            ];
                        }
                    }
                    $jadwalCounts = [];
                    foreach ($jadwalTes as $jadwal) {
                        $jadwalKey = $jadwal['hari'].', '.$jadwal['tanggal'].' | '.$jadwal['waktu'];
                        $jadwalCounts[$jadwalKey] = Registration::where('jadwal_abk', $jadwalKey)->count();
                    }
                @endphp
                @foreach($jadwalTes as $jadwal)
                    @php
                        $jadwalKey = $jadwal['hari'].', '.$jadwal['tanggal'].' | '.$jadwal['waktu'];
                        $isFull = ($jadwalCounts[$jadwalKey] ?? 0) >= 20;
                    @endphp
                    <label class="flex items-center p-4 rounded-lg transition cursor-pointer {{ $isFull ? 'bg-gray-200 text-gray-400 cursor-not-allowed' : 'bg-white hover:bg-green-50' }}">
                        <input type="radio" name="jadwal_abk" value="{{ $jadwalKey }}" class="form-radio text-green-600" required {{ $isFull ? 'disabled' : '' }}>
                        <span class="ml-2">{{ $jadwalKey }}
                            @if($isFull)
                                <span class="ml-2 text-xs text-red-500">(Penuh)</span>
                            @endif
                        </span>
                    </label>
                @endforeach
            </div>
        </div>
        <div class="flex justify-between pt-6">
            <a href="{{ route('pendaftaran') }}?step=1" class="px-6 py-3 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition">
                Kembali
            </a>
            <button type="submit" class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition">
                Selesaikan Pendaftaran
            </button>
        </div>
    </form>
</div>
