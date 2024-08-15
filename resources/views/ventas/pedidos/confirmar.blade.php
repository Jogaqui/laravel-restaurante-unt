@extends('layout.plantilla')

@section('contenido')
<div class="container">
    <h1>Desea eliminar Registro ?</h1>
    <br>
    <b>ID Pedido:</b>
     {{$pedido->idpedido}}
    <br>
    <b>ID Cliente:</b>
    @if ($pedido->idcliente==0)
        SIN CLIENTE
    @else
        {{$pedido->idcliente}}
    @endif
    <br>
    <b>  Situación:</b>
    @if ($pedido->situacion==0)
        <b style="width:110px; border-radius: 10px; font-family: Roboto, sans-serif; font-weight:bold; background-color: rgb(47, 255, 78)">Sin atención</b>
    @else
        <b style="width:110px; border-radius: 10px;  font-family: Roboto, sans-serif; font-weight:bold; background-color: rgb(255, 45, 45)">En atención</b>
    @endif
    <hr>
    <form method="POST" action="{{route('pedido.destroy',$pedido->idpedido)}}">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i> SI</button>
        <a href="{{route('pedido.cancelar')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO</a>
    </form>
    
</div>
@endsection