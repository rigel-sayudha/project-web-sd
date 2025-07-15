@extends('admin.layouts.admin')

@section('title', 'Tabel Pendaftaran Siswa')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Pendaftaran Siswa</h1>

    <form method="GET" action="{{ route('admin.leaderboard') }}" class="mb-4 flex items-center space-x-4">
        <div>
            <label for="sort" class="mr-2 font-semibold">Sortir Total Poin:</label>
            <select name="sort" id="sort" class="border rounded px-2 py-1">
                <option value="desc" {{ $sortOrder === 'desc' ? 'selected' : '' }}>Desc</option>
                <option value="asc" {{ $sortOrder === 'asc' ? 'selected' : '' }}>Asc</option>
            </select>
        </div>
        {{-- <div>
            <label for="show_accepted" class="mr-2 font-semibold">Tampilkan Siswa Diterima:</label>
            <input type="checkbox" name="show_accepted" id="show_accepted" value="1" {{ $showAccepted ? 'checked' : '' }}>
        </div> --}}
        <div class="flex items-center space-x-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Terapkan</button>
            <a href="{{ route('admin.leaderboard.export') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 flex items-center" target="_blank">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Export Excel
            </a>
        </div>
    </form>

    @if(session('success'))
    <div id="notifSuccess" class="mb-4 px-4 py-3 rounded bg-green-100 text-green-800 border border-green-300 shadow">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div id="notifError" class="mb-4 px-4 py-3 rounded bg-red-100 text-red-800 border border-red-300 shadow">
        {{ session('error') }}
    </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
        <canvas id="leaderboardChart" width="800" height="400"></canvas>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-lg overflow-x-auto">
        <table class="min-w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-3 px-6 text-left">Peringkat</th>
                    <th class="py-3 px-6 text-left">Nama Siswa</th>
                    {{-- <th class="py-3 px-6 text-left">Total Poin</th>
                    <th class="py-3 px-6 text-left">Skor Ujian</th> --}}
                    <th class="py-3 px-6 text-left">Jumlah Sumbangan</th>
                    {{-- <th class="py-3 px-6 text-left">Poin Sumbangan</th> --}}
                    <th class="py-3 px-6 text-left">Detail Jawaban</th>
                    <th class="py-3 px-6 text-left">Status</th>
                    <th class="py-3 px-6 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($leaderboard as $index => $registrationPoint)
                <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-gray-100">
                    <td class="py-3 px-6">{{ $index + 1 }}</td>
                    <td class="py-3 px-6">{{ $registrationPoint->registration->nama ?? 'N/A' }}</td>
                    {{-- <td class="py-3 px-6 font-semibold">{{ $registrationPoint->total_points }}</td> --}}
                    <td class="py-3 px-6">{{ $registrationPoint->exam_score }}</td>
                    <td class="py-3 px-6">Rp {{ number_format($registrationPoint->donation_amount, 0, ',', '.') }}</td>
                    {{-- <td class="py-3 px-6">{{ $registrationPoint->donation_points }}</td> --}}
                    {{-- <td class="py-3 px-6">
                        @php
                            $answers = json_decode($registrationPoint->answers, true);
                        @endphp
                        @if($answers)
                            <ul class="list-disc list-inside text-sm max-w-xs break-words">
                                @foreach($answers as $questionId => $answer)
                                    <li>Soal {{ $questionId }}: {{ $answer }}</li>
                                @endforeach
                            </ul>
                        @else
                            <span>Tidak ada data jawaban</span>
                        @endif
                    </td> --}}
                    <td class="py-3 px-6">
                        @if($registrationPoint->status_lolos)
                            <span class="text-green-600 font-semibold">Lolos</span>
                        @else
                            <span class="text-red-600 font-semibold">Belum</span>
                        @endif
                    </td>
                    <td class="py-3 px-6">
                        @if(!$registrationPoint->status_lolos && $registrationPoint->total_points < 21)
                        <button type="button" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700" onclick="showModal('loloskan', {{ $registrationPoint->id }}, '{{ $registrationPoint->registration->nama ?? 'N/A' }}')">Loloskan</button>
                        @elseif($registrationPoint->status_lolos)
                        <button type="button" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700" onclick="showModal('belumloloskan', {{ $registrationPoint->id }}, '{{ $registrationPoint->registration->nama ?? 'N/A' }}')">Belum Lolos</button>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-4">Tidak ada data pendaftaran.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Modal Konfirmasi -->
        <div id="modalKonfirmasi" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50 hidden">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                <h2 class="text-lg font-bold mb-4" id="modalTitle">Konfirmasi</h2>
                <p class="mb-6" id="modalMessage"></p>
                <form id="modalForm" method="POST">
                    @csrf
                    <div class="flex justify-end space-x-2">
                        <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700" id="modalSubmitBtn">Ya, Lanjutkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
