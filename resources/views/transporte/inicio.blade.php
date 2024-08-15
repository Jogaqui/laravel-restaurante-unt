@extends('transporte.plantillaT')

@section('titulo', '.:: Restaurant ::.')

@section('contenido')
<div class="container">
    <div class="d-flex justify-content-center mb-4">
        <h1 class="card-title" style="font-size: 35px">Bienvenido al Subsistema de Transporte y Distribución</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <img src="/img/pedido.jpg" alt="Imagen Llamativa" class="img-fluid mb-4">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-truck fa-4x mb-4" style="color: #ffc44c;"></i>
                    <h5 class="card-title">Gestión de Repartidores</h5>
                    <p class="card-text">Administre los repartidores disponibles para la entrega de pedidos.</p>
                    <a href="{{ route('repartidor.index') }}" class="btn btn-primary">Ver Repartidores</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-utensils fa-4x mb-4" style="color: #ffc44c;"></i>
                    <h5 class="card-title">Gestión de Pedidos</h5>
                    <p class="card-text">Realice y administre los pedidos de los clientes.</p>
                    <br>
                    <a href="{{route('pedidoT.index')}}" class="btn btn-primary">Ver Pedidos</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-chart-line fa-4x mb-4" style="color: #ffc44c;"></i>
                    <h5 class="card-title">Reporte de Pedidos</h5>
                    <p class="card-text">Obtenga información sobre los envíos de pedidos realizados en el restaurante.</p>
                    <a href="{{ route('reporte.pedidosDetalleT') }}" class="btn btn-primary">Ver Reporte</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-file-invoice-dollar fa-4x mb-4" style="color: #ffc44c;"></i>
                    <h5 class="card-title">Reporte de Pagos</h5>
                    <p class="card-text">Acceda a los registros de pagos del restaurante para un mejor control.</p>
                    <a href="#" class="btn btn-primary">Ver Reporte</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
