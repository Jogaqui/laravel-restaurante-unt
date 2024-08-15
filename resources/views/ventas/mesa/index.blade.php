@extends('layout.plantilla')

@section('titulo','Mesas')

@section('contenido')

<h3>LISTADO MESAS</h3>

<!-- Botón Nuevo -->
@if(auth()->user()->rol == 'administrador')
  <a href="{{route('mesa.create')}}" class="btn btn-warning"><i class="fas fa-plus"></i> Nuevo Registro</a>
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
      <tr>
        <th scope="col">ID Mesa</th>
        <th scope="col">ID Pedido</th>
        <th scope="col">Disponibilidad</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
        @if (count($mesas)<=0)
          <tr>
              <td colspan="4"> No hay Registros</td>
          </tr>
        @else

        @foreach ($mesas as $itemMesa)
        <tr>
         <td>{{$itemMesa->idmesa}}</td>
         
         <td>
             @if ($itemMesa->idpedido==0)
                  <div align="" style=""><i>SIN PEDIDO</i></div>
             @else
                  <div align="" style="">{{$itemMesa->idpedido}}</div>
             @endif
        </td>
         <td>
          @if ($itemMesa->disponibilidad==1)
              <div  align="center" style="width:110px; border-radius: 10px; font-family: Roboto, sans-serif; font-weight:bold; background-color: rgb(47, 255, 78)">Disponible</div>
          @else
              <div align="center" style="width:110px; border-radius: 10px;  font-family: Roboto, sans-serif; font-weight:bold; background-color: rgb(255, 45, 45)">Ocupada</div>
          @endif
         </td>
         <td>
             <a href="{{route('mesa.edit',$itemMesa->idmesa)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
            <a href="{{route('mesa.limpiar',$itemMesa->idmesa)}}" class="btn btn-success btn-sm"><i class="fas fa-trash"></i>Limpiar</a>
            <a href="{{route('mesa.confirmar',$itemMesa->idmesa)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Eliminar</a>
         </td>

        </tr>
        @endforeach
      @endif
    </tbody>
  </table>
  {{$mesas->links()}}
@endsection

@section('script')
  <script>
     setTimeout(function(){
        document.querySelector('#mensaje').remove();
     }, 2000);
  </script>
@endsection