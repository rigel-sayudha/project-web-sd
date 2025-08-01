@php
    $id = request()->query('id');
    $registration = null;
    if ($id) {
        $registration = \App\Models\Registration::find($id);
    }
    $hasDraft = $registration && $registration->status === 'draft';
@endphp
<div class="bg-white p-8 rounded-xl shadow-lg">
    @if(!$hasDraft)
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <strong>Data pendaftaran belum lengkap.</strong> Silakan isi data diri terlebih dahulu.<br>
            Anda akan diarahkan ke Step 1 dalam 3 detik...
        </div>
        <script>
            setTimeout(function() {
                window.location.href = "{{ route('pendaftaran') }}?step=1";
            }, 3000);
        </script>
    @endif
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Penjadwalan Tes Anak Berkebutuhan Khusus (ABK)</h1>
    <form action="{{ route('pendaftaran.store') }}?step=finish&id={{ $id }}" method="POST" class="space-y-8" @if(!$hasDraft) style="pointer-events:none;opacity:0.5;" @endif>
        @csrf
        <div class="bg-gray-50 p-6 rounded-lg">
            <p class="text-lg font-semibold text-gray-800 mb-4">Silakan pilih jadwal tes untuk anak berkebutuhan khusus (ABK):</p>
            <div class="space-y-4">
                @php
                    use App\Models\Registration;
                    $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
                    $maxQuotaPerDay = 20; // Maximum quota per day
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
                        $currentCount = $jadwalCounts[$jadwalKey] ?? 0;
                        $isFull = $currentCount >= $maxQuotaPerDay;
                        $remainingSlots = $maxQuotaPerDay - $currentCount;
                    @endphp
                    <label class="flex items-center p-4 rounded-lg transition cursor-pointer {{ $isFull ? 'bg-gray-200 text-gray-400 cursor-not-allowed' : 'bg-white hover:bg-green-50' }}">
                        <input type="radio" name="jadwal_abk" value="{{ $jadwalKey }}" class="form-radio text-green-600" required {{ $isFull ? 'disabled' : '' }}>
                        <div class="ml-2 flex-grow">
                            <div class="flex justify-between items-center">
                                <span>{{ $jadwalKey }}</span>
                                <span class="text-sm {{ $remainingSlots <= 2 ? 'text-red-500' : 'text-green-600' }}">
                                    @if($isFull)
                                        <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">Kuota Penuh</span>
                                    @else
                                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                            Sisa Kuota: {{ $remainingSlots }} dari {{ $maxQuotaPerDay }}
                                        </span>
                                    @endif
                                </span>
                            </div>
                            @if($remainingSlots <= 2 && !$isFull)
                                <p class="text-xs text-amber-600 mt-1">Kuota hampir penuh! Segera pilih jadwal ini.</p>
                            @endif
                        </div>
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
