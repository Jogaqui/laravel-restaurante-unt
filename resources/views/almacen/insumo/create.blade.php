@extends('almacen.plantillaA')

@section('titulo', 'Registrar insumo')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-light shadow">
                <div class="card-body">
                    <h1 class="text-center mb-4">Nuevo Insumo</h1>
                    <form method="POST" action="{{route('insumoA.store')}}">
                        @csrf

                        <div class="form-group">
                            <label for="descripcion" class="control-label">Nombre:</label>
                            <input class="form-control @error('nombreIn') is-invalid @enderror" type="text" id="nombreIn" name="nombreIn" required />
                            <!-- Mensaje posible de error -->
                            @error('nombreIn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="control-label">Descripción:</label>
                            <input class="form-control @error('descripcionIn') is-invalid @enderror" type="text" id="descripcionIn" name="descripcionIn" required />
                            <!-- Mensaje posible de error -->
                            @error('descripcionIn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="descripcion" class="control-label">Fecha de adquisición:</label>
                            <input class="form-control @error('fechaAdquisicion') is-invalid @enderror" type="date" id="fechaAdquisicion" name="fechaAdquisicion" required />
                            <!-- Mensaje posible de error -->
                            @error('fechaAdquisicion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="control-label">Fecha de caducidad:</label>
                            <input class="form-control @error('fechaCaducidad') is-invalid @enderror" type="date" id="fechaCaducidad" name="fechaCaducidad" required />
                            <!-- Mensaje posible de error -->
                            @error('fechaCaducidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="precio" class="control-label">Lote:</label>
                            <div class="input-group">
                              
                                <input class="form-control @error('lote') is-invalid @enderror" type="number" id="lote" name="lote" min="0" required />
                            </div>
                            <!-- Mensaje posible de error -->
                            @error('lote')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="precio" class="control-label">Stock:</label>
                            <div class="input-group">
                               
                                <input class="form-control @error('stockIn') is-invalid @enderror" type="number" id="stockIn" name="stockIn" min="0" required />
                            </div>
                            <!-- Mensaje posible de error -->
                            @error('stockIn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                  

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-save"></i> Grabar</button>
                            <a href="{{route('insumoA.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
