@extends('layout.plantilla')

@section('titulo','Pedidos')

@section('contenido')

<h3>LISTADO PEDIDOS</h3>

@if (auth()->user()->rol == 'administrador'|| auth()->user()->rol == 'mozo')
  <!-- Botón Nuevo -->
  <a href="{{route('pedido.create')}}" class="btn btn-warning"><i class="fas fa-plus"></i> Nuevo Registro</a>
@endif
<!-- nav -->
<nav class="navbar navbar-light float-right">
      
  <form class="form-inline my-2" method="GET">
      <input name="buscar" class="form-control me-2" type="search" placeholder="Búsqueda por ID" value="{{$buscar}}">
      <button class="btn btn-success" type="submit">Buscar</button>
  </form>
</nav>

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
        <th scope="col">ID Pedido</th>
        <th scope="col">Nombre Cliente</th>
        <th scope="col">Monto Total</th>
        <th scope="col">Observaciones</th>
        <th scope="col">Situación</th>
        <th scope="col">Medio de Pago</th>
        <th scope="col">Modalidad</th>
        <th scope="col">Productos</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
        @if (count($pedido)<=0)
          <tr>
              <td colspan="4"> No hay Registros</td>
          </tr>
        @else

        @foreach ($pedido as $itemPedido)
        <tr class="text-center">
          <td>{{$itemPedido->idpedido}}</td>
          <td>
              @if ($itemPedido->idcliente==0)
                    <div align="" style=""><i>SIN CLIENTE</i></div>
              @else
                    <div align="" style="">{{$itemPedido->cliente->nombres}}</div>
              @endif
          </td>
          <td>
            @if ($itemPedido->montoTotal==0)
                <div align="" style=""><i>SIN PRODUCTO</i></div>
            @else
                <div align="" style="">{{$itemPedido->montoTotal}}</div>
            @endif
          </td>
          <td>{{$itemPedido->observaciones}}</td>
          <td>
            @if($itemPedido->situacion==0)
                <div  align="center" style="width:110px; border-radius: 10px; font-family: Roboto, sans-serif; font-weight:bold; background-color: rgb(131, 147, 191)">Atendido</div>
            @else
              @if($itemPedido->situacion==1)
                <div align="center" style="width:110px; border-radius: 10px;  font-family: Roboto, sans-serif; font-weight:bold; background-color: rgb(131, 191, 132)">Cocinado</div>
              @else
                <div align="center" style="width:110px; border-radius: 10px;  font-family: Roboto, sans-serif; font-weight:bold; background-color: rgb(236, 201, 42)">Servido</div>
              @endif
            @endif
          </td>
          <td>{{$itemPedido->medioPago}}</td>
          <td>
            @if ($itemPedido->modalidad==1)
                <div align="center" style="width:110px; border-radius: 10px; font-family: Roboto, sans-serif; font-weight:bold; background-color: rgb(255, 45, 192)">Retiro en local</div>
            @else
                <div align="center" style="width:110px; border-radius: 10px;  font-family: Roboto, sans-serif; font-weight:bold; background-color: rgb(92, 47, 255)">Delivery</div>
            @endif
          </td>
          <td>
            @if (auth()->user()->rol == 'mozo'|| auth()->user()->rol == 'administrador')
            <!-- Botón Nuevo -->
            <a href="{{route('detalle.create')}}" class="btn btn-dark btn-sm"><i class="fas fa-plus"></i> Agregar</a>
            @endif
            <a href="{{route('detalle.lista',$itemPedido->idpedido)}}" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i> Ver Detalles</a>
            @if (auth()->user()->rol == 'mozo'|| auth()->user()->rol == 'administrador')
            <!-- Botón Nuevo -->
            <a href="{{route('pedido.pago',$itemPedido->idpedido)}}" class="btn btn-success btn-sm"><i class="fas fa-shopping-cart"></i> Pago</a>
            @endif
          </td>
          <td>
            @if (auth()->user()->rol == 'cocinero'|| auth()->user()->rol == 'administrador')
            <!-- Botón Nuevo -->
            <a href="{{route('pedido.actualizar',$itemPedido->idpedido)}}" class="btn btn-warning"><i class="fas fa-check"></i> Listo! </a>
            @endif
            {{-- editar --}}
            <a href="{{route('pedido.edit',$itemPedido->idpedido)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
            {{-- eliminar --}}
            
            <a href="{{route('pedido.confirmar',$itemPedido->idpedido)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Eliminar</a>
          </td>
        </tr>
        @endforeach
      @endif
    </tbody>
  </table>
@endsection

@section('script')
  <script>
     setTimeout(function(){
        document.querySelector('#mensaje').remove();
     }, 2000);
  </script>
@endsection