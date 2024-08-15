@extends('layout.plantilla')

@section('titulo','Crear Producto')

@section('contenido')
<div>
    <h1>Producto Nuevo</h1>
    <form method="POST" action="{{route('producto.store')}}">
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

        <div class="form-group">
            <label class="control-label">Precio:</label>
                <input class="form-control @error('precio') is-invalid @enderror" type="text"
                id="precio" name="precio" value="0" />
                <!-- Mensaje posible de error -->
                @error('precio')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
        <a href="{{route('producto.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
    </form>
</div>
@endsection