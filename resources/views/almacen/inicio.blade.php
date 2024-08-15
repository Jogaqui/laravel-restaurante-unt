@extends('almacen.plantillaA')

@section('titulo', '.:: Restaurant ::.')

@section('contenido')

<div class="container-fluid">
    

    <div class="d-flex justify-content-center mb-4">
        <h1 class="card-title" style="font-size: 35px">Gestión de almacén</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8" align="center">
            <img src="/img/almacen2.jpg" alt="Imagen Llamativa" class="img-fluid mb-4">
        </div>
        <div class="col-md-8" align="center">
                    <!-- Button trigger modal -->
            <button id="botonAbrirModal" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Evaluación rápida de insumos
            </button>

            <!-- Modal -->
            <div id="myModal" class="modal fade"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Estado de insumos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach ($insumos as $insumo)
                            <div class="insumo-line" >
                         
                                <div class="insumo-nombre">{{ $insumo->nombreIn }}: </div>
                                <div class="stock-alert" > {{ $insumo->stockIn }} </div>
                                <div class="cuadrito-color"> </div>
                             
                              
                            </div>
                        @endforeach
                    </div>

                        

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        
                        <a type="button" href="{{ route('notifA.create') }}"  class="btn btn-danger fas-fa-alert">Notificar</a>
                    </div>
                </div>
            </div>
        </div>

        </div>
      
    </div>
    <div class="row mt-5">


    @if (auth()->user()->rol == 'Personal de almacén')
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <i class="	fas fa-box-open fa-4x mb-4" style="color: #ffc44c;"></i>
                    <h5 class="card-title">Gestión de Insumos</h5>
                    <p class="card-text">Visualice los insumos disponibles.</p>
                    <a href="{{ route('insumoA.index') }}" class="btn btn-primary">Ver Insumos</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-utensils fa-4x mb-4" style="color: #ffc44c;"></i>
                    <h5 class="card-title">Gestión de Productos</h5>
                    <p class="card-text">Gestione los productos elaborados.</p>
                  
                    <a href="{{route('productoA.index')}}" class="btn btn-primary">Ver Productos</a>
                </div>
            </div>
        </div>

        @endif

        @if (auth()->user()->rol == 'Proveedor')
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-utensils fa-4x mb-4" style="color: #ffc44c;"></i>
                    <h5 class="card-title">Gestión de pedidos</h5>
                    <p class="card-text">Visualice los pedidos.</p>
                    <br>
                    <a href="" class="btn btn-primary">Ver pedidos</a>
                </div>
            </div>
        </div>
        @endif

    </div>
  

</div>


@endsection



