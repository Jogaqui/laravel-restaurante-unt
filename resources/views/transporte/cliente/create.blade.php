@extends('transporte.plantillaT')

@section('titulo','Crear Cliente Delivery')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-body">
            {{-- <h1 class="card-title">Cliente Nuevo - Delivery</h1> --}}
            <div class="col-md-8">
                <h3>Cliente Nuevo - Delivery</h3>
            </div>
            <form method="POST" action="{{route('clienteT.store')}}">
                @csrf
                <div class="form-group">
                    <label for="dni">DNI:</label>
                    <input class="form-control @error('dni') is-invalid @enderror" type="text" id="dni" name="dni" maxlength="8" required>
                    @error('dni')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nombre">Nombres:</label>
                    <input class="form-control @error('nombre') is-invalid @enderror" type="text" id="nombre" name="nombre" required>
                    @error('nombre')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input class="form-control @error('direccion') is-invalid @enderror" type="text" id="direccion" name="direccion" required>
                    @error('direccion')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="correo">Correo electrónico:</label>
                    <input class="form-control @error('correo') is-invalid @enderror" type="email" id="correo" name="correo" required>
                    @error('correo')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input class="form-control @error('telefono') is-invalid @enderror" type="tel" id="telefono" name="telefono" maxlength="9" required>
                    @error('telefono')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-save"></i> Grabar</button>
                    <a href="{{route('clienteT.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
