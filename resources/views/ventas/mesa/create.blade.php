@extends('layout.plantilla')

@section('titulo','Crear Mesa')

@section('contenido')
<div>
    <h1>Mesa Nueva</h1>
    <form method="POST" action="{{route('mesa.store')}}">
        @csrf
        
        <div class="form-group">
            <label class="control-label">Pedido:</label>
            <select name="idpedido" id="idpedido" class="form-control">
                <option selected disabled>Elija un Pedido...</option>
                @foreach ($pedidos as $itempedido)
                    <option value="{{$itempedido['idpedido']}}">{{$itempedido['idpedido']}}</option>
                @endforeach
                <option value="0"> -- NO REGISTRAR PEDIDO --</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
        <a href="{{route('mesa.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
    </form>
</div>
@endsection