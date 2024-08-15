@extends('layout.plantilla')

@section('titulo','Editar Pedido')

@section('contenido')
<div>
    <h1>Editar Registro</h1>
    <form method="POST" action="{{route('pedido.update',$pedido->idpedido)}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label class="control-label">Id-Pedido:</label>
            <input class="form-control @error('idpedido') is-invalid @enderror" type="text" id="idpedido" name="idpedido" value="{{$pedido->idpedido}}" disabled/>
        </div>
        <div class="form-group">
            <label class="control-label">Cliente:</label>
            <select name="idcliente" id="idcliente" class="form-control">
                @foreach ($cliente as $itemcliente)
                    <option value="{{$itemcliente['idcliente']}}" {{$itemcliente->idcliente == $pedido->idcliente ? 'selected':''}}>{{$itemcliente['idcliente']}} - {{$itemcliente['nombres']}}</option>
                @endforeach
                <option value="0"> -- NO REGISTRAR CLIENTE --</option>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Observaciones:</label>
            <input class="form-control @error('observaciones') is-invalid @enderror" type="text" placeholder="Ingrese Observaciones" id="observaciones" name="observaciones" maxlength="30" value="{{$pedido->observaciones}}"/>
                @error('observaciones')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>
        <div class="form-group">
            <label class="control-label">Medio de Pago:</label>
            <select class="form-select @error('medioPago') is-invalid @enderror" aria-label="Default select example" id="medioPago" name="medioPago" value="{{$pedido->medioPago}}">
                <option selected>ESCOGER UNO</option>
                <option value="Tarjeta">Tarjeta</option>
                <option value="Efectivo">Efectivo</option>
                <option value="Yape">Yape</option>
                <option value="Paypal">Paypal</option>
              </select>
                @error('medioPago')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>
        <div class="form-group">
            <label class="control-label">Modalidad:</label>
            <select class="form-select @error('modalidad') is-invalid @enderror" aria-label="Default select example" id="modalidad" name="modalidad" value="{{$pedido->modalidad}}">
                <option selected>ESCOGER UNO</option>
                <option value="1">Local</option>
                <option value="2">Delivery</option>
            </select>
                @error('modalidad')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
        <a href="{{route('pedido.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
    </form>
</div>
@endsection