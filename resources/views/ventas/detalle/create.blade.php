@extends('layout.plantilla')

@section('titulo','Agregar Producto')

@section('contenido')
<div>
    <h1>Agregar Producto al Pedido</h1>
    <form method="POST" action="{{route('detalle.store')}}">
        @csrf
        <div class="form-group">
            <label class="control-label">Pedido:</label>
            <select name="idpedido" id="idpedido" class="form-control">
                <option selected disabled>Elija el Pedido...</option>
                @foreach ($pedido as $itempedido)
                    <option value="{{$itempedido['idpedido']}}">{{$itempedido['idpedido']}}</option>
                @endforeach
                <option value="0"> -- NO AGREGAR PEDIDO --</option>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Producto:</label>
            <select name="idproducto" id="idproducto" class="form-control">
                <option selected disabled>Elija el Pedido...</option>
                @foreach ($producto as $itemproducto)
                    <option value="{{$itemproducto['idproducto']}}">{{$itemproducto['descripcion']}}</option>
                @endforeach
                <option value="0"> -- NO AGREGAR PRODUCTO --</option>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Cantidad:</label>
            <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Ingrese la cantidad">
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
        <a href="{{route('detalle.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
    </form>
</div>
@endsection