@extends('almacen.plantillaA')

@section('contenido')
<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6 text-center">
            <h1 class="mb-4">¿Estás seguro de eliminar este registro?</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Código:</h5>
                    <p class="card-text">{{$insumoAlm->idInsumo}}</p>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Nombre:</h5>
                    <p class="card-text">{{$insumoAlm->nombreIn}}</p>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Stock:</h5>
                    <p class="card-text">S/. {{$insumoAlm->stockIn}}</p>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Lote:</h5>
                    <p class="card-text">S/. {{$insumoAlm->lote}}</p>
                </div>
            </div>
            <hr>
            <form method="POST" action="{{route('insumoA.destroy',$insumoAlm->idInsumo)}}">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger btn-lg"><i class="fas fa-check-square"></i> Sí, eliminar</button>
                <a href="{{route('insumoA.cancelar')}}" class="btn btn-primary btn-lg"><i class="fas fa-times-circle"></i> No, cancelar</a>
            </form>
        </div>
        <div class="col-md-6 text-center">
            <img src="{{ asset('img/producto.jpeg') }}" alt="Delete Icon" class="img-fluid animated bounceIn" style="max-height: 300px;">
        </div>
    </div>
</div>
@endsection
