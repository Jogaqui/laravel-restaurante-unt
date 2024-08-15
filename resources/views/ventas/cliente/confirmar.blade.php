@extends('layout.plantilla')

@section('contenido')
<div class="container">
    <h1>Desea eliminar Cliente ?</h1>
    <br>
    <b>Codigo:</b>
    {{$cliente->idcliente}}
    <b>  - DNI:</b>
    {{$cliente->dni}}
    <b>  - Nombres:</b>
    {{$cliente->nombres}}
    <b>  - Direccion:</b>
    {{$cliente->direccion}}
    <b>  - Email:</b>
    {{$cliente->email}}
    <b>  - Teléfono:</b>
    {{$cliente->telefono}}
    <hr>
    <form method="POST" action="{{route('cliente.destroy',$cliente->idcliente)}}">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i> SI</button>
        <a href="{{route('cliente.cancelar')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO</a>
    </form>
    
</div>
@endsection