@extends('layout.plantilla')

@section('titulo','Clientes')

@section('contenido')

<h3>LISTADO CLIENTES</h3>

<!-- Botón Nuevo -->
<a href="{{route('cliente.create')}}" class="btn btn-warning"><i class="fas fa-plus"></i> Nuevo Cliente</a>

<!-- nav -->
<nav class="navbar navbar-light float-right">
      
    <form class="form-inline my-2" method="GET">
        <input name="buscarpor" class="form-control me-2" type="search" placeholder="Búsqueda por Nombres" value="{{$buscar}}">
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
        <th scope="col">ID</th>
        <th scope="col">DNI</th>
        <th scope="col">Nombres</th>
        <th scope="col">Dirección</th>
        <th scope="col">Email</th>
        <th scope="col">Teléfono</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
      @if (count($cliente)<=0)
        <tr>
          <td colspan="7" align="center"> No hay Registros</td>
        </tr>
      @else
        @foreach ($cliente as $itemcliente)
        
        <tr class="text-center">
         <td>{{$itemcliente->idcliente}}</td>
         <td>{{$itemcliente->dni}}</td>
         <td>{{$itemcliente->nombres}}</td>
         <td>{{$itemcliente->direccion}}</td>
         <td>{{$itemcliente->email}}</td>
         <td>{{$itemcliente->telefono}}</td>
         <td>
             <a href="{{route('cliente.edit',$itemcliente->idcliente)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
            <a href="{{route('cliente.confirmar',$itemcliente->idcliente)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Eliminar</a>
         </td>
        </tr>

        @endforeach
      @endif
    </tbody>
  </table>
  {{$cliente->links()}}
@endsection

@section('script')
  <script>
     setTimeout(function(){
        document.querySelector('#mensaje').remove();
     }, 2000);
  </script>
@endsection