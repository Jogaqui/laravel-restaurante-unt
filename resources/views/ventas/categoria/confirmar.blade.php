@extends('layout.plantilla')

@section('contenido')
<div class="container">
    <h1>Desea eliminar Registro ?</h1>
    <br>
    <b>Codigo:</b>
     {{$categoria->idcategoria}}<b>  - Descripcion:</b>{{$categoria->descripcion}}
    <hr>
    <form method="POST" action="{{route('categoria.destroy',$categoria->idcategoria)}}">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i> SI</button>
        <a href="{{route('cancelar')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO</a>
    </form>
    
</div>
@endsection