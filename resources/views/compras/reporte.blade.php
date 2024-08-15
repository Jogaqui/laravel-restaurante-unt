@extends('compras.plantillaC')

@section('titulo', '.:: Restaurant ::.')

@section('contenido')
    <div class="container">
        <div class="d-flex justify-content-center mb-4">
            <h1 class="card-title" style="font-size: 35px">Reporte de compras</h1>
        </div>

        <div class="container">
            <canvas id="comprasChart"></canvas>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('comprasChart').getContext('2d');
        var comprasPorMes = @json($comprasPorMes);

        var labels = [];
        var data = [];

        comprasPorMes.forEach(function(compra) {
            labels.push(compra.anio + '-' + compra.mes);
            data.push(compra.total);
        });

        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total de compras por mes',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
