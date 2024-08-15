@extends('layout.plantilla')

@section('titulo','Editar Mesa')

@section('contenido')
<div>
    <h1>Editar Registro</h1>
    <form method="POST" action="{{route('mesa.update',$mesa->idmesa)}}">
        @method('put')
        @csrf
        
        <div class="form-group">
            <label class="control-label">Pedido:</label>
            <select name="idpedido" id="idpedido" class="form-control">
                @foreach ($pedidos as $itempedido)
                    <option value="{{$itempedido['idpedido']}}" {{$itempedido->idpedido == $mesa->idpedido ? 'selected':''}}>{{$itempedido['idpedido']}}</option>
                @endforeach
                <option value="0"> -- NO REGISTRAR PEDIDO --</option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
        <a href="{{route('mesa.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
    </form>
</div>
@endsection