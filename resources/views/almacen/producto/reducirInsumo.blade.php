@extends('almacen.plantillaA')

@section('titulo', 'Crear Producto')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-light shadow">
            
                <!-- form para reducir el stock de insumos -->
                <div class="card-body">
                    <h4 class="text-center mb-4">Selecciona los insumos que se utilizaron en:{{$productoA-> descripcion}} </h4>
                    <form method="POST" action=" {{route('productoA.reducirInsumo', $productoA->idProducto)}}">
                   

                        @csrf
                        <div class="form-group">
                            <label for="descripcion" class="control-label">Insumo:</label>
                            <select name="idInsumo" class="form-control" required>
                                    <option value="">Seleccione el insumo</option>
                                    @foreach ($insumos as $insumo)
                                        <option value="{{ $insumo->idInsumo }}">{{ $insumo->nombreIn }}</option>
                                    @endforeach
                                </select>
                        </div>


                        <div class="form-group">
                            <label for="stock" class="control-label">Cantidad:</label>
                            <input class="form-control @error('stockIn') is-invalid @enderror" type="number" id="stockIn" name="stockIn" min="0" required />
                            <!-- Mensaje posible de error -->
                            @error('stockIn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-save"></i> Actualizar insumo</button>
                            <a href="{{route('productoA.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
