@extends('layout.plantilla')

@section('contenido')
<div class="container">
    <h1>Desea eliminar Registro ?</h1>
    <br>
    <b>ID Mesa:</b>
     {{$mesa->idmesa}}
    <b>  - ID Pedido:</b>
     {{$mesa->idpedido}}
    <b>  - Disponibilidad:</b>
     {{$mesa->disponibilidad}}
    <hr>
    <form method="POST" action="{{route('mesa.destroy',$mesa->idmesa)}}">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i> SI</button>
        <a href="{{route('mesa.cancelar')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO</a>
    </form>
    
</div>
@endsection