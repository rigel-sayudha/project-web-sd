@extends('admin.layouts.admin')

@section('title', 'Leaderboard Poin Pendaftaran')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Leaderboard Poin Pendaftaran Siswa</h1>
    
    <!-- Chart Container -->
    <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
        <canvas id="leaderboardChart" width="800" height="400"></canvas>
    </div>

    <!-- Table for detailed view -->
    <div class="bg-white p-6 rounded-lg shadow-lg overflow-x-auto">
        <table class="min-w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-3 px-6 text-left">Peringkat</th>
                    <th class="py-3 px-6 text-left">Nama Siswa</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Total Poin</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($leaderboard as $index => $registrationPoint)
                <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-gray-100">
                    <td class="py-3 px-6">{{ $index + 1 }}</td>
                    <td class="py-3 px-6">{{ $registrationPoint->registration->name ?? 'N/A' }}</td>
                    <td class="py-3 px-6">{{ $registrationPoint->registration->email ?? 'N/A' }}</td>
                    <td class="py-3 px-6 font-semibold">{{ $registrationPoint->total_points }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-4">Tidak ada data pendaftaran.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('leaderboardChart').getContext('2d');
    
    // Prepare data for chart
    const labels = [@foreach ($leaderboard as $item)"{{ $item->registration->name ?? 'N/A' }}",@endforeach];
    const points = [@foreach ($leaderboard as $item){{ $item->total_points }},@endforeach];
    
    // Generate gradient
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
});
</script>
@endsection
