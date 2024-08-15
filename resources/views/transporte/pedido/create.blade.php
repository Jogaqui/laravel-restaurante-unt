@extends('transporte.plantillaT')

@section('titulo', 'Crear Pedido')

@section('contenido')
    <div class="container">
        <h1 class="mb-4">Pedido Nuevo</h1>
        <form method="POST" action="{{ route('pedidoT.store') }}">
            @csrf
            <div class="form-group">
                <label for="idCliente" class="control-label">Cliente:</label>
                <select name="idCliente" id="idCliente" class="form-control">
                    <option selected disabled>Elija un Cliente...</option>
                    @foreach ($clienteT as $itemClienteT)
                        <option value="{{ $itemClienteT['idCliente'] }}">{{ $itemClienteT['idCliente'] }} -
                            {{ $itemClienteT['nombre'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="idProducto" class="control-label">Producto:</label>
                <select name="idProducto" id="idProducto" class="form-control">
                    <option selected disabled>Elija un Producto...</option>
                    @foreach ($productoT as $itemProductoT)
                        <option value="{{ $itemProductoT['idProducto'] }}">{{ $itemProductoT['idProducto'] }} -
                            {{ $itemProductoT['descripcion'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="cantidad" class="control-label">Cantidad:</label>
                <input class="form-control @error('cantidad') is-invalid @enderror" type="number" id="cantidad"
                    name="cantidad" min="1" required />
                <!-- Mensaje de error en caso de que la cantidad no sea válida -->
                @error('cantidad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
            <a href="{{ route('pedidoT.cancelar') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
@endsection
