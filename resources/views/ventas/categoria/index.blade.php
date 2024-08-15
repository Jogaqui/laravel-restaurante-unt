@extends('layout.plantilla');

@section('titulo','Categorias');

@section('contenido')

<h3>LISTADO CATEGORIAS</h3>

<!-- Botón Nuevo -->
<a href="{{route('categoria.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Registro</a>

<!-- nav -->
<nav class="navbar navbar-light float-right">
      
    <form class="form-inline my-2" method="GET">
        <input name="buscarpor" class="form-control me-2" type="search" placeholder="Búsqueda por descripción" value="{{$buscarpor}}">
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
        <th scope="col">Codigo</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
      @if (count($categoria)<=0)
        <tr>
          <td colspan="3"> No hay Registros</td>
        </tr>
      @else
        @foreach ($categoria as $itemCategoria)
        
        <tr class="text-center">
         <td>{{$itemCategoria->idcategoria}}</td>
         <td>{{$itemCategoria->descripcion}}</td>
         <td>
             <a href="{{route('categoria.edit',$itemCategoria->idcategoria)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
            <a href="{{route('categoria.confirmar',$itemCategoria->idcategoria)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Eliminar</a>
         </td>
        </tr>

        @endforeach
      @endif
    </tbody>
  </table>
  {{$categoria->links()}}
@endsection

@section('script')
  <script>
     setTimeout(function(){
        document.querySelector('#mensaje').remove();
     }, 2000);
  </script>
@endsection