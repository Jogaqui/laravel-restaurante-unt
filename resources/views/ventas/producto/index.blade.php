@extends('layout.plantilla')

@section('titulo','Productos')

@section('contenido')

<h3>LISTADO PRODUCTOS</h3>

<!-- Botón Nuevo -->
<a href="{{route('producto.create')}}" class="btn btn-warning"><i class="fas fa-plus"></i> Nuevo Producto</a>

<!-- nav -->
<nav class="navbar navbar-light float-right">
      
    <form class="form-inline my-2" method="GET">
        <input name="buscarpor" class="form-control me-2" type="search" placeholder="Búsqueda por descripción" value="{{$buscar}}">
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
        <th scope="col">Descripcion</th>
        <th scope="col">Precio (S/.)</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
      @if (count($producto)<=0)
        <tr>
          <td colspan="4"> No hay Registros</td>
        </tr>
      @else
        @foreach ($producto as $itemproducto)
        
        <tr class="text-center">
         <td>{{$itemproducto->idproducto}}</td>
         <td>{{$itemproducto->descripcion}}</td>
         <td>{{$itemproducto->precio}}</td>
         <td>
             <a href="{{route('producto.edit',$itemproducto->idproducto)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
            <a href="{{route('producto.confirmar',$itemproducto->idproducto)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Eliminar</a>
         </td>
        </tr>

        @endforeach
      @endif
    </tbody>
  </table>
  {{$producto->links()}}
@endsection

@section('script')
  <script>
     setTimeout(function(){
        document.querySelector('#mensaje').remove();
     }, 2000);
  </script>
@endsection