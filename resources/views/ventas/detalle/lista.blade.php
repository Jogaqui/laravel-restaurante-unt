@extends('layout.plantilla')
@section('titulo','Detalle')

@section('contenido')
<h3>DETALLE DEL PEDIDO</h3>

<!-- Botón Nuevo -->
<a href="{{route('detalle.create')}}" class="btn btn-warning"><i class="fas fa-plus"></i>Agregar Producto</a>

<!-- nav -->

<br>
@if(session('datos'))
  <div id="mensaje">
      <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
          {{session('datos')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
  </div>
@endif
<br>

<table class="table">
    <thead>
      <tr class="text-center">
        <th scope="col">ID Producto</th>
        <th scope="col">Nombre</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio/Unidad</th>
        <th scope="col">Monto</th>
      </tr>
    </thead>
    <tbody>
        @if (count($detalle)<=0)
          <tr>
              <td colspan="4"> No hay Registros</td>
          </tr>
        @else

        @foreach ($detalle as $itemDetalle)
        <tr class="text-center">
          <td>{{$itemDetalle->producto->idproducto}}</td>
          <td>{{$itemDetalle->producto->descripcion}}</td>
          <td>{{$itemDetalle->cantidad}}</td>
          <td>s/. {{$itemDetalle->producto->precio}}</td>   
          <td>S/. {{$itemDetalle->producto->precio*$itemDetalle->cantidad}}.00</td>   
        </tr>
        @endforeach
      @endif
    </tbody>
  </table>
  <div class="row">
    <div class="col">
      <a href="{{route('pedido.index')}}" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Volver</a>
    </div>
  </div>
@endsection

