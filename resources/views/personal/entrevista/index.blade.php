@extends('personal.plantillaT')

@section('titulo', '.:: Restaurant ::.')

@section('contenido')

  <div class="container">
  <br>
  <a href="{{ route('personal.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nueva entrevista</a>
  <nav class="navbar navbar-light float-right">
  <form class="form-inline my-2 my-lg-0" method="GET">
       <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Busqueda por DNI" aria-label="Search" value="{{ $buscarpor }}">
       <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </nav> 
    <table class="table">
    <tr>
    
      <th scope="col">ID</th>
      <th scope="col">Observaciones</th> 
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
      <th scope="col">Postulante</th>
      <th scope="col">Opciones</th>
     </tr>
     </thead>
     <tbody>
     @if (count($entrevistas)<=0)
    <tr>
     <td colspan="3">No hay registros</td>
      </tr>
 @else
       @foreach($entrevistas as $entrevista) 
       <tr> 
          
          <td>{{$entrevista->identrevista}}</td>
          <td>{{$entrevista->observaciones}}</td>
          <td>{{$entrevista->fecha}}</td>
          <td>{{$entrevista->hora}}</td>
          <td>{{$entrevista->postulante->nombre}}</td>
          <td><a href="" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Editar</a>
 <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar</a></td>
     </tr> 
     
 @endforeach
 @endif
 </tbody>

     </table>


  @endsection
