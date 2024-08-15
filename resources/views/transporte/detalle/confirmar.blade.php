@extends('transporte.plantillaT')

@section('contenido')
<div class="container">
    <div class="card border-primary mt-5">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">¿Desea eliminar este registro?</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-4">DETALLE PEDIDO</h5>
                    <p><b>ID Detalle pedido:</b> {{ $detalleT->idDetalleP }}</p>
                    <p><b>ID Pedido:</b> {{ $detalleT->pedido->idPedido }}</p>
                    <p><b>Nombre del cliente:</b> {{ $detalleT->pedido->cliente->nombre }}</p>
                    <p><b>Domicilio del cliente:</b> {{ $detalleT->pedido->cliente->direccion }}</p>
                    <p><b>Nombre del repartidor:</b> {{ $detalleT->repartidor->nombres }}</p>
                    <p><b>Telefono del repartidor:</b> {{ $detalleT->repartidor->telefono }}</p>
                    <p><b>Fecha del pedido:</b> {{ $detalleT->fechaPedido }}</p>
                    <p><b>Modo de pago:</b> {{ $detalleT->modoPago }}</p>        
                    <p>
                        <b>Total a pagar:</b>
                            @php
                                $precioProducto = $detalleT->pedido->producto->precio;
                                $cantidadProducto = $detalleT->pedido->cantidad;
                                $totalPagar = $precioProducto * $cantidadProducto;
                            @endphp
                        {{ $totalPagar }}
                    </p>
                </div>
            </div>
            <div class="text-center">
                <form method="POST" action="{{route('detalleT.destroy',$detalleT->idDetalleP)}}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i> Sí, Eliminar</button>
                    <a href="{{route('detalleT.cancelar')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> No, Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