function showModal(action, id, nama) {
    const modal = document.getElementById('modalKonfirmasi');
    const form = document.getElementById('modalForm');
    const title = document.getElementById('modalTitle');
    const message = document.getElementById('modalMessage');
    const submitBtn = document.getElementById('modalSubmitBtn');
    let url = '';
    if (action === 'loloskan') {
        title.textContent = 'Konfirmasi Loloskan Siswa';
        message.textContent = `Yakin ingin meloloskan siswa "${nama}"?`;
        url = `{{ url('admin/loloskan') }}/${id}`;
        submitBtn.classList.remove('bg-red-500', 'hover:bg-red-700');
        submitBtn.classList.add('bg-blue-600', 'hover:bg-blue-700');
        submitBtn.textContent = 'Ya, Loloskan';
    } else {
        title.textContent = 'Konfirmasi Ubah ke Belum Lolos';
        message.textContent = `Yakin ingin mengubah status siswa "${nama}" menjadi belum lolos?`;
        url = `{{ url('admin/belumloloskan') }}/${id}`;
        submitBtn.classList.remove('bg-blue-600', 'hover:bg-blue-700');
        submitBtn.classList.add('bg-red-500', 'hover:bg-red-700');
        submitBtn.textContent = 'Ya, Ubah';
    }
    form.action = url;
    modal.classList.remove('hidden');
}

function closeModal() {
    document.getElementById('modalKonfirmasi').classList.add('hidden');
}

document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('leaderboardChart').getContext('2d');

    const labels = [@foreach ($leaderboard as $item)"{{ $item->registration->nama ?? 'N/A' }}",@endforeach];
    const points = [@foreach ($leaderboard as $item){{ $item->total_points }},@endforeach];

    const gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(37, 99, 235, 0.8)');
    gradient.addColorStop(1, 'rgba(37, 99, 235, 0.2)');

    const data = {
        labels: labels,
        datasets: [{
            label: 'Total Poin',
            data: points,
            backgroundColor: gradient,
            borderColor: 'rgba(37, 99, 235, 1)',
            borderWidth: 2,
            borderRadius: 8,
            barThickness: 40,
        }]
    };

    const options = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0, 0, 0, 0.1)',
                },
                ticks: {
                    font: {
                        size: 12
                    }
                }
            },
            x: {
                grid: {
                    display: false
                },
                ticks: {
                    font: {
                        size: 12
                    }
                }
            }
        },
        plugins: {
            legend: {
                display: true,
                position: 'top',
                labels: {
                    font: {
                        size: 14
                    }
                }
            },
            tooltip: {
                enabled: true,
                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                titleFont: {
                    size: 14
                },
                bodyFont: {
                    size: 13
                },
                padding: 12,
                cornerRadius: 6,
                callbacks: {
                    label: function(context) {
                        return `Total Poin: ${context.parsed.y}`;
                    }
                }
            }
        },
        animation: {
            duration: 2000,
            easing: 'easeInOutQuart'
        }
    };

    new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });

    // Auto-hide notification after 3 seconds
    setTimeout(function() {
        const notifSuccess = document.getElementById('notifSuccess');
        if (notifSuccess) notifSuccess.style.display = 'none';
        const notifError = document.getElementById('notifError');
        if (notifError) notifError.style.display = 'none';
    }, 3000);
});
</script>
@endsection
