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
                    <h5 class="mb-4">Pedido</h5>
                    <p><b>ID Pedido:</b> {{$pedidoT->idPedido}}</p>
                    <p><b>ID Cliente:</b> {{$pedidoT->cliente->idCliente}} - {{$pedidoT->cliente->nombre}}</p>
                    <p><b>ID Producto:</b> {{$pedidoT->producto->idProducto}} - {{$pedidoT->producto->descripcion}}</p>
                    <p><b>Cantidad:</b> {{$pedidoT->cantidad}}</p>
                </div>
                <div class="col-md-6">
                    <img src="/img/pedido2.jpeg" alt="Imagen Llamativa" class="img-fluid mb-4">
                </div>
            </div>
            <div class="text-center">
                <form method="POST" action="{{route('pedidoT.destroy',$pedidoT->idPedido)}}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i> Sí, Eliminar</button>
                    <a href="{{route('pedidoT.cancelar')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> No, Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
