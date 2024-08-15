@extends('layout.plantilla')

@section('contenido')
<div class="container">
    <h1>Desea eliminar Producto ?</h1>
    <br>
    <b>Codigo:</b>
    {{$producto->idproducto}}
    <b>  - Descripcion:</b>
    {{$producto->descripcion}}
    <b>  - Precio:</b>
    {{$producto->precio}}
    <hr>
    <form method="POST" action="{{route('producto.destroy',$producto->idproducto)}}">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i> SI</button>
        <a href="{{route('producto.cancelar')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO</a>
    </form>
    
</div>
@endsection