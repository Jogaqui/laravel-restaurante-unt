@extends('transporte.plantillaT')

@section('titulo','Editar Repartidor')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-body">
            {{-- <h1 class="card-title">Editar Repartidor</h1> --}}
            <div class="d-flex justify-content-center mb-4">
                <h1 class="card-title" style="font-family: Arial, Helvetica, sans-serif; font-size:24px">Editar Repartidor</h1>
            </div>
            <form method="POST" action="{{route('repartidor.update',$repartidor->idRepartidor)}}">
                @method('put')
                @csrf
                <div class="form-group">
                    <label>ID:</label>
                    <input class="form-control" type="text" id="id" name="id" value="{{$repartidor->idRepartidor}}" disabled/>
                </div>

                <div class="form-group">
                    <label class="control-label">DNI:</label>
                    <input class="form-control @error('dni') is-invalid @enderror" type="text" id="dni" name="dni" value="{{$repartidor->dni}}" maxlength="8"/>
                    @error('dni')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="control-label">Nombres:</label>
                    <input class="form-control @error('nombres') is-invalid @enderror" type="text" id="nombres" name="nombres" value="{{$repartidor->nombres}}"/>
                    @error('nombres')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="control-label">Dirección:</label>
                    <input class="form-control @error('direccion') is-invalid @enderror" type="text" id="direccion" name="direccion" value="{{$repartidor->direccion}}" />
                    @error('direccion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="control-label">Email:</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" value="{{$repartidor->email}}" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="control-label">Telefono:</label>
                    <input class="form-control @error('telefono') is-invalid @enderror" type="text" id="telefono" name="telefono" value="{{$repartidor->telefono}}" maxlength="9" />
                    @error('telefono')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="control-label">Sueldo:</label>
                    <input class="form-control @error('sueldo') is-invalid @enderror" type="text" id="sueldo" name="sueldo" value="{{$repartidor->sueldo}}" />
                    @error('sueldo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="control-label">Vehiculo:</label>
                    <select class="form-control @error('vehiculo') is-invalid @enderror" id="vehiculo" name="vehiculo">
                        <option value="">Seleccionar vehículo</option>
                        <option value="automovil" @if($repartidor->vehiculo === 'automovil') selected @endif>Automóvil</option>
                        <option value="motocicleta" @if($repartidor->vehiculo === 'motocicleta') selected @endif>Motocicleta</option>
                        <option value="camioneta" @if($repartidor->vehiculo === 'camioneta') selected @endif>Camioneta</option>
                        <!-- Agrega aquí más opciones según tus necesidades -->
                    </select>
                    @error('vehiculo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label class="control-label">Placa:</label>
                    <input class="form-control @error('placa') is-invalid @enderror" type="text" id="placa" name="placa" value="{{$repartidor->placa}}" />
                    @error('placa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mr-3"><i class="fas fa-save"></i> Actualizar</button>
                    <a href="{{route('repartidor.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
