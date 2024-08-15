@extends('layout.plantilla')
@section('titulo','Crear Pedido')

@section('contenido')
<div>
    <h1>Pedido Nuevo</h1>
    <form method="POST" action="{{route('pedido.store2',$mesa->idmesa)}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label class="control-label">Cliente:</label>
            <select name="idcliente" id="idcliente" class="form-control">
                <option selected disabled>Elija un Cliente...</option>
                @foreach ($cliente as $itemcliente)
                    <option value="{{$itemcliente['idcliente']}}">{{$itemcliente['idcliente']}} - {{$itemcliente['nombres']}}</option>
                @endforeach
                <option value="0"> -- NO REGISTRAR CLIENTE --</option>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Observaciones:</label>
            <input class="form-control @error('observaciones') is-invalid @enderror" type="text" placeholder="Ingrese Observaciones" id="observaciones" name="observaciones" maxlength="30"/>
                @error('observaciones')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>
        <div class="form-group">
            <label class="control-label">Medio de Pago:</label>
            <select class="form-select @error('medioPago') is-invalid @enderror" aria-label="Default select example" id="medioPago" name="medioPago">
                <option selected disabled>ESCOGER UNO...</option>
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
            <select class="form-select @error('modalidad') is-invalid @enderror" aria-label="Default select example" id="modalidad" name="modalidad">
                <option selected disabled>ESCOGER UNO...</option>
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