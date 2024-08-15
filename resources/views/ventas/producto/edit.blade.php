@extends('layout.plantilla')

@section('titulo','Editar Producto')

@section('contenido')
<div>
    <h1>Editar Producto</h1>
    <form method="POST" action="{{route('producto.update',$producto->idproducto)}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label>ID:</label>
                <input class="form-control type="text"
                id="id" name="id" value="{{$producto->idproducto}}" disabled/>
        </div>

        <div class="form-group">
            <label class="control-label">Descripción:</label>
                <input class="form-control @error('descripcion') is-invalid @enderror" type="text"
                id="descripcion" name="descripcion" value="{{$producto->descripcion}}"/>
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
                id="precio" name="precio" value="{{$producto->precio}}"/>
                <!-- Mensaje posible de error -->
                @error('precio')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>



        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
        <a href="{{route('producto.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
    </form>
</div>
@endsection