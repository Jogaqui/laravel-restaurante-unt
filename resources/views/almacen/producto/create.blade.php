@extends('almacen.plantillaA')

@section('titulo', 'Crear Producto')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-light shadow">
                <div class="card-body">
                    <h1 class="text-center mb-4">Nuevo Producto</h1>
                    <form method="POST" action="{{route('productoA.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="descripcion" class="control-label">Descripción:</label>
                            <input class="form-control @error('descripcion') is-invalid @enderror" type="text" id="descripcion" name="descripcion" required />
                            <!-- Mensaje posible de error -->
                            @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="precio" class="control-label">Precio:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">S/.</span>
                                </div>
                                <input class="form-control @error('precio') is-invalid @enderror" type="number" id="precio" name="precio" min="0" step="0.01" required />
                            </div>
                            <!-- Mensaje posible de error -->
                            @error('precio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="stock" class="control-label">Stock:</label>
                            <input class="form-control @error('stock') is-invalid @enderror" type="number" id="stock" name="stock" min="0" required />
                            <!-- Mensaje posible de error -->
                            @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-save"></i> Grabar</button>
                            <a href="{{route('productoA.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
