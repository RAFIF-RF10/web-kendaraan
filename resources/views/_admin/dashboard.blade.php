@extends('_layouts.app')

@section('content')
<div class="container">
    <h2>Dashboard</h2>
    <div class="card mt-4">
        <div class="card-body">
            <canvas id="vehicleUsageChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('vehicleUsageChart').getContext('2d');
    const vehicleUsageChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($chartData['labels']),
            datasets: [{
                label: 'Jumlah Pemakaian Kendaraan',
                data: @json($chartData['data']),
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0 // Menampilkan angka bulat saja
                }
            }
        }
    });
</script>
@endsection
