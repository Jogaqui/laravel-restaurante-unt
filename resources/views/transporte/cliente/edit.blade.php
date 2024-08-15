@extends('transporte.plantillaT')

@section('titulo', 'Editar Cliente')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <h1 class="card-title" style="font-family:Arial, Helvetica, sans-serif; font-size: 23px">EDITAR CLIENTE</h1>
            </div>

            <form method="POST" action="{{route('clienteT.update', $clienteT->idCliente)}}" class="needs-validation" novalidate>
                @method('put')
                @csrf

                <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label">ID:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id" name="id" value="{{$clienteT->idCliente}}" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="dni" class="col-sm-2 col-form-label">DNI:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" value="{{$clienteT->dni}}" maxlength="8" required>
                        @error('dni')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombres:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{$clienteT->nombre}}" required>
                        @error('nombre')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="direccion" class="col-sm-2 col-form-label">Dirección:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" value="{{$clienteT->direccion}}" required>
                        @error('direccion')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="correo" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo" value="{{$clienteT->correo}}" required>
                        @error('correo')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="telefono" class="col-sm-2 col-form-label">Teléfono:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{$clienteT->telefono}}" maxlength="9" required>
                        @error('telefono')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
                        <a href="{{route('clienteT.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
