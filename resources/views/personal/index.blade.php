@extends('personal.plantillaT')

@section('titulo', '.:: Restaurant ::.')

@section('contenido')

  <div class="container">
  <br>
  <a href="{{ route('personal.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Registro</a>
  <nav class="navbar navbar-light float-right">
  <form class="form-inline my-2 my-lg-0" method="GET">
       <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Busqueda por DNI" aria-label="Search" value="{{ $buscarpor }}">
       <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </nav> 
    <table class="table">
    <tr>
    
      <th scope="col">DNI</th>
      <th scope="col">Nombre</th> 
      <th scope="col">Edad</th>
      <th scope="col">Puntuacion</th>
      <th scope="col">Opciones</th>
     </tr>
     </thead>
     <tbody>
     @if (count($postulante)<=0)
    <tr>
     <td colspan="3">No hay registros</td>
      </tr>
 @else
       @foreach($postulante as $id) 
       <tr> 
          
          <td>{{$id->dni}}</td>
          <td>{{$id->nombre}}</td>
          <td>{{$id->edad}}</td>
          <td>{{$id->puntaje}}</td>
          <td><a href="" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Editar</a>
 <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar</a></td>
     </tr> 
     
 @endforeach
 @endif
 </tbody>

     </table>


  @endsection
