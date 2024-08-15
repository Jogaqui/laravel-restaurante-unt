@extends('transporte.plantillaT')

@section('contenido')
<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6 text-center">
            <h1 class="mb-4">¿Estás seguro de eliminar este Producto?</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Código:</h5>
                    <p class="card-text">{{$productoT->idProducto}}</p>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Descripción:</h5>
                    <p class="card-text">{{$productoT->descripcion}}</p>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Precio:</h5>
                    <p class="card-text">S/. {{$productoT->precio}}</p>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Stock:</h5>
                    <p class="card-text">S/. {{$productoT->stock}}</p>
                </div>
            </div>
            <hr>
            <form method="POST" action="{{route('productoT.destroy',$productoT->idProducto)}}">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger btn-lg"><i class="fas fa-check-square"></i> Sí, eliminar</button>
                <a href="{{route('productoT.cancelar')}}" class="btn btn-primary btn-lg"><i class="fas fa-times-circle"></i> No, cancelar</a>
            </form>
        </div>
        <div class="col-md-6 text-center">
            <img src="{{ asset('img/producto.jpeg') }}" alt="Delete Icon" class="img-fluid animated bounceIn" style="max-height: 300px;">
        </div>
    </div>
</div>
@endsection
