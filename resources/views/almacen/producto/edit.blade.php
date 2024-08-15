@extends('almacen.plantillaA')

@section('titulo', 'Editar Producto')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-white" style="text-align: center">
                    <h1 class="mb-0">
                        <i class="fas fa-edit"></i> Editar Producto
                    </h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('productoA.update', $productoA->idProducto)}}">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="id">ID:</label>
                            <input class="form-control" type="text" id="id" name="id" value="{{$productoA->idProducto}}" disabled/>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <input class="form-control @error('descripcion') is-invalid @enderror" type="text" id="descripcion" name="descripcion" value="{{$productoA->descripcion}}"/>
                            <!-- Mensaje posible de error -->
                            @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio:</label>
                            <input class="form-control @error('precio') is-invalid @enderror" type="text" id="precio" name="precio" value="{{$productoA->precio}}"/>
                            <!-- Mensaje posible de error -->
                            @error('precio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock:</label>
                            <input class="form-control @error('stock') is-invalid @enderror" type="text" id="stock" name="stock" value="{{$productoA->stock}}"/>
                            <!-- Mensaje posible de error -->
                            @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mr-3"><i class="fas fa-save"></i> Actualizar</button>
                            <a href="{{route('productoA.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
