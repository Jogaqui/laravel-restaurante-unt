@extends('transporte.plantillaT')

@section('contenido')
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-center mb-4">
                <h1 class="card-title">Desea eliminar Repartidor?</h1>
            </div>
            <div class="row mb-2">
                <div class="col-md-3">
                    <b>Codigo:</b> {{$repartidor->idRepartidor}}
                </div>
                <div class="col-md-3">
                    <b>DNI:</b> {{$repartidor->dni}}
                </div>
                <div class="col-md-3">
                    <b>Nombres:</b> {{$repartidor->nombres}}
                </div>
                <div class="col-md-3">
                    <b>Direccion:</b> {{$repartidor->direccion}}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3">
                    <b>Email:</b> {{$repartidor->email}}
                </div>
                <div class="col-md-3">
                    <b>Teléfono:</b> {{$repartidor->telefono}}
                </div>
                <div class="col-md-3">
                    <b>Sueldo:</b> {{$repartidor->sueldo}}
                </div>
                <div class="col-md-3">
                    <b>Vehiculo:</b> {{$repartidor->vehiculo}}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3">
                    <b>Placa:</b> {{$repartidor->placa}}
                </div>
            </div>

            <hr>

            <div class="d-flex justify-content-center">
                <form method="POST" action="{{route('repartidor.destroy',$repartidor->idRepartidor)}}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger mr-3"><i class="fas fa-check-square"></i> SI</button>
                </form>

                <a href="{{route('repartidor.cancelar')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO</a>
            </div>
        </div>
    </div>
</div>
@endsection
