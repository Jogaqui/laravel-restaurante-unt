@extends('layout.plantilla')

@section('titulo','Crear Categoria')

@section('contenido')
<div>
    <h1>Registro Nuevo</h1>
    <form method="POST" action="{{route('categoria.store')}}">
        @csrf
        <div class="form-group">
            <label class="control-label">Descripción:</label>
                <input class="form-control @error('descripcion') is-invalid @enderror" type="text"
                id="descripcion" name="descripcion"/>
                <!-- Mensaje posible de error -->
                @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
        <a href="{{route('cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
    </form>
</div>
@endsection