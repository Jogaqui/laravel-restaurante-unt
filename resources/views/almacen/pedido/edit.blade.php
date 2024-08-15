@extends('transporte.plantillaT')

@section('titulo','Editar Pedido')

@section('contenido')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <h2 class="card-title text-center mb-4">EDITAR PEDIDO</h2>
                    </div>
                    
                    <form method="POST" action="{{route('pedidoT.update',$pedidoT->idPedido)}}">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Id-Pedido:</label>
                            <input class="form-control" type="text" id="idPedido" name="idPedido" value="{{$pedidoT->idPedido}}" disabled/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Cliente:</label>
                            <select name="idCliente" id="idCliente" class="form-control">
                                @foreach ($clienteT as $itemclienteT)
                                    <option value="{{$itemclienteT['idCliente']}}" {{$itemclienteT->idCliente == $pedidoT->idCliente ? 'selected':''}}>{{$itemclienteT['idCliente']}} - {{$itemclienteT['nombre']}}</option>
                                @endforeach
                                <option value="0"> -- NO REGISTRAR CLIENTE --</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Producto:</label>
                            <select name="idProducto" id="idProducto" class="form-control">
                                @foreach ($productoT as $itemproductoT)
                                    <option value="{{$itemproductoT['idProducto']}}" {{$itemproductoT->idProducto == $pedidoT->idProducto ? 'selected':''}}>{{$itemproductoT['idProducto']}} - {{$itemproductoT['descripcion']}}</option>
                                @endforeach
                                <option value="0"> -- NO REGISTRAR PRODUCTO --</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="stock">Cantidad:</label>
                            <input class="form-control @error('cantidad') is-invalid @enderror" type="text" id="cantidad" name="cantidad" value="{{$pedidoT->cantidad}}"/>
                            <!-- Mensaje posible de error -->
                            @error('cantidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> Grabar</button>
                            <a href="{{route('pedidoT.cancelar')}}" class="btn btn-danger btn-lg"><i class="fas fa-ban"></i> Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
