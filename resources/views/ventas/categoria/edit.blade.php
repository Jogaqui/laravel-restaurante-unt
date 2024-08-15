@extends('layout.plantilla')

@section('titulo','Editar Categoria')

@section('contenido')
<div>
    <h1>Editar Registro</h1>
    <form method="POST" action="{{route('categoria.update',$categoria->idcategoria)}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label>Código:</label>
                <input class="form-control type="text"
                id="id" name="id" value="{{$categoria->idcategoria}}" disabled/>
                
        </div>
        <div class="form-group">
            <label class="control-label">Descripción:</label>
                <input class="form-control @error('descripcion') is-invalid @enderror" type="text"
                id="descripcion" name="descripcion" value="{{$categoria->descripcion}}"/>
                <!-- Mensaje posible de error -->
                @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
        <a href="{{route('cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
    </form>
</div>
@endsection