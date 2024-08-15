@extends('almacen.plantillaA')

@section('titulo', 'Editar registro de insumo')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-white" style="text-align: center">
                    <h1 class="mb-0">
                        <i class="fas fa-edit"></i> Editar insumo
                    </h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('insumoA.update', $insumoAlm->idInsumo)}}">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="descripcion" class="control-label">Nombre:</label>
                            <input class="form-control @error('nombreIn') is-invalid @enderror" type="text" value="{{$insumoAlm->nombreIn}} " id="nombreIn" name="nombreIn" required />
                            <!-- Mensaje posible de error -->
                            @error('nombreIn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="control-label">Descripción:</label>
                            <input class="form-control @error('descripcionIn') is-invalid @enderror" value="{{$insumoAlm->descripcionIn }}" type="text" id="descripcionIn" name="descripcionIn" required />
                            <!-- Mensaje posible de error -->
                            @error('descripcionIn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="descripcion" class="control-label">Fecha de adquisición:</label>
                            <input class="form-control @error('fechaAdquisicion') is-invalid @enderror" value="{{$insumoAlm->fechaAdquisicion }}" type="date" id="fechaAdquisicion" name="fechaAdquisicion" required />
                            <!-- Mensaje posible de error -->
                            @error('fechaAdquisicion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="control-label">Fecha de caducidad:</label>
                            <input class="form-control @error('fechaCaducidad') is-invalid @enderror" value="{{$insumoAlm->fechaCaducidad}} " type="text" id="fechaCaducidad" name="fechaCaducidad" required />
                            <!-- Mensaje posible de error -->
                            @error('fechaCaducidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="lote" class="control-label">Lote:</label>
                            <div class="input-group">
                              
                                <input class="form-control @error('lote') is-invalid @enderror"  value="{{$insumoAlm->lote}} " type="text" id="lote" name="lote" min="0" required />
                            </div>
                            <!-- Mensaje posible de error -->
                            @error('lote')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="stock" class="control-label">Stock:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">N° </span>
                                </div>
                                <input class="form-control @error('stockIn') is-invalid @enderror" value="{{$insumoAlm->stockIn}} " type="text" id="stockIn" name="stockIn" min="0" required />
                            </div>
                            <!-- Mensaje posible de error -->
                            @error('stockIn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                    


                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mr-3"><i class="fas fa-save"></i> Actualizar</button>
                            <a href="{{route('productoT.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
