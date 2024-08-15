@extends('transporte.plantillaT')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-center mb-4">
                <h1 class="card-title">¿Desea eliminar Cliente?</h1>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <b>Código:</b> {{$clienteT->idcliente}}
                </div>
                <div class="col-md-3">
                    <b>DNI:</b> {{$clienteT->dni}}
                </div>
                <div class="col-md-3">
                    <b>Nombres:</b> {{$clienteT->nombre}}
                </div>
                <div class="col-md-3">
                    <b>Dirección:</b> {{$clienteT->direccion}}
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <b>Correo electrónico:</b> {{$clienteT->correo}}
                </div>
                <div class="col-md-6">
                    <b>Teléfono:</b> {{$clienteT->telefono}}
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-center">
                <form method="POST" action="{{route('clienteT.destroy',$clienteT->idCliente)}}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger mr-3"><i class="fas fa-check-square"></i> SI</button>
                </form>

                <a href="{{route('clienteT.cancelar')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO</a>
            </div>
        </div>
    </div>
</div>
@endsection
