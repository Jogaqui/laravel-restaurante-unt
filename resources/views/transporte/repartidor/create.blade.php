@extends('transporte.plantillaT')

@section('titulo', 'Crear Repartidor')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            <h1 class="card-title" style="font-family: Arial, Helvetica, sans-serif ; font-size:24px">Repartidor Nuevo</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('repartidor.store')}}">
                @csrf

                <div class="form-group">
                    <label for="dni" class="control-label">DNI:</label>
                    <input class="form-control @error('dni') is-invalid @enderror" type="text" id="dni" name="dni"
                        maxlength="8" required>
                    @error('dni')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nombres" class="control-label">Nombres:</label>
                    <input class="form-control @error('nombres') is-invalid @enderror" type="text" id="nombres"
                        name="nombres" required>
                    @error('nombres')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="direccion" class="control-label">Dirección:</label>
                    <input class="form-control @error('direccion') is-invalid @enderror" type="text" id="direccion"
                        name="direccion" required>
                    @error('direccion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="control-label">Email:</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="text" id="email"
                        name="email" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telefono" class="control-label">Teléfono:</label>
                    <input class="form-control @error('telefono') is-invalid @enderror" type="text" id="telefono"
                        name="telefono" maxlength="9" required>
                    @error('telefono')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="sueldo" class="control-label">Sueldo:</label>
                    <input class="form-control @error('sueldo') is-invalid @enderror" type="text" id="sueldo"
                        name="sueldo" required>
                    @error('sueldo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="vehiculo" class="control-label">Vehiculo:</label>
                    <select class="form-control @error('vehiculo') is-invalid @enderror" id="vehiculo"
                        name="vehiculo" required>
                        <option value="">Seleccionar vehículo</option>
                        <option value="automovil">Automóvil</option>
                        <option value="motocicleta">Motocicleta</option>
                        <option value="camioneta">Camioneta</option>
                        <!-- Agrega aquí más opciones según tus necesidades -->
                    </select>
                    @error('vehiculo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="placa" class="control-label">Placa:</label>
                    <input class="form-control @error('placa') is-invalid @enderror" type="text" id="placa"
                        name="placa" required>
                    @error('placa')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mr-3"><i class="fas fa-save"></i> Grabar</button>
                    <a href="{{route('repartidor.cancelar')}}" class="btn btn-danger"><i
                            class="fas fa-ban"></i> Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
